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
    <title>GWSC - LOGIN</title>
</head>
<body>
    <!-- So will be using this as a login form only -->
    
    <h1 class="logo">
        <i class="globe icon"></i><i class="swimmer icon"></i><i class="skating icon"></i><i class="snowboarding  icon"></i> <i class="kaaba icon"></i></h1>


    <center>
        <div class=" toast_success ui raised segments">
            <p><strong style="font-family: cursive;">Login  today</strong> as a swimmer, camping hoster even just wild person <br> at <strong>GWSC</strong> using your <strong> VERFIED EMAIL ADDRESS AND GSWC CODE</strong> as the offical member of <br>
                <strong style="font-family: cursive;">GLOBAL WILD SWIMMING AND CAMPING</strong>
            </p>
        </div>




        <form class="ui raised segments form-container" form action="web.index.php " method="post">
            <center>
                <div class="toast-container">
                    <div class="toast ">
                        <p class="message <?php echo $insert_result ? 'success' : 'error'; ?>">
                            <!-- <?php echo $message; ?> -->
                        </p>
                    </div>
                </div>
            </center>

            <fieldset class="ui piled segments" style="border-radius: 20px; padding:0.5%;">
                <legend style="font-size: 12px; font-weight:500;">Login - PPD</legend>
                <label for="email">EMAIL ADDRESS: <i class="mail icon"></i></label><span style="color:red;  font-size:large; font-weight:bolder;">*</span>
                <input type="email" name="email_address" id="email_address" placeholder="DEMO: johnfett6@gmail.com" autocomplete="off" aria-autocomplete="none" required>
                <br>
                <label for="national_id">GSWC CODE: <i class="address card icon"></i></label><span style="color:red;  font-size:large; font-weight:bolder;">*</span>
                <input style="text-transform: uppercase;" type="text" name="national_id" id="national_id_input" placeholder="DEMO: 1346FFR3" autocomplete="off" required> <br>
            </fieldset>
            <button style="margin-top: 2%;" type="submit" name="submit">
         <div  class="ui primary basic animated button" tabindex="0">
        <div class="visible content">Verify</div>
        <div class="hidden content">
            <i class="arrow right icon"></i>
        </div>
        </div>
      </button>
            <button type="reset" name="reset">
      <div  class="ui basic negative animated button" tabindex="0">
        <div class="visible content">Reset</div>
        <div class="hidden content">
            <i class="trash icon"></i>
        </div>
        </div>
      </button>
            <button type="login" name="login" id="registrationButton">
      <div  class="ui primary basic animated button" tabindex="0">
        <div class="visible content">Don't Have Account</div>
        <div class="hidden content">
            <i class="sign in icon"></i>
        </div>
        </div>
      </button>
            <script>
                const registrationButton = document.getElementById("registrationButton");

                registrationButton.addEventListener("click", () => {
                    // Redirect to the registration page
                    window.location.href = "./customer-verification.php"; // Replace with the actual URL of your registration page
                });
            </script>
            <button type="home" name="home">
      <div  class="ui  basic positive animated button" tabindex="0">
        <div class="visible content">Explore More</div>
        <div class="hidden content">
            <i class="home icon"></i>
        </div>
        </div>
      </button>

        </form>
    </center>
</body>
</html>