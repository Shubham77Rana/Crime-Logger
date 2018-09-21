<nav class="navbar navbar-default">
    <div class="container" style="width: 90%;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="assets/images/logo.png" alt="Logo" /></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="logcrime.php">REPORT CRIME</a></li>
                <li><a href="searched_crime.php">SEARCH CRIME</a></li>
                <li><a href="Share_location.php">SHARE MY LOCATION</a></li>
                <li><a href="Results_and_reported_crime.php">MY REPORTED CRIME</a></li>

                <?php 

                    if(!isset($_SESSION['name']))
                    {
                        if(isset($_SESSION['page']) && $_SESSION['page'] != "signup")
                            echo "<li class='login'><a href='signup.php'>Signup</a></li>";
                        if(isset($_SESSION['page']) && $_SESSION['page'] != "login")
                            echo "<li class='login'><a href='login.php'>Login</a></li>";
                    }

                    else
                    {
                        echo "<li class='login'><a href='logout.php'>Logout</a></li>";
                        echo "<li style='margin-top: 15px; margin-left: 15px;'><span style='color: black;' class='fa fa-user'>&nbsp;&nbsp;</span>(".ucwords($_SESSION['name'])." )</li>";
                    }
                ?>

            </ul>
        </div>
    </div>
</nav>