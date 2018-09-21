<?php

    session_start();

    if(!isset($_SESSION['name']))
    {
        header("Location: login.php");
        return;
    }

    $connection = mysqli_connect("localhost","root","","crimeact");

    $username = $_SESSION['name'];
    $user_id = $_SESSION['id'];

    $sql = "SELECT name, email, address FROM registeruser WHERE id = $user_id";
    $details = mysqli_fetch_array(mysqli_query($connection, $sql));

    $email = $details['email'];
    $sql = "SELECT title, description, address, archive FROM loggedcrime WHERE logger_email = '$email'";
    $crime_details = mysqli_query($connection, $sql);

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

        <section id="business" class="portfolio sections">
            <div class="container">
                <div class="head_title text-center">
                    <h1>YOUR REPORTED CRIME</h1>
                    <p><span style="color: black; font-weight: bold;">Name :</span> <?php echo $details['name']; ?>
                    <br><span style="color: black; font-weight: bold;">Email :</span> <?php echo $details['email']; ?>
                    <br><span style="color: black; font-weight: bold;">My Shared location :</span> <?php echo $details['address'];?></p>
                </div>

                <div class="row">
                    <div class="portfolio-wrapper text-center">

                        <?php

                        while($row = mysqli_fetch_array($crime_details))
                        {
                            echo "
                            <div class='col-md-4 col-sm-6 col-xs-12'>
                                <div class='community-edition'>";

                            if($row['archive'] >= 1)
                                echo "<i class='fa fa-archive'></i>";
                            else if($row['archive'] == -1)
                                echo "<i class='fa fa-spinner'></i>";
                            else
                                echo "<i class='fa fa-gavel'></i>";

                            echo    "<div class='separator'></div>
                                    <h4>".ucwords($row['title']);

                            if($row['archive'] >= 1)
                                echo " (archived)";
                            else if($row['archive'] == -1)
                                echo " (pending)";

                            echo "</h4>
                                    <p>Location: ".$row['address']."<br>
                                    Description: ".ucfirst($row['description'])."
                                    </p>
                                </div>
                            </div>";
                        }

                        ?>
                    </div>
                </div>
            </div>       
        </section>

        <hr>
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
        <script type="text/javascript" src="vote.js"></script> 
    </body>
</html>