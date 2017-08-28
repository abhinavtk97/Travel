<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="TRAVEL TO WIN">
    <title>Takshak Miles</title>
    <link rel="shortcut icon" href="/sponsor/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/sponsor/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>
<body>
<!--       <nav class="navbar navbar-default">
           <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><i class="glyphicon glyphicon-phone"></i>Mobile App</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
                           <div class="collapse navbar-collapse" id="navcol-1">

         <ul class="nav navbar-nav navbar-right">

             <li class="active" role="presentation"> <a href="http://hashtagofficial.in">Hashtag Main</a> </li>
        <li role="presentation" title="Home"> <a href="index.php">Home</a> </li>
        <li role="presentation" > <a href="process.php">Leaderboard</a> </li>
        <li role="presentation" > <a href="howto.php">HowTo?</a> </li>
            </ul>
        </div>
      </div>
    </nav>-->

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><i class="glyphicon glyphicon-phone"></i>Takshak Miles</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li  role="presentation"> <a href="http://takshak.in">Takshak Home </a> </li>
        <li class="active" role="presentation" title="Home"> <a href="index.php">Home</a> </li>
        <li role="presentation" > <a href="process.php">Leaderboard</a> </li>
        <li role="presentation" > <a href="howto.php">HowTo?</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron hero">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-push-7 phone-preview">
                    <div class="iphone-mockup"><img class="unda" src="assets/img/logo.png">
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-3 get-it">
                    <h1>Takshak Miles</h1>
                    <p>"Travel To Track"<br>Travel more and win exciting prizes
</p>
                    <div>
                    <form method="post" action="process.php">
                <span class="icon-mail" id="mail_icon"></span>
                <input class="form-control" type="email" id="search" name="search" placeholder="Your e-mail id." value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];?>" required><br/>
                <?php
                if(isset($_COOKIE['email']))
                    echo '<a href="emailremove.php?ref=index">Forget "'.htmlspecialchars($_COOKIE['email']).'".</a>';
                else
                    /*echo '<input type="checkbox"  name="remem" class="rem" value="okay">Remember this email';*/


                        echo '<div class="btn-group" data-toggle="buttons">
          <label class="btn btn-success">
            <input type="checkbox" name="remem" value="okay" autocomplete="off">
            <span class="glyphicon glyphicon-ok"></span>
            Remember this email
          </label>
        </div>';
                    ?>
               <br/> <input class="btn btn-primary btn-lg" type="submit" id="submit" name="submit" value="Sign Up/Search">
            </form>
</div>
                </div>
            </div>
        </div>
    </div>

        <section class="testimonials">
        <h2 class="text-center">Win Exciting prices just by travelling!</h2>
        <blockquote>
            <p>You just have to install the app and do your stuff.</p>
            <footer>MACE</footer>
        </blockquote>
    </section>
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>This makes use of the Mozilla Stumbler App</h2>
                    <p>Mozilla stumbler is an open-source app aimed to improve their maps. We do not collect any information about you. For more details go to their <a href="https://location.services.mozilla.com/">offical website.</a></p>
                </div>
                <div class="col-md-6">
                    <div class="row icon-features">
                        <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-cloud"></i>
                            <p>Cloud Leaderboard</p>
                        </div>
                        <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-piggy-bank"></i>
                            <p>Exciting prizes</p>
                        </div>
                        <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-lock"></i>
                            <p>Secure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <!-- <div id="container1">
        <div id="home" align="center">
        <a href="http://hashtagofficial.in" target="_blank"><img src="/images/logo.png" alt="Hashtag" id="logo" width="200"></a>

            <div id="main_content2">
                "Travel To Track"
            </div>
            <div id="tagline">
            Travel more and win a Firefox OS device.<br/>
            </div><br/>


        </div>
   </div>-->
<footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Takshak © 2017</h5></div>
                <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>


