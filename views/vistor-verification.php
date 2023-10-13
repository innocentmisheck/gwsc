<?php
$con = new mysqli('localhost', 'root', '', 'gwsc');

if (!$con) {
    die(mysqli_error($con));
}

$message = "Get Your Verification & Credits!";


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $nationalId = $_POST["national_id"];
    $emailAddress = $_POST["email_address"];
    $firstName = $_POST["first_name"];
    $otherName = $_POST["other_name"];
    $lastName = $_POST["last_name"];
    $phoneNumber = $_POST["phone_number"];
    $dob = $_POST["dob"];
    $nationality = $_POST["nationality"];
    $homeAddress = $_POST["home_address"];
    $gender = $_POST["gender"];

    // Insert data into the 'users' table
    $sql = "INSERT INTO users (national_id, email_address, first_name, other_name, last_name, phone_number, dob, nationality, home_address, gender) 
            VALUES ('$nationalId', '$emailAddress', '$firstName', '$otherName', '$lastName', '$phoneNumber', '$dob', '$nationality', '$homeAddress', '$gender')";

    if ($conn->query($sql) === TRUE) {
        $lastUserId = $conn->insert_id;
        
        // Insert data into the 'next_of_kin' table
        $kinFullName = $_POST["kin_full_name"];
        $relationshipType = $_POST["relationship_type"];
        $kinEmailAddress = $_POST["kin_email_address"];
        $kinPhoneNumber = $_POST["kin_phone_number"];
        $kinDob = $_POST["kin_dob"];
        $kinNationality = $_POST["kin_nationality"];
        $kinHomeAddress = $_POST["kin_home_address"];
        $kinGender = $_POST["kin_gender"];

        $sql = "INSERT INTO next_of_kin (user_id, kin_full_name, relationship_type, kin_email_address, kin_phone_number, kin_dob, kin_nationality, kin_home_address, kin_gender) 
                VALUES ('$lastUserId', '$kinFullName', '$relationshipType', '$kinEmailAddress', '$kinPhoneNumber', '$kinDob', '$kinNationality', '$kinHomeAddress', '$kinGender')";

        if ($conn->query($sql) === TRUE) {
            // Insert data into the 'gwsc_account' table
            $username = $_POST["username"];
            $passwordHash = password_hash($_POST["password_hash"], PASSWORD_BCRYPT); // Hash the password securely
            $role = $_POST["role"];

            $sql = "INSERT INTO gwsc_account (user_id, username, password_hash, role) 
                    VALUES ('$lastUserId', '$username', '$passwordHash', '$role')";

            if ($conn->query($sql) === TRUE) {
                echo "Data inserted successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/vendors/semantic/dist/semantic.min.css">
    <script src="../public/vendors/semantic/dist/semantic.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Global CSS -->
    <link rel="stylesheet" href="../public/css/global.css">
    <!-- Include Semantic UI CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Include Semantic UI JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <!-- Include Toast JS -->
    <script src="../public/js/toast-message.js"></script>
    <link rel="shortcut icon" href="../favicon-2.ico" type="image/x-icon">
     <!-- Include recatcha -->
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>GWSC - REGISTER</title>
</head>

<body>

<div class="video-container">
    <video autoplay loop muted playsinline class="back-video">
                    <source src="../public/images/production_id_4782131 (2160p).mp4" type="video/mp4">
    </video>
    <header class="nav-bar-primary" class="ui fixed top sticky">
            <nav>
                 <div class="ui inverted menu">
                    <a class="item primary" href="../gwsc.php">
                        <strong>Explore <i style="color:white !important;" class="home icon"></i>
                    </strong>                  
                      </a>
                      <div class="dropdown">
                        <a class="item primary">
                            <strong style="margin-top:4px;">
                            Information <i style="color:white !important;" class="info circle icon"></i>
                            </strong>
                        </a>
                        <div class="dropdown-content">
                        <strong> 
                            <a class="dropdown-item" href="#"><i  style="color:black !important;"  class="calendar alternate icon"></i>Availability</a>
                        </strong>
                            <strong>
                            <div class="sub-dropdown">
                                    <strong>
                                        <a class="sub-dropdown-item" href="#">
                                        <i style="color:black;" class="map marker alternate icon"></i>
                                        Sites <i style="color:black; margin-left:60px" class="arrow circle right  icon"></i>
                                        </a>
                                    </strong>
                                    <div class="sub-dropdown-content">
                                        <a class="sub-dropdown-item" href="#"><i style="color:black;" class="swimmer  icon"></i> Swimming</a>
                                        <a class="sub-dropdown-item" href="#"><img src="../public/images/Circus Tent.png" alt="campingicon" width="12%" height="12%"> Camping</a>
                                    </div>
                                    </div>
                        </strong>
                        <strong>
                            <a class="dropdown-item" href="#"><i style="color:black;" class="star  icon"></i>Review</a>
                        </strong>
                        <strong>
                            <a class="dropdown-item" href="#"><i style="color:black;" class="fire trophy icon"></i>Features</a>
                        </strong>
                        <strong>
                            <a class="dropdown-item" href="#"><i style="color:black;" class="map marker alternate icon"></i>Local attractions</a>
                        </strong>
                           
                        </div>
                        </div>
                        <a href="./vistor-login.php" class="item primary">
                        <strong>Login <i style="color:white !important;" class="sign in alternate icon"></i>
                    </strong>
                      </a>   
                        <a class="item primary">
                        <strong>About <i style="color:white !important;" class="users icon"></i>
                    </strong>                  
                      </a>
                                     
                    
                    
                    <div class="right menu">
                        <div class="item primary">
                        <div class="ui icon input">
                            <input type="text" placeholder="Search...">
                            <i class="search link icon"></i>
                        </div>
                        </div>
                        <a class="ui item primary">
                        <strong class="logo">Global Wild Swimming Camping</strong>
                        <!-- <strong class="logo2">Global Wild Swimming Camping <i style="margin-left:18px;" class="swimmer icon"></i></strong> -->
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Ending navbar -->

        <div id="registration-tips" class="ui raised medium padded text container segment">
            <ul>
            <li><strong>Complete Your Profile:</strong> Provide accurate information during registration.</li>
            <li><strong>Choose Your Activities:</strong> Select your preferred outdoor activities.</li>
            <li><strong>Verify Availability:</strong> Check for available dates and locations.</li>
            </ul>
        <div class="ui yellow bottom right attached label">Registartion Tips</div>
        </div>

        <center class="center-form">
        <form onsubmit="return validateForm();" class="ui raised segments form-container" action="../views/vistor-login.php" method="post">
        <div class="ui green bottom left attached label">Registration Form</div>

            <fieldset id="gwscaccount" class="ui raised segments" style="border-radius: 20px; padding: 0.5%; display: none;">
            <div class="ui red bottom left attached label">Verification Proccess</div>

            <legend style="font-size: 12px; font-weight: 500;">GWSC Account Verification</legend>
            <div class="">
             <label for="gwsc_username">Username (Public):<i class="user alternate icon"></i></label>
             <input type="text" name="username" placeholder="DeanZean">
             <br>
             <label for="password">Create Password: <i class="address card outline icon" ></i></label>
             <input type="password" name="password_hash" id="password" placeholder="1313#yfhtr563" required>
             <i style="margin-left: 1%;" class="eye icon" id="passwordToggle"></i>
             <i style="margin-left: 1%;" class="eye slash icon" id="passwordToggleHide"></i>
             <br>
             <label for="confirm_password">Confirm Password: <i class="address card outline icon"></i></label>
             <input type="password" name="password_hash" id="confirm_password" placeholder="1313#yfhtr563">
             <i style="margin-left: 1%;" class="eye icon" id="confirmPasswordToggle"></i>
             <i style="margin-left: 1%;" class="eye slash icon" id="confirmPasswordToggleHide"></i>
             <br>
             <label for="role">Interested In:</label>
             <select name="role" id="role">
             <option value="SWIMMING">Swimming</option>
             <option value="CAMPING">Camping</option>
             <option value="">Just Fan</option>
             </select>
             <div class="g-recaptcha" data-sitekey="6LecU8UnAAAAABnbBE1Bdx76--2ODi4rFn-veVwZ"></div>
             <p class="passmessagemismatch" id="passwordMismatch">Passwords do not match.</p>
             <p class="passmessagematch" id="passwordmatch">Passwords match.</p>   
                <script>
                    const passwordField = document.getElementById("password");
                    const confirmPasswordField = document.getElementById("confirm_password");
                    const passwordIcon = document.getElementById("passwordIcon");
                    const confirmPasswordIcon = document.getElementById("confirmPasswordIcon");
                    const passwordToggle = document.getElementById("passwordToggle");
                    const confirmPasswordToggle = document.getElementById("confirmPasswordToggle");
                    const passwordMismatch = document.getElementById("passwordMismatch");
                    const passwordmatch = document.getElementById("passwordmatch");

                    passwordToggleHide.addEventListener("click", togglePasswordInvisibility.bind(null, passwordField));
                    passwordToggle.addEventListener("click", togglePasswordVisibility.bind(null, passwordField));
                    confirmPasswordToggle.addEventListener("click", togglePasswordVisibility.bind(null, confirmPasswordField));
                    confirmPasswordToggleHide.addEventListener("click", togglePasswordInvisibility.bind(null, confirmPasswordField));

                    confirmPasswordField.addEventListener("input", validatePasswords);

                    function togglePasswordVisibility(inputField, icon) {
                        if (inputField.type === "password") {
                            inputField.type = "text";
                
                        } else {
                            inputField.type = "password";
                    
                        }
                    }

                    function togglePasswordInvisibility(inputField, icon) {
                        if (inputField.type === "text") {
                            inputField.type = "Password";
                
                        } else {
                            inputField.type = "password";
                    
                        }
                    }
                    
                    function validatePasswords() {
                        const passwordValue = passwordField.value;
                        const confirmPasswordValue = confirmPasswordField.value;

                        if (passwordValue === confirmPasswordValue) {
                            passwordMismatch.style.display = "none";
                            passwordmatch.style.display = "block";
                        } else {
                            passwordMismatch.style.display = "block";
                            passwordmatch.style.display = "none";

                        }
                    }
                    
                </script>

             
            </div>
            </fieldset>
            <fieldset id="nextOfKinData" class="ui piled segments" style="border-radius: 20px; padding:0.5%; display: none;">
            <div style="display:none;" class="ui red bottom left attached label">You are allowed to SKIP this form</div>
                <legend style="font-size: 12px; margin-top:20px; font-weight:500;">Next Of KIN Documentation</legend>
                <div class="kys">
                    <label for="kin_full_name">Full Name: <i class="user icon"></i></label>
                    <input type="text" name="kin_full_name" id="kin_full_name" placeholder="DEMO: George Katama">
                    <label for="kin_relationship_type">Relationship Type: <i class="address book icon"></i></label>
                    <input style="text-transform: uppercase;" type="kin_relationship_type" name="relationship_type" id="kin_relationship_type" placeholder="DEMO: FATHER">
                    <br>
                    <label for="kin_email_address">Email Address: <i class="mail icon"></i></label>
                    <input type="email" name="kin_email_address" id="kin_email_address" placeholder="DEMO:katama65@gmail.com">
                    <label for="kin_phone_number">Mobile: <i class="mobile icon"></i></label>
                    <input type="tel" name="kin_phone_number" id="kin_phone_number" placeholder="0996724867">
                    <br>
                    <label for="dob">DOB: <i class="calendar alternate icon"></i></label>
                    <input type="date" name="dob" id="kin_dob" placeholder="DEMO: 09/08/2000">
                    <label for="kin_nationality">Nationality:<i class="baby icon"></i></label>
                    <input type="text" name="kin_nationality" id="kin_nationality" placeholder="Malawian">
                    <br>
                    <label for="kin_home_address">Home Address: <i class="home icon"></i></label>
                    <input type="text" name="kin_home_address" id="kin_home_address" placeholder="Lilongwe, Area 47 Bwandilo,Malawi">
                    <br>
                    <div class="gender">
                        <label for="male">Male: <i class="male icon"></i></label>
                        <input type="radio" name="gender" value="MALE" id="kin_male" required>
                        <label for="female">Female: <i class="female icon"></i></label>
                        <input type="radio" name="gender" value="FEMALE" id="kin_female" required>
                    </div>
                </div>

            </fieldset>


            <center>
                <div class="toast-container">
                    <div class="toast">
                        <p class="message <?php echo $insert_result ? 'success' : 'error'; ?>">
                            <?php echo $message; ?>
                        </p>
                    </div>
                </div>
            </center>

            <fieldset id="personPrimaryData" class="ui piled segments" style="border-radius: 20px; padding:0.5%;">
                <legend style="font-size: 12px; font-weight:500;">Person Primary Data</legend>
                <label for="national_id">NATIONAL ID: <i class="address card icon"></i></label><span style="color:red;  font-size:large; font-weight:bolder;">*</span>
                <input style="text-transform: uppercase;" type="text" name="national_id" id="national_id_input" placeholder="DEMO: 1346FFR3" autocomplete="off" required>
                <br>
                <label for="email">EMAIL ADDRESS: <i class="mail icon"></i></label><span style="color:red;  font-size:large; font-weight:bolder;">*</span>
                <input style="text-transform: lowercase;" type="email" name="email_address" id="email_address" placeholder="DEMO: johnfett6@gmail.com" autocomplete="off" aria-autocomplete="none" required>
                <br>
            </fieldset>
            <fieldset id="kycData" class="ui inverted piled segments" style="border-radius: 20px; padding:0.5%;">
                <legend style="font-size: 12px; font-weight:500;">KYC [&] KCC Documentation</legend>
                <div class="kys">
                    <label for="first_name">First Name: <i class="user icon"></i></label>
                    <input type="text" name="first_name" id="first_name" placeholder="DEMO: John">
                    <label for="other_name">Other Name: <i class="address book icon"></i></label>
                    <input type="other_name" name="other_name" id="other_name" placeholder="DEMO: Zean">
                    <br>
                    <label for="last_name">Last Name: <i class="address book icon"></i></label>
                    <input type="last_name" name="last_name" id="last_name" placeholder="DEMO: fett">
                    <label for="phone_number">Mobile: <i class="mobile icon"></i></label>
                    <input type="tel" name="phone_number" id="phone_number" placeholder="0996724867">
                    <br>
                    <label for="dob">DOB: <i class="calendar alternate icon"></i></label>
                    <input type="date" name="dob" id="dob" placeholder="DEMO: 09/08/2000">
                    <label for="nationality">Country:<i class="baby icon"></i></label>
                    <input style="text-transform: uppercase;"  type="text" name="nationality" id="nationality" placeholder="MALAWI">
                    <br>
                    <label for="home_address">Home Address: <i class="home icon"></i></label>
                    <input type="text" name="home_address" id="home_address" placeholder="Lilongwe, Area 47 Bwandilo,Malawi">
                    <div class="gender">
                        <label for="male">Male: <i class="male icon"></i></label>
                        <input type="radio" name="gender" value="MALE" id="male" required>
                        <label for="female">Female: <i class="female icon"></i></label>
                        <input type="radio" name="gender" value="FEMALE" id="female" required>
                    </div>
                </div>
             <div class="ui bottom left attached label">Starting Registration Form</div>
            </fieldset>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const form = document.querySelector(".form-container");
                    const personPrimaryData = document.getElementById("personPrimaryData");
                    const gwscAccountData = document.getElementById("gwscaccount");
                    const nextOfKinData = document.getElementById("nextOfKinData");
                    const resetbutton = document.querySelector(".reset-button");
                    const backbutton = document.querySelector(".back-button");
                    const submitForm = document.getElementById("submit-form");

                    // Add an event listener to the "Next" button
                    const Returnbutton = form.querySelector(".back-button");
                    Returnbutton.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent form submission
                        // Perform your form validation here
                        // If validation passes, call the function to show the next section

                        backtoPrimarySection();
                    });
                    // Hide the initial section and show the next section
                    function showNextSection() {
                        personPrimaryData.style.display = "none";
                        nextOfKinData.style.display = "block";
                        kycData.style.display = "none";
                        resetbutton.style.display = "none";
                        backbutton.style.display = "inline-flex";
                        nextButton.style.display = "none";
                        VerificationButton.style.display = "inline-block";
                        gwscAccountData.style.display = "none";

                    }

                    function backtoPrimarySection() {
                        nextOfKinData.style.display = "none";
                        kycData.style.display = "block";
                        personPrimaryData.style.display = "block";
                        nextButton.style.display = "inline-block";
                        resetbutton.style.display = "inline-block";
                        backbutton.style.display = "none";
                        VerificationButton.style.display = "none";
                        gwscAccountData.style.display = "none";



                    }

                    function Verification(){
                        nextOfKinData.style.display = "none";
                        kycData.style.display = "none";
                        personPrimaryData.style.display = "none";
                        gwscAccountData.style.display = "block";
                        backbutton.style.display = "none";
                        VerificationButton.style.display = "none";
                        submitForm.style.display ="inline-block";
                        resetbutton.style.display = "inline-block";
                        backbutton.style.display = "inline";
                        loginButton.style.display ="none";

                    }

                    const VerificationButton = document.getElementById("verification");

                        VerificationButton.addEventListener("click", () => {
                            Verification();
                        });

                    // Add an event listener to the "Next" button
                    const nextButton = form.querySelector(".next-button");
                    nextButton.addEventListener("click", function(event) {
                        event.preventDefault(); // Prevent form submission
                        // Perform your form validation here
                        // If validation passes, call the function to show the next section
                        function validateForm() {
                            // Validate National ID
                            var nationalId = document.getElementById("national_id_input").value;
                            if (!nationalId.match(/^[A-Z0-9]{8,}$/)) {
                                $message = "Please enter a valid National ID."
                                return false;
                            }

                            // Validate Email Address
                            var emailAddress = document.getElementById("email_address").value;
                            if (!emailAddress.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
                                $message ="Please enter a valid email address.";
                                return false;
                            }

                            // Validate First Name
                            var firstName = document.getElementById("first_name").value;
                            if (!firstName) {
                                $message="Please enter your First Name.";
                                return false;
                            }

                            // Validate Last Name
                            var lastName = document.getElementById("last_name").value;
                            if (!lastName) {
                                $message="Please enter your Last Name.";
                                return false;
                            }

                            // Validate Mobile Phone Number
                            var phoneNumber = document.getElementById("phone_number").value;
                            if (!phoneNumber.match(/^\d{10}$/)) {
                                $message="Please enter a valid 10-digit phone number.";
                                return false;
                            }

                            // Validate Date of Birth
                            var dob = document.getElementById("dob").value;
                            if (!dob) {
                                $message="Please enter your Date of Birth.";
                                return false;
                            }

                            // Validate Nationality
                            var nationality = document.getElementById("nationality").value;
                            if (!nationality) {
                                $message="Please enter your Nationality.";
                                return false;
                            }

                            // Validate Home Address
                            var homeAddress = document.getElementById("home_address").value;
                            if (!homeAddress) {
                                $message="Please enter your Home Address.";
                                return false;
                            }

                            // Validate Gender
                            var genderMale = document.getElementById("male").checked;
                            var genderFemale = document.getElementById("female").checked;
                            if (!genderMale && !genderFemale) {
                                $message="Please select your Gender.";
                                return false;
                            }

                            // All validations passed
                            return true;
                        }

                        showNextSection();
                    });
                });
            </script>

            
            <button class="next-button" style="margin-top: 2%;" type="next" name="next">
                <div  class="ui primary  animated button" tabindex="0">
                <div class="visible content">Next</div>
                <div class="hidden content">
                    <i class="arrow right icon"></i>
                </div>
                </div>
                </button>
            <button class="reset-button" type="reset" name="reset">
                    <div  class="ui  negative animated button" tabindex="0">
                    <div class="visible content">Reset</div>
                    <div class="hidden content">
                        <i class="trash icon"></i>
                    </div>
                    </div>
                </button>
            <button style="display: none;" class="back-button" type="back" name="back">
                    <div  class="ui  negative animated button" tabindex="0">
                    <div class="visible content">Back</div>
                    <div class="hidden content">
                        <i class="arrow left icon"></i>
                    </div>
                    </div>
                </button>
                <button type="submit" name="submit">
                    <div style="display: none;" class="ui primary  animated button" tabindex="0" id="verification">
                        <div class="visible content ">Authentication</div>
                        <div class="hidden content ">
                            <i class="sign in icon "></i>
                        </div>
                    </div>                           
                </button>
                    <!-- There is a button that is supposed to be clicked so that we can post the data into the database but we need to validate the data in php,js or html the whole data is contained by one single form and below that the form and the buttons codes check it and modify if needed -->
                    <button >
                        <div type="submit" name="submit" id="submit-form" style="display: none;" class="ui positive  animated button" tabindex="0" >
                            <div class="visible content ">Submit</div>
                            <div class="hidden content ">
                                <i class="paper plane icon "></i>
                            </div>
                        </div>
                                                   
                        </button>
            <button>
                    <div class="ui primary  animated button" tabindex="0" id="loginButton">
                        <div class="visible content ">Already Have Account</div>
                        <div class="hidden content ">
                            <i class="sign in icon "></i>
                        </div>
                    </div>
                    <script>
                        const loginButton = document.getElementById("loginButton");

                        loginButton.addEventListener("click", () => {
                            // Redirect to the login page
                            window.location.href = "./vistor-login.php"; // Replace with the actual URL of your page
                        });
                    </script>
            <!-- Go to homepage -->
                    </button>
            <button style="display:none;" type="home " name="home ">
            <div  class="ui  positive animated button " tabindex="0 ">
                <div class="visible content ">Explore More</div>
                <div class="hidden content ">
                    <i class="home icon "></i>
                </div>
                </div>
            </button>
        </form>
    </center>
</div>
<footer>


    <?php
// Include the connect.php file from src/controllers directory
require '../src/inc/views/footer.php';
?>

</footer>



</body>

</html>