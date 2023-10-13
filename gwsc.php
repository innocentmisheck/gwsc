<?php

// Include the connect.php file from src/controllers directory
require './src/inc/views/main.php';

$con = new mysqli('localhost', 'root', '', 'gwsc');

if (!$con) {
    die(mysqli_error($con));
}

$message = "Send the feedback and get in touch!";
$feedback = ""; // Initialize $feedback
$username = "My Account";

// Booking validation and data capturing

if (isset($_POST['booking'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email_address'];
    $phone = $_POST['phone'];
    $book_in = $_POST['check_in_date'];
    $book_out = $_POST['check_out_date'];
    $adults = $_POST['number_of_adults'];
    $children = $_POST['number_of_children'];
    $site = $_POST['site_name'];
    $pitch_availability = $_POST['availability'];
    $card_holder = $_POST['card_holder'];
    $card_number = $_POST['card_number'];
    $cvv = $_POST['cvv'];
    $exp_card_month = $_POST['card_exp_month'];
    $exp_card_year = $_POST['card_exp_year'];
    $billing_address =$_POST['billing_address'];


    $check_user_query = "SELECT * FROM `booking_detail` WHERE `booking_email` = '$email'";
    $check_user_result = mysqli_query($con, $check_user_query);
    $user_exists = mysqli_num_rows($check_user_result);
   

    if ($user_exists === 0) {
        $randomFloat = mt_rand() / mt_getrandmax();
        // Multiply by 9 to get a number between 0 and 9
        $randomFloat *= 9;
        // Format the number as a string without the dot (.)
        $randomString = "GBOSCING"  . str_replace('.', '', number_format($randomFloat, 4)); // You can adjust the number of decimal places if needed

        $insert_query = "INSERT INTO `booking_detail` (`id`, `booking_id`, `first_name`, `last_name`, `booking_email`,`phone`,`check_in_date`,`check_out_date`,`adults`,`children`,`site_name`, `pitch_availability`,`card_number`,`card_holder`,`billing_address`,`cvv`,`exp_card_year`,`exp_card_month`) VALUES ('','$randomString', '$first_name', '$last_name', '$email','$phone','$book_in','$book_out','$adults','$children','$site','$pitch_availability','$card_holder','$card_number','$billing_address','$cvv','$exp_card_year','$exp_card_month');";
        

        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            $message = "Booking ($randomString) was done successfully!";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
        } else {
            $message = "Booking with the provided details already exists.";
        }
        
}

// Check if the user exists based on email during initial page load
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $check_user_query = "SELECT * FROM `vistor_feedback` WHERE `email` = '$email'";
    $check_user_result = mysqli_query($con, $check_user_query);
    $user_exists = mysqli_num_rows($check_user_result);

    if ($user_exists === 1) {
        $row = mysqli_fetch_assoc($check_user_result);
        $username = $row['username'];
        $message = "Welcome back $username at GWSC";
        $feedback = $row['feedback']; // Retrieve existing feedback
    }
}


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $feedback = $_POST['feedback'];
    $newFeedback = $_POST['feedback']; // New feedback

    // Check if the "rememberMe" checkbox is checked
    $rememberMe = isset($_POST['rememberMe']) ? 1 : 0;

    $check_user_query = "SELECT * FROM `vistor_feedback` WHERE `username` = '$username'";
    echo json_encode($check_user_query);
    $check_feedback_query = "SELECT * FROM `vistor_feedback` WHERE `feedback` = '$feedback'";
    $check_feedback_query = "SELECT * FROM `vistor_feedback` WHERE `feedback` = '$feedback'";
    $check_user_result = mysqli_query($con, $check_user_query);
    $user_exists = mysqli_num_rows($check_user_result);

    if ($user_exists === 1) {
        // $message = "Welcome back $username at GWSC";
         // Update the feedback for the existing user
         $update_query = "UPDATE `vistor_feedback` SET `feedback` = '$newFeedback' WHERE `email` = '$email'";
         $update_result = mysqli_query($con, $update_query);
 
         if ($update_result) {
             $message = "Feedback updated for $username";
         } else {
             $message = "Error updating feedback: " . mysqli_error($con);
         }
    }

    if ($user_exists === 0) {

        $otp = '';
        for ($i = 0; $i < 6; $i++) {
            $digit = mt_rand(0, 9); // Generate a random digit between 0 and 9
            $otp .= $digit; // Append the digit to the OTP
        }
        
        // $otp now contains a 6-digit random OTP as a string
        $insert_query = "INSERT INTO `vistor_feedback` (`id`, `email`, `gwsc_id`, `username`, `feedback`, `remember_me`) VALUES ('', '$email', '$otp', '$username', '$feedback', '$rememberMe');";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            $message = "OTP generated is $otp use it for login";
        } else {
            $message = "Error: " . mysqli_error($con);
        }
    }
}

           // Query to count the number of users
             $sql = "SELECT COUNT(*) AS user_count FROM vistor_feedback";
            $result = mysqli_query($con, $sql);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $userCount = $row['user_count'];
            } else {
                $userCount = 0; // Handle the case where the query fails
            }


            // Get the view count for the current page
            if (isset($_GET['id'])) {
                // If "id" key exists in the URL parameters, assign its value to $pageId
                $pageId = $_GET['id'];

                // Retrieve the current view count for the page
                $sql = "SELECT view_count FROM page_views WHERE page_id = ?";
                // Execute the query to retrieve the view count
                // ... (execute the query and store the result in $currentViewCount)

                // Increment the view count
                $newViewCount = $currentViewCount + 1;

                // Update the database with the new view count
                $updateSql = "UPDATE page_views SET view_count = ? WHERE page_id = ?";
                // Execute the update query with $newViewCount and $pageId

                // Set the $viewCount variable to the updated view count
                $viewCount = $newViewCount;
            } else {
                // If "id" key is not present in the URL, handle the situation accordingly
                $pageId = 0; // Use a default value or handle the error as needed
                $viewCount = 0; // Initialize $viewCount to a default value
            }






