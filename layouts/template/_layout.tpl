﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{$pageTitle} - HotelHappyHoliday</title>
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/lib/bootstrap/dist/css/bootstrap.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/css/footer-distributed-with-address-and-phones.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/lib/font-awesome/css/font-awesome.min.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/lib/wow/css/libs/animate.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/lib/bootstrap-daterangepicker/daterangepicker.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/css/site.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/css/TileImageHover.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/css/checkbox.css'; ?>" />
        <link rel="stylesheet" href="<?php echo Config::get('application_path') .'assets/css/Dashboard.css'; ?>" />
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="./index.php"><img src="<?php echo Config::get('application_path') .'assets/images/home/Brand Logo.jpg'; ?>" height="78" /></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="reservation.php">RESERVATION</a></li>
                    <li><a href="suites.php">SUITES</a></li>
                    <li><a href="meetings.php">MEETINGS</a></li>
                    <li><a href="loyalty.php">LOYALITY</a></li>
                    <li><a href="surroundings.php">SURROUNDINGS</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                <?php 

                        $user = new User();
                        if ($user->isLoggedIn()){

                            echo '<li class="dropdown"><span>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src= "' . Config::get('application_path') . 'assets/images/home/login-layout-avatar.png"' . ' width="50px" height="50px" />
                                <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <br>
                                                <div class="form-group">
                                                <label>Hello, </label><br>'?> 
                                                    {$username}
                                                <?php echo '</div>
                                                <div class="form-group button">
                                                    <div class="help-block text-right"><a href="">Change Password</a></div>
                                                    <div class="help-block text-right"><a href="./logout.php">Log Out</a></div>
                                                </div>
                                           
                                        </div>
                                    </div>
                                </li>
                            </ul>
                                </a></span>
                            </li>';

                        }else{ ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">LOGIN</a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li >
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="post" action="./actions/login.php" accept-charset="UTF-8" id="login-nav">
                                        <label>Login</label>
                                        <br>
                                            <div class="form-group">
                                                <label class="sr-only" for="email_id">Email address</label>
                                                <input type="email_id" class="form-control" name="email_id" id="email_id" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                                <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-submit btn-block">Sign in</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="remember_me" name="remember_me"> keep me logged-in
                                                </label>
                                            </div>
                                            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        New here ? <a href="./register.php"><b>Join Us</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                <?php } ?>

                </ul>

            </div>
        </div>
    </div>
    <div class="container body-content">
        {$content}
    </div>
    {$footer}
</body>
    {$scripts}
</html>
