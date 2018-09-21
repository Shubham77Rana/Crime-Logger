<?php
    
    session_start();

    if(!isset($_SESSION['name']))
    {
        header("Location: login.php");
        return;
    }

    $username = $_SESSION['name'];

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
    </head>
    <body>

		<div class='preloader'><div class='loaded'>&nbsp;</div></div>

        <?php
            include("navigation.php");
        ?>

        <!--Home page style-->
        <header id="home" class="home">
            <div class="overlay-fluid-block">
                <div class="container text-center">
                    <div class="row">
                        <div class="home-wrapper">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="home-content">

                                    <h1>Crime Logger to keep you safe</h1>
                                    <p>This crime logging portal helps you to be aware of your surrounding. To let you know of all crimes and activities thats happening around you. All this to keep you in a safe neighbourhood.</p>

                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                                        <form action="searched_crime.php" method="GET">
                                            <div class="home-contact">
                                                <div class="input-group">
                                                    <input style="color: black;" name="search_text" type="text" class="form-control" placeholder="Enter the location to search for crime">
                                                    <input style="background: black;" type="submit" name="search_button" class="form-control" value="Search Crime">

                                                </div><!-- /input-group -->
                                            </div>
                                        </form>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>			
            </div>
        </header>

        <div style="margin-top: 30px;"></div>
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
    </body>
</html>
