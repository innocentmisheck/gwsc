<?php
session_start();

// Database connection information
$servername = "localhost";
$username = "root";
$password = "";
$database = "gwsc";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle login attempts
function handleLogin($email, $password, $conn) {
    // Implement your login logic here.
    // You should query both the 'vistor_feedback' and 'booking_detail' tables to check if the user exists and has valid credentials.
    // You may use prepared statements for security.

    // Example query (adjust to your database schema):
    $query = "SELECT * FROM vistor_feedback WHERE email = ? AND gwsc_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Successful login, set user session data
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        // Redirect to a protected page
        header("Location: ../gwsc.php");
        exit();
    } else {
        // Failed login attempt
        $_SESSION['login_attempts']++;
        if ($_SESSION['login_attempts'] >= 3) {            
            // Lock the account for 10 minutes (you need to implement this logic)
            // You can store a timestamp in the database or in session to track when the lockout expires.
            // After 10 minutes, you can unlock the account.
            
        }
        // Provide an error message
        $message = "Invalid email or password. Please try again.";
    }
    $stmt->close();
    return $message;
}

// Handle form submission
if (isset($_POST['submit'])) {
    $email = $_POST['email_address'];
    $password = $_POST['national_id'];

    // Initialize login attempts count
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }

    // Call the handleLogin function to check login attempts and credentials
    $error_message = handleLogin($email, $password, $conn);
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
    <link rel="shortcut icon" href="../favicon-2.ico" type="image/x-icon">
    <!-- Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>GWSC - LOGIN</title>
</head>
<body>


<header class="nav-bar-primary" class="ui fixed top sticky">
            <nav>
                 <div class="ui inverted menu">
                    <a href="../gwsc.php"  class="item primary">
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
                        <a href="./vistor-login.php" class="item primary active">
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

    <center>
    <!-- So will be using this as a login form only -->
    <div class="video-container">
    <video autoplay loop muted playsinline class="back-video">
                    <source src="../public/images/pexels-jess-vide-8650134 (2160p).mp4" type="video/mp4">
    </video>
    

   
    
    <h1 style="margin-top:100px;" class="logo-icon">
        <i class="swimmer icon"></i><i class="skating icon"></i><i class="snowboarding  icon"></i><img src="../public/images/Circus Tent.png" alt="campingicon" width="2%" height="2%"></h1>

    
        <div class=" toast_success ui raised segments">
            <p><strong style="font-family: cursive;">Login  today</strong> as a swimmer, camping hoster even just wild person <br> at <strong>GWSC</strong> using your <strong> VERFIED EMAIL ADDRESS AND GSWC CODE</strong></p>
        </div>

        <form  class="ui raised segments form-container" method="post">
             <!-- Your HTML form elements go here (as provided in your question) -->

            <!-- Display error message if login fails -->
            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
                
            <fieldset class="ui piled segments" style="border-radius: 20px; padding:0.5%;">
                <legend style="font-size: 12px; font-weight:500;">Login - PPD</legend>
                <label for="email">EMAIL ADDRESS: <i class="mail icon"></i></label><span style="color:red;  font-size:large; font-weight:bolder;">*</span>
                <input type="email" name="email_address" id="email_address" placeholder="DEMO: johnfett6@gmail.com" autocomplete="off" required>
                <br>
                <label for="national_id">GSWC CODE: <i class="address card icon"></i></label><span style="color:red;  font-size:large; font-weight:bolder;">*</span>
                <input style="text-transform: uppercase;" type="text" name="national_id" id="national_id_input" placeholder="DEMO: 1346FFR3" autocomplete="off" required> 
                <br>
                <div class="g-recaptcha" data-sitekey="6LecU8UnAAAAABnbBE1Bdx76--2ODi4rFn-veVwZ"></div>

            </fieldset>
            <button style="margin-top: 2%;" type="submit" name="submit">
         <div  class="ui primary animated button" tabindex="0">
        <div class="visible content">LOGIN</div>
        <div class="hidden content">
            <i class="arrow right icon"></i>
        </div>
        </div>
      </button>
            <button type="reset" name="reset">
      <div  class="ui negative animated button" tabindex="0">
        <div class="visible content">RESET</div>
        <div class="hidden content">
            <i class="trash icon"></i>
        </div>
        </div>
      </button>
            <button type="login" name="login" id="registrationButton">
      <div  class="ui secondary animated button" tabindex="0">
        <div class="visible content">SIGN IN</div>
        <div class="hidden content">
            <i class="sign in icon"></i>
        </div>
        </div>
      </button>


      
            <script>
                const registrationButton = document.getElementById("registrationButton");

                registrationButton.addEventListener("click", () => {
                    // Redirect to the registration page
                    window.location.href = "./vistor-verification.php"; // Replace with the actual URL of your registration page
                });
            </script>
        

        </form>
        
        
</div>
</center>

<?php
    include '../src/inc/views/footer.php'
    ?></body>
    
    
<?php
// Close the database connection
$conn->close();
?>

    
</html>