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
   

    <link rel="shortcut icon" href="./favicon-2.ico" type="image/x-icon">
    <title>GWSC - HOME</title>
</head>

<body>

        <div class="video-container">
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
                        <a href="../gwsc/views/customer-verification.php">Sign Up</a>
                    </div>
                    <div class="content">
                        <h1>Discover Untamed <br>SWIMMING CAMPINGs</h1>
                        <strong>
                            <p>Join us to explore breathtaking landscapes and invigorating swims. As a member of Global Wild Swimming and Camping, you'll gain access to exclusive adventures, expert tips, and a vibrant community of nature enthusiasts.</p>
                        </strong>
                        <a href="../gwsc/views/customer-verification.php">Sign Up</a>
                    </div>
                    <div class="content">
                    <h1>Campings & Swimming<br><span>Beneath the Stars!</span> </h1>
                        <strong>
                        <p>Immerse yourself in a world of breathtaking landscapes and invigorating swims, while also experiencing the thrill of camping under the stars. As a member of Global Wild Swimming and Camping, you'll unlock exclusive access to our incredible adventures.</p>
                        </strong>
                        <a href="../gwsc/views/customer-verification.php">Sign Up</a>
                    </div>
                    <div class="content">
                        <h1>From Waters to Wilderness<br><span>GWSC Adventures.</span></h1>
                        <strong>
                            <p>Embark on a journey that combines the serenity of wild swimming with the thrill of camping. Global Wild Swimming and Camping offers you the chance to experience nature's beauty like never before.Unlock your dreams today.</p>
                        </strong>
                        <a href="../gwsc/views/customer-verification.php">Sign Up</a>
                    </div>

                    <div class="content">
                        <h1>Beyond the Beaten Path<strong><span> Off-the-Grid Escapes.</span></strong></h1>
                        <strong>
                            <p>Escape the ordinary and dive into extraordinary adventures. Join us in discovering remote locations where wild swimming and camping converge for an unparalleled outdoor experience.Meet familiy and friend the enjoy.</p>
                        </strong>
                        <a href="../gwsc/views/customer-verification.php">Sign Up</a>
                    </div>

                    <div class="content">
                        <h1>Nature's Playground Awaits<br><span>Dive, Camp, and Connect with Global Wild Swimming and Camping's Nature-Loving Community.</span></h1>
                        <strong>
                            <p>Connect with fellow nature enthusiasts as you explore the beauty of wild swimming and camping. Global Wild Swimming and Camping brings people together to share in the joys of outdoor exploration.</p>
                        </strong>
                        <a href="../gwsc/views/customer-verification.php">Sign Up</a>
                    </div>

                    <div class="content">
                        <h1>Plunge into Adventure<br><span>Join Global Wild Swimming and Camping to Reconnect with Nature's Majesty and Find Your Inner Explorer.</span></h1>
                        <strong>
                            <p>Rediscover your sense of adventure by joining Global Wild Swimming and Camping. Experience the wonder of nature, from serene swims to rugged campsites, all while forging lasting connections.</p>
                        </strong>
                        <a href="../gwsc/views/customer-verification.php">Sign Up</a>
                    </div>
                    <div class="media-icons">
                        <a href="#"><i class="facebook square icon"></i></a>
                        <a href="#"><i class="twitter icon"></i></a>
                        <a href="#"><i class="instagram icon"></i></a>
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
        
        <header class="nav-bar-primary" class="ui fixed top sticky">
            <nav>
                 <div class="ui inverted menu">
                    <a class="item primary active">
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
                            <a class="dropdown-item" href="#"><i style="color:black;" class="map marker alternate icon"></i>Local attractions</a>
                        </strong>
                           
                        </div>
                        </div>
                        <a class="item primary">
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
                        <strong class="logo2">Global Wild Swimming Camping <i style="margin-left:18px;" class="swimmer icon"></i></strong>
                        </a>
                    </div>
                </div>
            </nav>
        </header>

                <header class="nav-bar-primary" class="ui fixed top sticky">
            <nav>
                 <div class="ui inverted menu">
                    <a class="item primary active">
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
                            <a class="dropdown-item" href="#"><i style="color:black;" class="map marker alternate icon"></i>Local attractions</a>
                        </strong>
                           
                        </div>
                        </div>
                        <a class="item primary">
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
    

      <div id="primary-promo-registration" class="ui raised container segment">
        <h2 class="ui header">BECAME A MEMBER</h2>
        <p> <strong>Register today </strong>as a swimmer, camping hoster even just wild person <br> at <strong>GWSC</strong> so that you can learn and been <strong> credited</strong> as the offical member of <br><strong style="font-family: cursive;">GLOBAL WILD SWIMMING AND CAMPING</strong></p>
                <div class="ui placeholder segment">
                <div class="ui two column very relaxed stackable grid">
                <div class="column">
                <div class="ui form">
                    <div class="field">
                    <label>Username</label>
                    <div class="ui left icon input">
                        <input type="text" placeholder="Username">
                        <i class="user icon"></i>
                    </div>
                    </div>
                    <div class="field">
                    <label>Password</label>
                    <div class="ui left icon input">
                        <input type="password">
                        <i class="lock icon"></i>
                    </div>
                    </div>
                    <div class="ui blue submit button">Login</div>
                </div>
                </div>
                <div class="middle aligned column">
                <a href="./views/customer-verification.php">
                <div class="ui big button">
                    <i class="signup icon"></i>
                    Sign Up
                </div>
                </a>
                </div>
            </div>
            <div class="ui vertical divider">
                Or
            </div>
            </div>
        </div>


        <div id="primary-nav-bar" class="mini ui compact menu">
        <a class="item active">
            <i class="home icon"></i>
            GWSC
        </a>
        <a class="item">
            <i class="info circle icon"></i>
            Information
        </a>
        <a class="item">
            <i class="swimmer icon"></i>
            Features
            <!-- <i style="margin-left:20%" class="arrow right circle icon"></i> -->
        </a>
        </div>



        <!-- Responsive images -->
        <script>
            $('.special.cards .image').dimmer({
            on: 'hover'
            });            
        </script>

         <div class="ui raised segment container">

         <h1><img src="public/images/Swimming.png" alt="campingicon" width="50px"><br>
         Wild Swimming - Latest Tweets </h1>  
            <div class="responsive">
            <div class="gallery">
            <div class="ui card">
                <div class="ui slide masked reveal image">
                    <img src="public/images/pexels-sergio-souza-1936948.jpg" class="visible content">
                    <img src="public/images/pexels-sergio-souza-1936954.jpg" class="hidden content">
                </div>
                <div class="content">
                    <a class="header">Swimmers &amp; Non-Swimmers</a>
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
                    109 Views
                    </a>
                </div>
           </div>
            </div>
            </div>


            <div class="responsive">
            <div class="gallery">
            <div class="ui card">
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
                    109 Views
                    </a>
                </div>
           </div>
            </div>
            </div>

            <div class="responsive">
            <div class="gallery">
            <div class="ui card">
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
                    68 Views
                    </a>
                </div>
           </div>
            </div>
            </div>

            <div class="responsive">
            <div class="gallery">
            <div class="ui card">
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
                    8 Views
                    </a>
                </div>
           </div>
            </div>
            </div>

            <div class="clearfix"></div>

             </div>
        </div>
        </div>

    
    <div id="promo-registartion" class="ui horizontal segment">
    <h2 class="ui header">
    <img class="promo-primary" src="public/images/Swimming.png" alt="campingicon">
    <div class="content">
        <h3>BECAME A MEMBER</h3>
        <div class="sub header"> <p> <strong>Register today </strong>as a swimmer, camping hoster even just wild person <br> at <strong>GWSC</strong> so that you can learn and been <strong> credited</strong> as the offical member of <br><strong style="font-family: cursive;">GLOBAL WILD SWIMMING AND CAMPING</strong></p>
    
    </div>

        <button style="float:right;"class="mini ui button primary">Find More</button>
    </div>
    </h2>
    </div>

 

  
    <!-- footer -->
    <div class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
                <div class="three wide column">
                    <h4 class="ui inverted header">Explore</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Locations</a>
                        <a href="#" class="item">Activities</a>
                        <a href="#" class="item">Safety Tips</a>
                    </div>
                </div>
                <div class="three wide column">
                    <h4 class="ui inverted header">Resources</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Gear</a>
                        <a href="#" class="item">Guides</a>
                        <a href="#" class="item">Events</a>
                    </div>
                </div>
                <div class="seven wide column">
                    <h4 class="ui inverted header">Connect</h4>
                    <p>Follow us on social media for updates and inspiration.</p>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Facebook</a>
                        <a href="#" class="item">Twitter</a>
                        <a href="#" class="item">Instagram</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui inverted section divider"></div>
        <div class="ui center aligned container">
            <div class="ui horizontal inverted small divided link list">
                <a class="item" href="#">Privacy Policy</a>
                <a class="item" href="#">Terms of Use</a>
                <a class="item" href="#">Contact Us</a>
            </div>
        </div>
    </div>



</body>

</html>
<!-- Please don't that again -->