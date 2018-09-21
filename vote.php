<?php
    
    session_start();
    $connection = mysqli_connect("localhost","root","","crimeact");
    
    if(!isset($_SESSION['email']))
    {
        header("Location: login.php");
        return;
    }

    if(!isset($_GET['di']) && !isset($_GET['id']))
    {
        header("Location: index.php");
        return;
    }

    $userDetails = $_SESSION['id'];

    $crime_id = $_GET['di'];
    $crime_id = substr($crime_id, 12, -12);

    $sql = "SELECT vote from vote where user_id = $userDetails AND crime_id = $crime_id";
    $result = mysqli_query($connection, $sql);

    $data = mysqli_fetch_array($result); 

    $user_id = $_GET['id'];
    $user_id = substr($user_id, 12, -12);

    if($user_id != $userDetails)
    {
        echo "<script> 
                    alert('The link to the vote is not valid');
                    window.location = 'index.php';
              </script>";
        return;
    }

    $sql = "SELECT description, address FROM loggedcrime WHERE id = $crime_id AND archive = -1";

    if(mysqli_num_rows(mysqli_query($connection, $sql)) != 1)
    {
        header("Location: index.php");
        return;
    }

    $details = mysqli_fetch_array(mysqli_query($connection, $sql));
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Soft-Tect Free Landing Page</title>
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
                            <h2>VOTE FOR ACTIVITY</h2>
                            <p>Vote for Criminal Activity near you and let us know if the activity really happened or if it was a romour. Be honest and help others.</p>
                        </div>

                        <div align="center">
                            <h3>A Crime has been logged near you at <span style="color: orangered;"> <?php echo ucfirst($details['address']); ?></span><br><br>
                                DESCRIPTION: <span style="color: orangered;"> <?php echo ucfirst($details['description']); ?></span><br><br>
                                Please vote and let us decide on this logged crime.<br>

                                Did the Crime really happened ? 
                            </h3>

                            <div>
                                <div class="col-md-1"></div>
                                <div class="col-md-3">
                                    <input id="yes" type="button" value="YES" class="btn btn-default">
                                </div>
                                <div class="col-md-3">
                                    <input id="no" type="button" value="NO" class="btn btn-default">
                                </div>
                                <div class="col-md-3">
                                    <input id="dontknow" type="button" value="DON'T KNOW" class="btn btn-default">
                                </div>
                                <div class="col-md-2"></div>
                            </div>

                            <input type="hidden" value=<?php echo $crime_id; ?> id="crime">
                            <input type="hidden" value=<?php echo $user_id; ?> id="user">

                        </div>

                    </div>
                </div>
            </div>
        </section><!-- End of Contact Section -->

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