?>


<body>
            
            <div class="video-container">
                <div class="ui center-container">
                <center>
                <h1 class="load">Loading Content...</h1>
                    <div class="loader"></div>
                <!-- <h1>Scroll up <i class="icon up arrow circle"></i></h1> -->
                </center>
                </div>
                <video autoplay loop muted playsinline class="video-slide back-video active">
                    <source src="public/images/pexels-jess-vide-5504895 (2160p).mp4" type="video/mp4">
                </video>
                <video autoplay loop muted playsinline class="video-slide back-video">
                    <source src="public/images/pexels-taryn-elliott-7108968 (2160p).mp4" type="video/mp4">
                </video>
                <video autoplay loop muted playsinline class="video-slide back-video">
                    <source src="public/images/production_id_4782131 (2160p).mp4" type="video/mp4">
                </video>
                <video autoplay loop muted playsinline class="video-slide back-video">
                    <source src="public/images/production_id_4782300 (2160p).mp4" type="video/mp4">
                </video>
                <video autoplay loop muted playsinline class="video-slide back-video">
                    <source src="public/images/production_id_4803766 (2160p).mp4" type="video/mp4">
        </video>
               
                <section class="home">
                    <div class="content active">
                        <h1>Join Us <br><span>Embracing Nature's Beauty!</span> </h1>
                        <strong>
                        <p>Dive into a world of breathtaking landscapes and invigorating swims. As a member of Global Wild Swimming and Camping, you'll unlock exclusive access to our incredible adventures, expert tips, and a vibrant community of like-minded nature enthusiasts.</p>
                        </strong>
                        <a href="../gwsc/views/vistor-verification.php">APPLY</a>  <a href="../gwsc/views/vistor-login.php">LOGIN</a>
                    </div>
                    <div class="content">
                        <h1>Discover Untamed <br>SWIMMING CAMPINGs</h1>
                        <strong>
                            <p>Join us to explore breathtaking landscapes and invigorating swims. As a member of Global Wild Swimming and Camping, you'll gain access to exclusive adventures, expert tips, and a vibrant community of nature enthusiasts.</p>
                        </strong>
                        <a href="../gwsc/views/vistor-verification.php">APPLY</a> <a href="../gwsc/views/vistor-login.php">LOGIN</a>
                    </div>
                    <div class="content">
                    <h1>Campings & Swimming<br><span>Beneath the Stars!</span> </h1>
                        <strong>
                        <p>Immerse yourself in a world of breathtaking landscapes and invigorating swims, while also experiencing the thrill of camping under the stars. As a member of Global Wild Swimming and Camping, you'll unlock exclusive access to our incredible adventures.</p>
                        </strong>
                        <a href="../gwsc/views/vistor-verification.php">APPLY</a> <a href="../gwsc/views/vistor-login.php">LOGIN</a>
                    </div>
                    <div class="content">
                        <h1>From Waters to Wilderness<br><span>GWSC Adventures.</span></h1>
                        <strong>
                            <p>Embark on a journey that combines the serenity of wild swimming with the thrill of camping. Global Wild Swimming and Camping offers you the chance to experience nature's beauty like never before.Unlock your dreams today.</p>
                        </strong>
                        <a href="../gwsc/views/vistor-verification.php">APPLY</a> <a href="../gwsc/views/vistor-login.php">LOGIN</a>
                    </div>

                    <div class="content">
                        <h1>Beyond the Beaten Path<strong><span> Off-the-Grid Escapes.</span></strong></h1>
                        <strong>
                            <p>Escape the ordinary and dive into extraordinary adventures. Join us in discovering remote locations where wild swimming and camping converge for an unparalleled outdoor experience.Meet familiy and friend the enjoy.</p>
                        </strong>
                        <a href="../gwsc/views/vistor-verification.php">APPLY</a> <a href="../gwsc/views/vistor-login.php">LOGIN</a>
                    </div>

                    <div class="content">
                        <h1>Nature's Playground Awaits<br><span>Dive, Camp, and Connect with Global Wild Swimming and Camping's Nature-Loving Community.</span></h1>
                        <strong>
                            <p>Connect with fellow nature enthusiasts as you explore the beauty of wild swimming and camping. Global Wild Swimming and Camping brings people together to share in the joys of outdoor exploration.</p>
                        </strong>
                        <a href="../gwsc/views/vistor-verification.php">APPLY</a> <a href="../gwsc/views/vistor-login.php">LOGIN</a>
                    </div>

                    <div class="content">
                        <h1>Plunge into Adventure<br><span>Join Global Wild Swimming and Camping to Reconnect with Nature's Majesty and Find Your Inner Explorer.</span></h1>
                        <strong>
                            <p>Rediscover your sense of adventure by joining Global Wild Swimming and Camping. Experience the wonder of nature, from serene swims to rugged campsites, all while forging lasting connections.</p>
                        </strong>
                        <a href="../gwsc/views/vistor-verification.php">APPLY</a> <a href="../gwsc/views/vistor-login.php">LOGIN</a>
                    </div>
                    <div class="media-icons">
                        <a target="blank" href="https://www.facebook.com/"><i class="facebook square icon"></i></a>
                        <a target="blank" href="https://www.twitter.com/"><i class="twitter icon"></i></a>
                        <a target="blank" href="https://www.instagram.com/"><i class="instagram icon"></i></a>
                    </div>
                    <div class="slide-navigation">
                    <div class="nav-btn active"></div>
                    <div class="nav-btn"></div>
                    <div class="nav-btn"></div>
                    <div class="nav-btn"></div>
                    <div class="nav-btn"></div>
                    <!-- <div class="nav-btn"></div> -->
                </div>         
                </section>
        </div>

        <script>
            const btns =document.querySelectorAll(".nav-btn");
            const slides =document.querySelectorAll(".video-slide");
            const contents =document.querySelectorAll(".content");


            var sliderNav =function(manual){
                btns.forEach((btn)=>{
                    btn.classList.remove("active");
                });

                slides.forEach((slide)=>{
                    slide.classList.remove("active");
                });

                contents.forEach((content)=>{
                    content.classList.remove("active");
                });



                btns[manual].classList.add("active");
                slides[manual].classList.add("active");
                contents[manual].classList.add("active");



            }

            btns.forEach((btn, i)=>{
                btn.addEventListener("click", () =>{
                    sliderNav(i);
                });
            });

        </script>
        

        <!-- Computer Main Navbar -->
        <header class="nav-bar-primary" class="ui fixed top sticky">
            <nav>
                 <div class="ui inverted menu">
                    <a class="item button primary active">
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
                            <a class="dropdown-item" href="#availability"><i  style="color:black !important;"  class="calendar alternate icon"></i>Availability</a>
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
                                        <a class="sub-dropdown-item" href="#"><i class="icon swimmer"></i> Swimming</a>
                                        <a class="sub-dropdown-item" href="#"><img src="public/images/Circus Tent.png" alt="campingicon" width="12%" height="12%"> Camping</a>
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
                            <a class="dropdown-item" href="#local_attractions"><i style="color:black;" class="map marker alternate icon"></i>Local attractions</a>
                        </strong>
                        <strong>
                            <a class="dropdown-item" href="#./views/vistor-login.php"><i style="color:black;" class="users icon"></i>About GWSC</a>
                        </strong>
                        
                        </div>
                        </div>
                        <!-- <button   class="primary button">
                        <strong>Login <i style="color:white !important;" class="sign in alternate icon"></i>
                        </strong>
                        </button>    -->
                        <!-- <a class="item primary">
                        <strong>About <i style="color:white !important;" class="users icon"></i>
                    </strong>                  
                      </a> -->
                      <a class="item positive" aria-disabled="true">
                            <strong style="margin-top:4px;">
                            <?php echo $username?> <i style="color:white !important;" class="user icon"></i>
                            </strong>
                        </a>
                                     
                    
                    
                    <div class="right menu">
                    <div class="item primary">
                        <div class="ui icon input">
                            <input type="text" placeholder="Search..." id="searchInput">
                            <i class="search link icon" id="searchIcon"></i>
                        </div>
                    </div>

                    <div style="color:white; margin-right:4px;" id="searchResults">
                        <!-- Display search results here -->
                    </div>

                    <script>
                            const searchInput = document.getElementById('searchInput');
                            const searchIcon = document.getElementById('searchIcon');
                            const searchResults = document.getElementById('searchResults');

                            // Google Custom Search Engine credentials
                            const apiKey = 'YOUR_API_KEY'; // Replace with your API key
                            const cx = 'YOUR_CSE_ID'; // Replace with your Custom Search Engine ID

                            // Add an event listener for the search icon click
                            searchIcon.addEventListener('click', () => {
                                performSearch();
                            });

                            // Add an event listener for the Enter key press in the input field
                            searchInput.addEventListener('keydown', (event) => {
                                if (event.key === 'Enter') {
                                    performSearch();
                                }
                            });

                            // Define the search function
                            function performSearch() {
                                const searchTerm = searchInput.value;
                                const apiUrl = `https://www.googleapis.com/customsearch/v1?key=${apiKey}&cx=${cx}&q=${searchTerm}`;

                                // Clear previous search results
                                searchResults.innerHTML = '';

                                // Make a GET request to the Google Custom Search API
                                fetch(apiUrl)
                                    .then((response) => response.json())
                                    .then((data) => {
                                        // Process and display search results
                                        const items = data.items || [];

                                        if (items.length === 0) {
                                            searchResults.innerHTML = 'No results found.';
                                        } else {
                                            items.forEach((item) => {
                                                const resultElement = document.createElement('div');
                                                resultElement.innerHTML = `<a href="${item.link}" target="_blank">${item.title}</a><p>${item.snippet}</p>`;
                                                searchResults.appendChild(resultElement);
                                            });
                                        }
                                    })
                                    .catch((error) => {
                                        console.error('Error fetching search results:', error);
                                    });
                            }
                        </script>


                        <a class="ui item primary">
                        <strong class="logo">Global Wild Swimming Camping</strong>
                        <strong class="logo2">Global Wild Swimming Camping <i style="margin-left:18px;" class="swimmer icon"></i></strong>
                        </a>
                    </div>
                </div>
            </nav>
        </header>


        <!-- Small devices Navbar -->
        <header>
            <div  class="ui mobile only grid">
            <!-- Mobile Menu -->
            <div class="ui top fixed inverted menu">
            <div class="ui container">
                <!-- Logo -->
                <a class="item" href="#">
                    <h4><?php echo $username?><i class="icon user circle"></i></h4>
                </a>
                <div class="right menu">
                <!-- Dropdown Menu Trigger -->
                <div class="ui simple dropdown item">
                    <i class="icon bars"></i> <!-- Three vertical dots icon -->
                    <div class="menu">
                    <a class="item" href="#"><i class="icon home"></i> Explore</a>
                    <a class="item" href="#"><i class="icon info circle"></i> Information</a>
                    <a class="item" href="#"><i class="icon trophy"></i> Features</a>
                    <a class="item" href="#"><i class="icon users"></i> About Us</a>
                    <a class="item" href="./views/vistor-login.php"><i class="icon sign in"></i> Login</a>
                    <a class="item" href="./views/vistor-login.php"><i class="icon fire"></i> GWSC</a>


                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Rest of your content goes here -->
        </header>
         <!-- Social Media Icons -->
        <div class="sticky-icons">
            <a href="https://www.facebook.com" target="_blank">
            <i class="icon facebook"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
            <i class="icon instagram"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
            <i class="icon twitter"></i>
            </a>
        </div>


        <div style="margin-top:50px; text-transform:uppercase;" class="ui mobile only grid segment pilled segment">
            <h1>Join GWSC & Get verfied as a SWIMMER with 1 year Experience.</h1>
        </div>
                    <!-- Slideshow Container -->
            <div id="mini-slide" class="ui mobile only grid segment">
            <div class="slideshow-container">
                <!-- Slides -->
                <div class="mySlides">
                <img src="public/images/pexels-lukas-1309584.jpg" style="width: 100%; margin-bottom:10px;" alt="Camping Image 1">
                <div class="text"><details><summary>Campings</summary><p>
                    Explore the beauty of nature from the comfort of your home. Join our virtual camping adventures and connect with fellow outdoor enthusiasts. Learn camping skills, discover breathtaking landscapes, and immerse yourself in the world of online camping.
                </p></details>
                </div>
                </div>

                <div class="mySlides">
                <img src="public/images/pexels-david-geib-3220760.jpg" style="width: 100%; margin-bottom:10px;" alt="Swimming Image 1">
                <div class="text"><details><summary>Dive into Refreshing Waters</summary><p>
                Make a splash this summer! Dive into crystal-clear waters and enjoy the thrill of swimming in some of the most beautiful aquatic destinations. Whether you're a seasoned swimmer or a beginner, our swimming experiences offer fun and relaxation for everyone.
                </p></details>
                </div>
                </div>

                <!-- Navigation Dots -->
                <div style="text-align: center; margin-top: 10px;">
                <span class="dot"></span>
                <span class="dot"></span>
                </div>
            </div>
            </div>

            <!-- JavaScript for Slideshow -->
            <script>
                let slideIndex = 0;

                function showSlides() {
                const slides = document.getElementsByClassName("mySlides");
                const dots = document.getElementsByClassName("dot");

                for (let i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }

                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1;
                }

                for (let i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }

                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 5000); // Change image every 2 seconds
                }

                // Start the slideshow when the page loads
                showSlides();
            </script>
            
    <script>
        // JavaScript to add "active-link" class to the clicked link
        document.addEventListener("DOMContentLoaded", function () {
            const navLinks = document.querySelectorAll("nav a");

            navLinks.forEach(function (link) {
                link.addEventListener("click", function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute("href").substring(1); // Remove the "#" symbol
                    const targetSection = document.getElementById(targetId);

                    // Remove the "active-link" class from all links
                    navLinks.forEach(function (link) {
                        link.classList.remove("active-link");
                    });

                    // Add the "active-link" class to the clicked link
                    this.classList.add("active-link");

                    // Scroll to the target section smoothly
                    targetSection.scrollIntoView({
                        behavior: "smooth",
                    });
                });
            });
        });
        
    </script>
    


        
        

        
                 
        <!-- Forms that will appear if the  vistor is not register or not verfied by email in the database --> 
        <div id="termsModal"class="ui modal large">
                    
        <div class="ui raised segment container">
            <h1>Terms and Conditions - GWSC</h1>
            
            <h2>1. Acceptance of Terms</h2>
            <p>By accessing or using the Global Wild Swimming Camping website, you agree to abide by these terms and conditions.</p>
            
            <h2>2. Privacy Policy</h2>
            <p>Our Privacy Policy outlines how we collect, use, and protect your personal information.</p>
            
            <h2>3. User Conduct</h2>
            <p>You agree to use this website in a manner that complies with all applicable laws and regulations and is not harmful or disruptive.</p>
            
            <h2>4. Disclaimer</h2>
            <p>We do not guarantee the accuracy or completeness of the information provided on this website, and we are not responsible for any errors or omissions.</p>
            
            <h2>5. Changes to Terms and Conditions</h2>
            <p>We may update these terms and conditions from time to time. It is your responsibility to review them periodically for changes.</p>
            
            <!-- Add more sections as needed -->
            
            <h2>Contact Information</h2>
            <p>If you have any questions or concerns regarding these terms and conditions, please contact us at <a href="mailto:info@globalwildswimming.com">info@globalwildswimming.com</a>.</p>
        </div>

        </div>
        
            <!-- Modal -->
            <div id="myModal" class="ui mini modal">
            <div id="result" class="ui message"></div>
                <div class="header">
                    Subscribe and Contact at GWSC
                </div>
                <div class="content">
                    <form class="ui form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="field">
                            <label>Email <i class="envelope icon"></i></label>
                            <input id="email" type="email" name="email" placeholder="jeffydan@gmail.com" required>
                        </div>
                        <div class="equal width fields">
                            <div class="field">
                                <label>Username <i class="user circle icon"></i></label>
                                <input type="text" name="username" placeholder="DanJeffy07">
                            </div>
                        </div>
                        <div class="field">
                            <label>Feedback <i class="rss square icon"></i></label>
                            <textarea rows="2" name="feedback" data-gramm="false" wt-ignore-input="true" placeholder="Your feedback matters!"></textarea>
                        </div>
                        <div class="ui checkbox">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <label for="rememberMe">I agree to the terms and conditions. <div class="ui inverted link list">
                                <a id="OpentermsModal" style="font-size:12px"class="tiny link">Privacy & Terms</a>
                            </div></label>
                        </div>
                        <!-- Add more form fields as needed -->
                        <div class="ui segment">
                            <center>
                            <div class="actions">
                            <button onlick="startLoading()" type="submit" name="submit">
                                <div  class="ui tiny primary animated button" tabindex="0">
                                    <div class="visible content">SUBMIT</div>
                                    <div class="hidden content">
                                        <i class="paper plane icon"></i>
                                    </div>
                                    </div>
                            </button>
                            <button type="cancel" name="cancel">
                                <div id="cancelModalButton"  class="ui tiny negative animated button" tabindex="0">
                                    <div class="visible content">CANCEL</div>
                                    <div class="hidden content">
                                        <i class="trash icon"></i>
                                    </div>
                                    </div>
                            </button>
                            <button id="loginButton" type="login" name="login">
                                <div  class="ui tiny secondary animated button" tabindex="0">
                                    <div class="visible content">LOGIN</div>
                                    <div class="hidden content">
                                        <i class="user circle icon"></i>
                                    </div>
                                    </div>
                            </button>
                            </div>
                        </div>
                        <script>
                        const loginButton = document.getElementById("loginButton");

                        loginButton.addEventListener("click", () => {
                            // Redirect to the login page
                            window.location.href = "./views/vistor-login.php"; // Replace with the actual URL of your page
                        });
                    </script>
                            </center>
                           
                           
                    </form>
                </div>
                
            </div>

            <script>
                $(document).ready(function () {
                    // Show modal when the button is clicked
                    $('#showModalButton').click(function () {
                        $('#myModal').modal('show');
                    });
                });
                $(document).ready(function () {
                    // Show modal when the button is clicked
                    $('#OpentermsModal').click(function () {
                        $('#termsModal').modal('show');
                    });
                });

                 // Hide modal when the "Cancel" button is clicked
                $('#cancelModalButton').click(function () {
                 $('#myModal').modal('hide');
                });

                      // Automatically open the modal after 10 seconds
                

                     // Automatically open the modal after 10 seconds
                     setTimeout(function () {
                 $('#AdvertModal').modal('show');
                 }, 7000); // 10000 milliseconds = 10 seconds
            
            </script>

          
    
           <!-- Button to trigger the modal -->
        <!-- <button id="showModalButton" class="ui button">Show Modal</button>      -->
      <div id="primary-promo-registration" class="ui raised container segment">
        <h2 style="text-align:right;" class="ui header">BECAME A MEMBER</h2>
        <p style="text-align:right;"> <strong>Register today </strong>as a swimmer, camping hoster even just wild person <br> at <strong>GWSC</strong> so that you can learn and been <strong> credited</strong> as the offical member of <br><strong style="font-family: cursive;">GLOBAL WILD SWIMMING AND CAMPING</strong></p>
                <div class="ui placeholder segment">
                <a href="./views/vistor-verification.php">
                <div class="ui big button">
                    <i class="signup icon"></i>
                    APPLY TODAY
                </div>
                </a>
                </div>
            </div>
        
        </div>
        <!-- Responsive images -->

        <script>
            $('.special.cards .image').dimmer({
            on: 'hover'
            });  
            
            $('.ui.dropdown').dropdown();
        </script>

            <div id="promo-registartion" class="ui horizontal segment">
            <h2 class="ui header">
            <img class="promo-primary" src="public/images/Swimming.png" alt="campingicon">
            <div class="content">
                <h3>BECAME A MEMBER</h3>
                <div class="sub header"> <p> <strong>Register today </strong>as a swimmer, camping hoster even just wild person <br> at <strong>GWSC</strong> so that you can learn and been <strong> credited</strong> as the offical member of <br><strong style="font-family: cursive;">GLOBAL WILD SWIMMING AND CAMPING</strong></p>
            
            </div>

                <button id="gotoReg" style="float:right;"class="mini ui button primary">Find More</button>
            </div>
            </h2>
            </div>
            
        <div id="availability" class="ui raised segment container">
        <div class="feature-info">
                <h2><i class="icon search"></i>Availability</h2>
                <p>This form provides Availability Information of events features– e.g., pitch types availability, features, location (including maps) and local attractions.</p>
            </div>
            <div class="ui container">
            <form  class="ui form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="three fields inline-flex">
                <!-- Date Input -->
                <div class="field">
                <label><i class="icon alternate calendar"></i> Date</label>
                <input type="date" name="date" placeholder="Date">
                </div>

                <!-- Time Input -->
                <div class="field">
                <label><i class="icon clock"></i> Time</label>
                <input type="time" name="time" placeholder="Time">
                </div>

                <!-- Guest Input -->
                <div class="field">
                <label><i class="icon users"></i> Guests</label>
                <input type="number" name="guests" placeholder="Guests">
                </div>
            </div>

                <!-- Check Availability Button -->
                <button class="ui primary button" type="submit">Check Availability</button>
            </div>
            </form>
 


            <div class="ui  segment">
                <center>
                <h2>Availabilities Information</h2>
                <div class="counter">
                
                <i style="font-size:50px; margin:3%;" class="icon swimmer" > <h2 style="margin-top:25%;"><?php echo $userCount; ?></h2></i>
                <i style="font-size:50px; margin:5%;" class="icon skating" > <h2 style="margin-top:25%;">40</h2></i>
                <i style="font-size:50px; margin:5%;" class="icon users" > <h2 style="margin-top:25%;"><?php echo $userCount; ?></h2></i>
                </div>
                </center>
            </div>
        </div>
        </div>
            <!-- JavaScript to handle loading -->
    <script>
        // Function to show the loader
        function showLoader() {
            document.querySelector('.center-container').style.display = 'block';
        }

        // Function to hide the loader
        function hideLoader() {
            document.querySelector('.center-container').style.display = 'none';
        }

        // Simulate a loading delay
        function simulateLoading() {
            showLoader(); // Show the loader
            setTimeout(function() {
                hideLoader(); // Hide the loader after a certain time (adjust as needed)
            }, 1000); // Adjust the delay as needed
        }

        // Function to start loading on button click
        function startLoading() {
            simulateLoading();
        }
    </script>
            
            <!-- Simulate a delay to remove the spinner -->
            <script>
                setTimeout(function() {
                    document.querySelector('.loader').style.display = 'none';
                    document.querySelector('.center-container').style.display = 'none';
                    document.querySelector('.center-container').style.overflow = 'hidden';

                }, 4000); // Adjust the delay as needed
            </script>
        <div class="ui container segment">
        <div class="map-and-contact">
            <!-- Map container -->

            <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7743.390865127202!2d33.759849067386384!3d-13.976725684307238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1921d317532fc6af%3A0x65b126ce77a42c71!2sCOSOMA%20House!5e0!3m2!1sen!2smw!4v1696235285077!5m2!1sen!2smw" width="2000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div style="display:none;" class="center-container">
                <div class="loader"></div>
            </div>
            </div>

            <!-- Contact form container -->
            <div class="contact-form">
            <h2>Get Help from GWSC <i class="icon alternate help"></i></h2>
            <p>Everything that will submitted will be view and monitored and the one who seek the support wll helped immediately.</p>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <!-- <div class="g-recaptcha" data-sitekey="6LecU8UnAAAAABnbBE1Bdx76--2ODi4rFn-veVwZ"></div> -->


                <button type="submit" class="ui button primary">Submit</button>
            </form>
            </div>
        </div>

            
        </div>

        <script>
        // Function to initialize the map
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 37.7749, lng: -122.4194 }, // Set the initial map center (San Francisco in this example)
            zoom: 10, // Set the initial zoom level
            });

            // You can add markers, polylines, and other features to the map as needed.
        }
        // Function to initialize the map
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 37.7749, lng: -122.4194 }, // Set the initial map center (San Francisco in this example)
            zoom: 10, // Set the initial zoom level
            });

            // You can add markers, polylines, and other features to the map as needed.
        }

        // Call the initMap function when the page loads
        google.maps.event.addDomListener(window, 'load', initMap);

        </script>

        



         <div id="local_attractions" class="ui raised segment container">

         <h3><img src="public/images/Swimming.png" alt="campingicon" width="50px"><br>
         Wild Swimming - Features & Local Attractions </h3>  
            <div class="responsive">
            <div class="gallery">
            <div class="ui card fluid">
                <div class="ui slide masked reveal image">
                    <img src="public/images/pexels-sergio-souza-1936948.jpg" class="visible content">
                    <img src="public/images/pexels-sergio-souza-1936954.jpg" class="hidden content">
                </div>
                <div class="content">
                    <a class="header">Swimming Supporters</a>
                    <div class="meta">
                    <span class="date">
                    <i class="clock outline icon"></i>
                    Dec 2022
                    </span>
                    <br>
                    <div class="ui icon buttons">
                    <button class="ui red button">
                        <i class="heart icon"></i>
                    </button>
                    <button class="ui blue button">
                        <i class="retweet icon"></i>
                    </button>
                    <button class="ui green button active">
                        <i class="folder open icon"></i>
                    </button>
                    
                    </div>
                    </div>
                </div>
                <div class="extra content">
                    <a>
                    <i class="users icon"></i>
                    174 Members
                    </a>
                    <a style="float:right;" >
                    <i class="eye icon"></i>
                    <?php echo $userCount; ?></h2> Views
                    </a>
                </div>
           </div>
            </div>
            </div>


            <div class="responsive">
            <div class="gallery">
            <div class="ui card fluid">
                <div class="ui slide masked reveal image">
                    <img src="public/images/pexels-min-an-801623.jpg" class="visible content">
                    <img src="public/images/pexels-william-liu-17897849.jpg" class="hidden content">
                </div>
                <div class="content">
                    <a class="header">Family &amp; Friends</a>
                    <div class="meta">
                    <span class="date">
                    <i class="clock outline icon"></i>
                    Jun 2023
                    </span>
                    <br>
                    <div class="ui icon buttons">
                    <button class="ui red button">
                        <i class="heart icon"></i>
                    </button>
                    <button class="ui blue button">
                        <i class="retweet icon"></i>
                    </button>
                    <button class="ui green button active">
                        <i class="folder open icon"></i>
                    </button>
                    
                    </div>
                    </div>
                </div>
                <div class="extra content">
                    <a>
                    <i class="users icon"></i>
                    200 Members
                    </a>
                    <a style="float:right;" >
                    <i class="eye icon"></i>
                    <?php echo $userCount; ?></h2> Views
                    </a>
                </div>
           </div>
            </div>
            </div>

            <div class="responsive">
            <div class="gallery">
            <div class="ui card fluid">
                <div class="ui slide masked reveal image">
                    <img src="public/images/pexels-edneil-jocusol-2326887.jpg" class="visible content">
                    <img src="public/images/pexels-pixabay-160849.jpg" class="hidden content">
                </div>
                <div class="content">
                    <a class="header">Age is just a number</a>
                    <div class="meta">
                    <span class="date">
                    <i class="clock outline icon"></i>
                    2 days
                    </span>
                    <br>
                    <div class="ui icon buttons">
                    <button class="ui red button">
                        <i class="heart icon"></i>
                    </button>
                    <button class="ui blue button">
                        <i class="retweet icon"></i>
                    </button>
                    <button class="ui green button active">
                        <i class="folder open icon"></i>
                    </button>
                    
                    </div>
                    </div>
                </div>
                <div class="extra content">
                    <a>
                    <i class="users icon"></i>
                    42 Members
                    </a>
                    <a style="float:right;" >
                    <i class="eye icon"></i>
                    <?php echo $userCount; ?></h2> Views
                    </a>
                </div>
           </div>
            </div>
            </div>

            <div class="responsive">
            <div class="gallery">
            <div class="ui card fluid">
                <div class="ui slide masked reveal image">
                    <img src="public/images/pexels-yulianto-poitier-1231365.jpg" class="visible content">
                    <img src="public/images/pexels-kampus-production-8623433.jpg" class="hidden content">
                </div>
                <div class="content">
                    <a class="header">Don't miss the JOURNEY !</a>
                    <div class="meta">
                    <span class="date">
                    <i class="clock outline icon"></i>
                    3 hours
                    </span>
                    <br>
                    <div class="ui icon buttons">
                    <button class="ui red button">
                        <i class="heart icon"></i>
                    </button>
                    <button class="ui blue button">
                        <i class="retweet icon"></i>
                    </button>
                    <button class="ui green button active">
                        <i class="folder open icon"></i>
                    </button>
                    
                    </div>
                    </div>
                </div>
                <div class="extra content">
                    <a>
                    <i class="users icon"></i>
                    63 Members
                    </a>
                    <a style="float:right;" >
                    <i class="eye icon"></i>
                    <?php echo $userCount; ?></h2> Views
                    </a>
                </div>
           </div>
            </div>
            </div>
            <!-- Feature Div -->
    

            <div class="clearfix"></div>

             </div>
        </div>
        </div>
            <!-- Advert Modal -->
            <!-- <button class="ui button" id="openAdvert">Advert Now</button> -->
            <div id="AdvertModal" class="ui mini modal">
                <div class="header">
                    October 2023 - December 2023 <br> Dive In!
                <div class="ui green top right attached label">Ads</div>
                </div>
                <center>
                <div class="image">
               <h4>Book and Explore with GWSC</h4>
                    <p>🌊 Explore Nature's Beauty <br>🏕️ Camp Under the Stars <br>
                        🏊‍♂️ Swim in Paradise</p>
                    <img style="border-radius:10px;" src="public/images/pexels-david-geib-3220760.jpg" alt="ad.jpg" width="80%">
                </div>
                <b>Escape. Reconnect. Thrive. 🌟</b>

                </center>


                <center>
                <div style="margin:2%" class="actions">
                <!-- Submit Button -->
                <button id="openModal" type="submit" name="submit">
                    <div  class="ui small primary animated button" tabindex="1">
                        <div class="visible content">BOOK NOW</div>
                        <div class="hidden content">
                            <i class="bookmark icon"></i>
                        </div>
                    </div>
                </button>
                <button id="openSubcribe" type="openSubcribe" name="cancel">
                    <div  class="ui small negative animated button" tabindex="2">
                        <div class="visible content">CANCEL</div>
                        <div class="hidden content">
                            <i class="trash icon"></i>
                        </div>
                    </div>
                </button>

                </div>
                </center>
                
            </div>
            <!-- Online GWSC Booking system -->

            <!-- Modal Trigger Button -->
            <!-- <button class="ui button" id="openModal">Book Now</button> -->
           
            <!-- Modal Structure -->
            <div class="ui large modal" id="bookingModal">
            <div class="header">
               <i class="icon swimmer"></i> GWSC Booking & Reservation
              <div class="ui red bottom right attached label">Fill all the REQUIRED spaces and this booking system is still under development</div>

            </div>
            <div class="content">
                <form class="ui form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
                <!-- Section 1: Personal Information -->
                <h4 class="ui dividing header"><i class="icon user circle"></i>Contact Information</h4>
                <div class="four fields">
                         <div class="field">
                         <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name">
                        </div>
                        <div class="field">
                        <label for="middle_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name">
                        </div>
                        <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email_address" id="email_address" placeholder="REQUIRED" required>
                        </div>
                        <div class="field">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="phone">
                        </div>
                </div>
                
                <!-- Add more personal information fields as needed -->
                <?php
                // Retrieve site names from the 'siteavailability' table
                $sql = "SELECT SiteID, SiteName FROM siteavailability";
                $result = $con->query($sql);

                $siteOptions = "";
                while ($row = $result->fetch_assoc()) {
                    $siteID = $row['SiteID'];
                    $siteName = $row['SiteName'];
                    $siteOptions .= "<option value='$siteID'>$siteName</option>";
                }

                // Retrieve pitch types from the 'pitchavailability' table
                $sql = "SELECT DISTINCT PitchType FROM pitchavailability";
                $result = $con->query($sql);

                $pitchOptions = "";
                while ($row = $result->fetch_assoc()) {
                    $pitchType = $row['PitchType'];
                    $pitchOptions .= "<option value='$pitchType'>$pitchType</option>";
                }


                ?>
                                <!-- Section 3: Booking Details -->
                <h4 class="ui dividing header"><i class="icon file alternate outline"></i>Booking Details</h4>
                <!-- Add fields for check-in date, check-out date, number of adults, number of children, etc. -->
                <div class="two fields">
                    <div class="field">
                        <label for="site">Site Name</label>
                        <select class="ui fluid search dropdown" name="site_name" placeholder="REQUIRED"  required>
                            <option value="">Select a Site</option>
                            <?php echo $siteOptions; ?>
                        </select>
                    </div>
                    <div class="field">
                        <label for="availability">Availability</label>
                        <select class="ui fluid search dropdown" name="availability" placeholder="REQUIRED"  required>
                            <option value="">Select an Availability</option>
                            <?php echo $pitchOptions; ?>
                        </select>
                    </div>
                </div>
                

                <div class="four fields">
                    <div class="field">
                        <label for="">Check In Date</label>
                        <input type="datetime-local" name="check_in_date" id="check_in_date" placeholder="REQUIRED"  required>
                    </div>
                    <div class="field">
                        <label for="">Check Out Date</label>
                        <input type="datetime-local" name="check_out_date" id="check_out_date" placeholder="REQUIRED"  required>
                    </div>
                
                    <div class="field">
                        <label for="">Number Of Adults</label>
                        <input type="number" name="number_of_adults" id="number_of_adults" placeholder="REQUIRED"  required>
                    </div>
                    <div class="field">
                        <label for="">Number Of Children</label>
                        <input type="number" name="number_of_children" id="number_of_children" placeholder="REQUIRED"  required>
                    </div>
                </div>
                <!-- Section 4: Payment Information -->                              
                <h4 class="ui dividing header"><i class="icon credit card outline"></i>Payment Information</h4>
                <div class="three fields">
                <div class="field">
                 <label>Credit Card Holder</label>
                <input type="text" name="card_holder" placeholder="Holdername" placeholder="REQUIRED"  required>
                 </div>
                 <div class="field">
                 <label>Credit Card Number</label>
                <input type="text" name="card_number" placeholder="Credit Card Number" placeholder="REQUIRED"  required>
                 </div>
                 <div class="field">
                 <label>Billing Address</label>
                <input type="text" name="billing_address" placeholder="Billing Address" placeholder="REQUIRED"  required> 
                 </div>
                </div>
                
                <?php
                        // Retrieve months from the 'months' table
                        $sql = "SELECT month_name FROM months"; // Assuming your table is named 'months'
                        $result = $con->query($sql);

                      if ($result->num_rows > 0) {
                          // Fetch the data and store it in an array
                          $months = array();
                          while ($row = $result->fetch_assoc()) {
                              $months[] = $row['month_name'];
                          }
                    }
                
                ?>
                <div class="three fields">
                    <div class="field">
                        <label for="">Expiration Card</label>
                        <select class="ui fluid search dropdown" name="card_exp_month">
                            <?php
                            foreach ($months as $month) {
                                echo "<option value='$month'>$month</option>";
                            }
                            ?>
                        </select>

                    </div>
                    <div class="field">
                        <label for="">Expiration Card</label>
                        <select class="ui fluid search dropdown" name="card_exp_year">
                            <?php
                            $currentYear = date("Y");
                            $endYear = 3000;

                            for ($year = $currentYear; $year <= $endYear; $year++) {
                                echo "<option value='$year'>$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="field">
                    <label>CVV</label>
                    <input type="text" name="cvv" placeholder="CVV-2252-3532-32" placeholder="REQUIRED" required>
                    </div>
                    </div>
                      <!-- End of Payment Information Section -->

                     <div class="actions">
                    <!-- Submit Button -->
                    <button type="booking" name="booking">
                    <div  class="ui positive animated button" tabindex="0">
                        <div class="visible content">SUBMIT</div>
                        <div class="hidden content">
                            <i class="paper plane icon"></i>
                        </div>
                    </div>
                </button>
                <button type="cancel" name="cancel">
                    <div  class="ui negative animated button" tabindex="0">
                        <div class="visible content">CANCEL</div>
                        <div class="hidden content">
                            <i class="trash icon"></i>
                        </div>
                    </div>
                </button>

                </div>
               
                </div>
            </form>    
            </div>

        


            <script>
                    // Function to check if the booking modal is open
                    function isBookingModalOpen() {
                        return $('#bookingModal').hasClass('show');
                    }

                    // Function to open the booking modal
                    function openBookingModal() {
                        $('#bookingModal').modal('show');
                    }

                    // Automatically open the modal after 10 seconds if the booking modal is not open
                    $(document).ready(function () {
                        setTimeout(function () {
                            if (isBookingModalOpen()) {
                                openBookingModal();
                            }
                            else{
                                // setTimeout(function () {
                                // $('#myModal').modal('show');
                                // }, 20000); // 20000 milliseconds = 20 seconds
                            }
                        }); // 10000 milliseconds = 10 seconds
                    });

                    // Initialize the modal
                    $('#openModal').click(function () {
                        openBookingModal();
                    });

                    

                </script>


            <script>
            // Initialize the modal
            $('#openAdvert').click(function() {
                $('#AdvertModal').modal('show');
            });

            $('#openSubcribe').click(function() {
                $('#myModal').modal('show');
            });
            </script>
    
    

    <center>
                <div class="toast-container">
                    <div class="toast">
                        <p class="message <?php echo $insert_result ? 'success' : 'error'; ?>">
                            <?php echo $message; ?>
                        </p>
                    </div>
                </div>
            </center>
 
<?php


// Make a booking for a new vistor

// Assuming you have a database connection established, replace $con with your actual database connection variable.







// Include the connect.php file from src/controllers directory
require './src/inc/views/footer.php';

$con->close();

?>

</body>

</html>
<!-- Please don't that again -->