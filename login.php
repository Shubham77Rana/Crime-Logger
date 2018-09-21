<?php

	session_start();
    $_SESSION['page'] = "login";

	if(isset($_SESSION['email']) && isset($_SESSION['name']))
	{
		header("Location: index.php");
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
                            <h2>LOGIN</h2>
							<p>Login using your email (with which you registered) and your password.</p>
                        </div>
                        <div class="contact_content">
                        	<div class="col-md-2"></div>
                        	<div class="col-md-8" style="border: 1px solid rgba(150,150,150,0.6); box-shadow: 4px 4px 0px 0px rgba(150,150,150,0.2);">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="single_left_contact" style="margin-top: 10%; margin-bottom: 10%;">
                                    <form action="#" id="loginform" method="POST">

                                        <div id="invalid" style="color: rgba(255,0,0,0.75); display: none; float: right;">check your email or password (or possibly not verified)</div>

                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" required="">
                                        </div>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control" placeholder="Password" required="">
                                        </div>

                                        <div class="center-content" align="center">
                                            <input type="submit" value="LOGIN" class="btn btn-default">
                                            <img id="loadinggif" src="assets/images/loading.gif" style="height: 45px; margin-top: 20px; display: none;">
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        	</div>
                            <div class="col-md-2"></div>
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
        <script type="text/javascript" src="login.js"></script>
    </body>
</html>
