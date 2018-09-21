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

        <?php
                include("navigation.php");
        ?>
        <hr>

        <section id="contact" class="contact sections">
            <div class="container">
                <div class="row">
                    <div class="main_contact whitebackground">
                        <div class="head_title text-center">
                            <h2>VERIFY YOUR EMAIL ADDRESS</h2>
							<p>Check your inbox for mail verification. And enter the code in the field below to verify your identity. We don't know who you are until you prove it to us.</p>
                        </div>
                        <div class="contact_content">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="single_left_contact">
                                    <form action="#" id="formid" method="POST">

                                        <div id="verificationfailed" style="color: rgba(255,0,0,0.75); margin-bottom: 15px; display: none;">Your verification failed. Check your code or click on resent</div>

                                        <div class="form-group">
                                            <input id="verification" type="text" class="form-control" placeholder="6 DIGIT CODE (Example: 654321)" pattern="[0-9]{6}" required="" style="text-align: center;">
                                        </div>

                                        <div align="center">
                                            <input type="submit" value="VERIFY" class="btn btn-default">
                                            <img id="loadinggif" src="assets/images/loading.gif" style="height: 45px; margin-top: 20px; display: none;">
                                        </div>

                                        <div align="center" style="margin-top: 25px;">
                                            Re-sent mail? <a id="resentmail" style="color:orangered;" href="#"> click here </a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
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

        <script type="text/javascript" src="verify_signup.js"></script>

    </body>
</html>
