<?php

    session_start();
    $_SESSION['page'] = "signup";

    if(isset($_SESSION['email']))
    {
        header("Location: index.php");
        return;
    }

?>

<!doctype html>

<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <link rel="stylesheet" href="assets/css/roboto-webfont.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <script type="text/javascript" src="signupmap.js"></script>
     
        <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiE1muLvBWpjfaQuB5QcMhB270wuw84GY&libraries=places&callback=InitialiseMap"></script>

    </head>
    <body> 
        
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        
        <?php
            include("navigation.php");
        ?>

        <hr>

        <section id="contact" class="contact sections">
            <div class="container">
                <div class="row">
                    <div class="main_contact whitebackground">
                        <div class="head_title text-center">
                            <h2>SIGN UP WITH US</h2>
							<p>Register yourself and make the nation crime free by helping us know when, where and how. Take the first step towards this dream.</p>
                        </div>
                        <div class="contact_content">
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                    <form action="#" id="formid" method="POST">

                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="first name" required="">
                                        </div>

                                        <div id="emailexist" style="color: rgba(255,0,0,0.7); display: none;">email already exist</div>

                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" required="">
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control" placeholder="Password" required="">
                                        </div>

                                        <div class="form-group">
                                            <textarea id="crimelocation" class="form-control" name="address" rows="5" placeholder="Locate yourself on the map or type your address (OPTIONAL)"></textarea>
                                        </div>

                                        <div class="center-content">
                                            <input type="submit" value="REGISTER" class="btn btn-default">
                                            <img id="loadinggif" src="assets/images/loading.gif" style="height: 45px; margin-top: 20px; display: none;">
                                        </div>

                                        <input type="hidden" id="latitude" value='0'>
                                        <input type="hidden" id="longitude" value='0'>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single_right_contact">
                                    <div id="crimemap" style="width: 100%; height: 400px; border: 1px solid gray;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
            include("footer.html");
        ?>
		
		<div class="scrollup">
			<a href="#"><i class="fa fa-chevron-up"></i></a>
		</div>


        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>
        <script type="text/javascript" src="signup.js"></script>
    </body>
</html>
