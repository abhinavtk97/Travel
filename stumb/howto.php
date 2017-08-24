<?php
require_once('connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');

$email='The Registered E-mail';// Don't change the value,, Used below
$nick='Your Nickname Provided';
if(isset($_POST['submit']))
{
    if(!empty($_POST['search']))
        $email=htmlspecialchars(trim($_POST['search']));
}
else if(isset($_GET['email']))
{
    if(!empty($_GET['email']))
        $email=htmlspecialchars(trim($_GET['email']));
}

else if(isset($_COOKIE['email']))
{
    $email=$_COOKIE['email'];
}
if($email!='The Registered E-mail')
{
    $query='SELECT nick,email FROM our_travel WHERE email="'.$email.'" LIMIT 1';
    $data=mysqli_query($dbc,$query);
    if(mysqli_num_rows($data)>0)
    {
        $row=mysqli_fetch_array($data);
        $email=$row['email'];
        $nick=$row['nick'];
        $message='Your nick name :<br/><span style="font-size:20px;">'.$nick.'</span><br/>
        Note: e-mail id is case sensitive.';
    }
    else
    {
        $message='Please register through our <a href="index.php">home page</a> to start playing.<br/>';
        $email='The Registered E-mail';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="TRAVEL TO WIN">
    <title>Takshak 17 ********</title>
    <link rel="shortcut icon" href="/sponsor/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/sponsor/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><i class="glyphicon glyphicon-phone"></i>Takshak Travel</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"> <a href="http://takshak.in">Takshak Home </a> </li>
        <li role="presentation" title="Home"> <a href="index.php">Home</a> </li>
        <li role="presentation" > <a href="process.php">Leaderboard</a> </li>
        <li role="presentation" > <a href="howto.php">HowTo?</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron hero">
        <div class="container">
            <div class="row row-centered">

                <div class="col-xs-5 col-centered" align="center">
                   <div align="center">

                    <h1>HOW TO 'Travel To Track'?<br/><br/></h1>
            <form method="post" action="howto.php">
                <span class="icon-mail" id="mail_icon"></span>
                <input class ="form-control" type="email" id="search" name="search" placeholder="Your e-mail id." required value="<?php if(isset($email)&& $email!='The Registered E-mail') echo $email;?>"><br/>
               <input class="btn btn-primary btn-lg" type="submit" id="submit1" name="submit" value="Update with this e-mail">
            </form>
            </div>
        </div>
            </div>
        </div>
    </div>
        <section class="testimonials">
<center>
        <div id="howto_main">

                <?php
                    if(isset($message))
                        echo $message.'<br/>';
                ?>
            <br/>

         </div>
    </center>
           <h2 class="text-center"> Hi, let's see how you can start with our system :)<br/>
            First you need to have <strong>an Android phone or Firefox OS Phone</strong>
               Mozilla Stumbler for Android<br><br><br>

                <a href="https://play.google.com/store/apps/details?id=org.mozilla.mozstumbler" target="_blank">
                    <img title="Get Mozilla Stumbler on Google Play" src="images/google_play.png"></a>

                <a href="https://f-droid.org/repository/browse/?fdid=org.mozilla.mozstumbler" target="_blank">
                    <img title="Mozilla Stumbler available on F-Droid" src="images/f-droid.png"></a><br/></h2>
       <p class="text-center">You can find <a href="https://github.com/mozilla/MozStumbler" target="_blank">Mozilla Stumbler on Github</a> to contribute to its development.
            </p>
    </section>
    <section class="features">
        <div class="container">
                        <div class="row">
                                            <div class="col-md-6">


            <p>Yay! Now you have downloaded the tool to map your way.<br/>By using the app you are contributing to the open source community :) For more details <a href="https://location.services.mozilla.com" target="_blank">click here</a>.<br/><br/>The following are the next steps to be done for android users.<br/><br/>
            <span class="icon-checkmark"></span> Open the app<br/><br/><br/>
            <img class ="col-md-12" src="images/screenshot.jpg" alt="screenshot" id="screenshot"><br/><br/>
            <span class="icon-checkmark"></span> Open up the left panel.<br/><br/>
            <span class="icon-checkmark"></span> Click the settings icon<br/><br/>

            <span class="icon-checkmark"></span> Login with your Firefox account with "<?php echo $email; ?>" or create a new account<br/><br/>
                <span class="icon-checkmark"></span><span style="font-weight:bold;"> Change the nick name to "<?php echo $nick; ?>"</span> (You can always find your nick name by searching your email in the home page)<br/><br/>
            <strong>Now you are all set to go. But consider these points too.<br/><br/></strong>
            <span class="icon-checkmark"></span> You don't need internet to collect points.<br/><br/>
            <span class="icon-checkmark"></span> It is adviced to <strong>turn ON 'location'</strong> in Android settings.<br/><br/>
            <span class="icon-checkmark"></span> You can always turn stumbling ON/OFF.<br/><br/>
            <span class="icon-checkmark"></span> You can upload your points through the left panel when there is internet connectivity. Auto upload is also available in the settings.<br/><br/>
            <span class="icon-checkmark"></span> Points collected in the current session will be shown near the binocular image in the main page.<br/><br/>
            <span class="icon-checkmark"></span> <span class="icon-checkmark"></span> Points you have submitted will take some time to appear in the leaderboard. Sometimes hours depending on how Mozilla updates their leaderboard.<br/><br/>
            <span class="icon-checkmark"></span> <span class="icon-checkmark"></span> You won't appear in the leaderboard if you have less than 10 points. Don't worry, a walk around your home can get you 10 points.<br/><br/>
            <span class="icon-checkmark"></span> You can always contact us at <h3>email@email.in</h3><br/><br/>
    <h4 style="padding-bottom:10px;">Check out our <a href="process.php">leaderboard</a> for rank details.</h4>
        </div>
            </div>

    </div>
    </section>
            <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Takshak © 2017</h5></div>
                <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
mysqli_close($dbc);
?>
