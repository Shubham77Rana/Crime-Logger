<?php

    session_start();

    if(!isset($_SESSION['email']))
    {
        header("Location: login.php");
        return;
    }

?>

<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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

        <script type="text/javascript" src="searchmapinitialise.js" ></script>
        <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiE1muLvBWpjfaQuB5QcMhB270wuw84GY&libraries=places&callback=InitialiseMap"></script>

    </head>
    <body>
        <div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!-- Sections -->
        
        <?php
                include("navigation.php");
        ?>
        <hr>

        <section id="contact" class="contact sections">
            <div class="container">
                <div class="row">
                    <div class="main_contact whitebackground">
                        <div class="head_title text-center">
                            <h2>REPORT A CRIME</h2>
							<p>Report a crime near your location or anywhere you have seen. Help your nation so that one day you'll get help in return.</p>
                        </div>
                        <div class="contact_content">
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                    <form action="logcrime_server.php" id="formid" method="POST">

                                        <div class="form-group">
                                            <input id="crimetitle" type="text" class="form-control" name="crimetitle" placeholder="Crime Title" required="">
                                        </div>

                                        <div class="form-group">
                                            <textarea id="crimedescription" class="form-control" name="description" rows="3" required="" placeholder="Brief Description of crime you want to report"></textarea>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <input id="timeofcrime" type="time" class="form-control" name="timeofcrime" placeholder="Time of Crime" required="">
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <input id="dateofcrime" type="date" class="form-control" name="dateofcrime" placeholder="Date of Crime" required="">
                                        </div>

                                        <div class="form-group">
                                            <input style="margin-left: 15px;" id="currenttime" type="checkbox">Current Time
                                            <input style="margin-left: 120px;" id="currentdate" type="checkbox">Current Date
                                        </div>

                                        <div class="form-group">
                                            <textarea id="crimelocation" class="form-control" name="crimelocation" rows="3" placeholder="Locate on map or type the Crime location" required="" ></textarea>
                                        </div>

                                        <div class="center-content">
                                            <input type="submit" value="REPORT CRIME" class="btn btn-default">
                                        </div>

                                        <input type="hidden" id="latitude" name="latitude">
                                        <input type="hidden" id="longitude" name="longitude">
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="single_right_contact">
                                    <div id="crimemap" style="width: 100%; height: 400px; border: 1px solid gray;"></div>
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
        <script type="text/javascript" src="current_date_time.js"></script>
    </body>
</html>
