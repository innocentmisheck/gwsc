<?php

// Include the connect.php file from src/controllers directory
require 'src/controllers/connect.php';

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/vendors/semantic/dist/semantic.min.css">
    <script src="public/vendors/semantic/dist/semantic.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Global CSS -->
    <link rel="stylesheet" href="public/css/global.css">
    <!-- Include Semantic UI CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <!-- Include Semantic UI JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <!-- Include Toast JS -->
    <script src="public/js/toast-message.js"></script>
    <!-- Include recatcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="shortcut icon" href="./favicon-2.ico" type="image/x-icon">
    <title>GWSC - REGISTER</title>
</head>

<body>

        <video autoplay loop muted plays-inline class="back-video" source src="public/images/production_id_4803766 (2160p).mp4" type="video/mp4"></video>

    <h1 class="logo">
        <i class="globe icon"></i><i class="swimmer icon"></i><i class="skating icon"></i><i class="snowboarding  icon"></i> <i class="campground icon"></i></h1>


    <center>
        <div class="ui raised segments toast_success">
            <p> <strong style="font-family: cursive;">Register today </strong>as a swimmer, camping hoster even just wild person <br> at <strong>GWSC</strong> so that you can learn and been <strong> credited</strong> as the offical member of <br><strong style="font-family: cursive;">GLOBAL WILD SWIMMING AND CAMPING</strong></p>
        </div>

        <form onsubmit="return validateForm();" class="ui raised segments form-container" action="" method="post">
            <fieldset id="gwscaccount" class="ui piled segments" style="border-radius: 20px; padding: 0.5%; display: none;">
            <legend style="font-size: 12px; font-weight: 500;">Global Wild Swimming and Camping Account Verification</legend>
            <div class="">
             <label for="gwsc_username">Username (Public):<i class="user alternate icon"></i></label>
             <input type="text" name="gwsc_username" placeholder="DeanZean">
             <br>
             <label for="gwsc_code">Membership Code: <i class="address card outline icon"></i></label>
             <input style="text-transform: uppercase;" type="text" name="gwsc_code" placeholder="GWSC20444" required>
             <br>
             <label for="password">Create Password: <i class="address card outline icon" ></i></label>
             <input type="password" name="password" id="password" placeholder="1313#yfhtr563" required>
             <i style="margin-left: 1%;" class="eye icon" id="passwordToggle"></i>
             <i style="margin-left: 1%;" class="eye slash icon" id="passwordToggleHide"></i>
             <br>
             <label for="confirm_password">Confirm Password: <i class="address card outline icon"></i></label>
             <input type="password" name="confirm_password" id="confirm_password" placeholder="1313#yfhtr563" required>
             <i style="margin-left: 1%;" class="eye icon" id="confirmPasswordToggle"></i>
             <i style="margin-left: 1%;" class="eye slash icon" id="confirmPasswordToggleHide"></i>
             <br>
             <label for="role">Interested In:</label>
             <select name="role" id="role">
             <option value="swimmer">Swimming</option>
             <option value="hoster">Camping</option>
             <option value="fan">Just Fan</option>
             </select>
             <div class="g-recaptcha" data-sitekey="6LecU8UnAAAAABnbBE1Bdx76--2ODi4rFn-veVwZ"></div>
             <p class="passmessagemismatch ui raised segments" id="passwordMismatch">Passwords do not match.</p>
             <p class="passmessagematch ui raised segments" id="passwordmatch">Passwords match.</p>   
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
                <legend style="font-size: 12px; font-weight:500;">Next Of KIN Documentation</legend>
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
                            <!-- <?php echo $message; ?> -->
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
            <fieldset id="kycData" class="ui piled segments" style="border-radius: 20px; padding:0.5%;">
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
                    <label for="nationality">Nationality:<i class="baby icon"></i></label>
                    <input type="text" name="nationality" id="nationality" placeholder="Malawian">
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
                                alert("Please enter a valid National ID.");
                                return false;
                            }

                            // Validate Email Address
                            var emailAddress = document.getElementById("email_address").value;
                            if (!emailAddress.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
                                alert("Please enter a valid email address.");
                                return false;
                            }

                            // Validate First Name
                            var firstName = document.getElementById("first_name").value;
                            if (!firstName) {
                                alert("Please enter your First Name.");
                                return false;
                            }

                            // Validate Last Name
                            var lastName = document.getElementById("last_name").value;
                            if (!lastName) {
                                alert("Please enter your Last Name.");
                                return false;
                            }

                            // Validate Mobile Phone Number
                            var phoneNumber = document.getElementById("phone_number").value;
                            if (!phoneNumber.match(/^\d{10}$/)) {
                                alert("Please enter a valid 10-digit phone number.");
                                return false;
                            }

                            // Validate Date of Birth
                            var dob = document.getElementById("dob").value;
                            if (!dob) {
                                alert("Please enter your Date of Birth.");
                                return false;
                            }

                            // Validate Nationality
                            var nationality = document.getElementById("nationality").value;
                            if (!nationality) {
                                alert("Please enter your Nationality.");
                                return false;
                            }

                            // Validate Home Address
                            var homeAddress = document.getElementById("home_address").value;
                            if (!homeAddress) {
                                alert("Please enter your Home Address.");
                                return false;
                            }

                            // Validate Gender
                            var genderMale = document.getElementById("male").checked;
                            var genderFemale = document.getElementById("female").checked;
                            if (!genderMale && !genderFemale) {
                                alert("Please select your Gender.");
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
                <button>
                    <div style="display: none;" class="ui primary  animated button" tabindex="0" id="verification">
                        <div class="visible content ">Authentication</div>
                        <div class="hidden content ">
                            <i class="sign in icon "></i>
                        </div>
                    </div>
                                               
                    </button>
                    <button>
                        <div style="display: none;" class="ui positive  animated button" tabindex="0" type="submit" name="submit" id="submit-form">
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
                            window.location.href = "views/customer-login.html"; // Replace with the actual URL of your page
                        });
                    </script>
                            
                    </button>
            <button type="home " name="home ">
            <div  class="ui  positive animated button " tabindex="0 ">
                <div class="visible content ">Explore More</div>
                <div class="hidden content ">
                    <i class="home icon "></i>
                </div>
                </div>
            </button>
        </form>
    </center>

  
    
    <div style="display: none;" class="ui raised vertical footer segment">
        <div class="ui container">
            <div class="ui stackable raised divided equal height stackable grid">
                <div class="three wide column">
                    <h4 class="ui raised header">Explore</h4>
                    <div class="ui raised link list">
                        <a href="#" class="item">Locations</a>
                        <a href="#" class="item">Activities</a>
                        <a href="#" class="item">Safety Tips</a>
                    </div>
                </div>
                <div class="three wide column">
                    <h4 class="ui raised header">Resources</h4>
                    <div class="ui raised link list">
                        <a href="#" class="item">Gear</a>
                        <a href="#" class="item">Guides</a>
                        <a href="#" class="item">Events</a>
                    </div>
                </div>
                <div class="seven wide column">
                    <h4 class="ui raised header">Connect</h4>
                    <p>Follow us on social media for updates and inspiration.</p>
                    <div class="ui raised link list">
                        <a href="#" class="item">Facebook</a>
                        <a href="#" class="item">Twitter</a>
                        <a href="#" class="item">Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui raised section divider"></div>
        <div class="ui center aligned container">
            <div class="ui horizontal raised small divided link list">
                <a class="item" href="#">Privacy Policy</a>
                <a class="item" href="#">Terms of Use</a>
                <a class="item" href="#">Contact Us</a>
            </div>
        </div>
    </div>



</body>

</html>
<!-- Please don't that again -->