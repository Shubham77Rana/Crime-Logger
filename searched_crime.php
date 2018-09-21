<?php

    session_start();

    if(!isset($_SESSION['name']))
    {
        header("Location: login.php");
        return;
    }

    $username = $_SESSION['name'];
    $search_text = "";

    if(isset($_GET['search_button']))
    {
        $search_text = $_GET['search_text'];
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

        <script type="text/javascript" src="searched_crime_test.js" ></script>
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
                            <h2>SEARCH LOCATION FOR CRIMES</h2>
							<p>Search different location for crimes and get to know how safe a place is. And also how can you make the place much safer.</p>
                        </div>

                        <div class="form-group">
                            <input style="text-align: center; width: 400px; margin: auto;" id="crimelocation" type="text" class="form-control" name="crimelocation" placeholder="Search Crime Location" value="<?php echo $search_text; ?>">
                        </div>

                        <div id="crimemap" style="width: 100%; height: 550px; border: 1px solid gray;"></div>
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
    </body>
</html>

<?php
  
    if(isset($_GET['search_button']))  
    {
        echo "<script>
                    $('#crimelocation').focus();
              </script>";
    }
?>
