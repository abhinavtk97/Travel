<?php
error_reporting(0);
require_once('connectvars.php');
$dbc=mysqli_connect(DB_HOST2325,DB_USER2325,DB_PASSWORD2325,DB_NAME2325) or die('could not connect to database.');

$verific=0;
$sys_verified=0;
$used=0;
$plain_login=0;

if(isset($_GET['type'])||isset($_POST['rand']))
{ if($_GET['type']==verify)
    $verific=1;
  if(isset($_GET['email'])&&isset($_GET['rand']))
  {
      $email_check=$_GET['email'];
      $rand_check=$_GET['rand'];
      $query='SELECT * FROM email_verify WHERE email="'.$email_check.'" AND rand="'.$rand_check.'"';
      $data=mysqli_query($dbc,$query);
      if(mysqli_num_rows($data)>0)
      {
      $row=mysqli_fetch_array($data);
       if($row['used']==0)
           $sys_verified=1;
      else if($row['used']==1)
          $used=1;
      }

  }
  else if(isset($_POST['email'])&&isset($_POST['rand']))
  {
      $email_check=$_POST['email'];
      $rand_check=$_POST['rand'];
      $query='SELECT * FROM email_verify WHERE email="'.$email_check.'" AND rand="'.$rand_check.'"';
      $data=mysqli_query($dbc,$query);
      if(mysqli_num_rows($data)>0)
      {
      $row=mysqli_fetch_array($data);
       if($row['used']==0)
           $sys_verified=1;
      else if($row['used']==1)
          $used=1;
      }
  }

}
else
{
    $plain_login=1; //If login script is required
}

    if(isset($_POST['submit']))
    {
        $name=htmlspecialchars($_POST['name']);
        $college=htmlspecialchars($_POST['college']);
        $phno=htmlspecialchars($_POST['phno']);
            if(!empty($_POST['remember']))
                $remember=1;

        $rand=$_POST['rand'];
        $email=$_POST['email'];
        if((empty($_POST['name'])||
                                 empty($_POST['college'])||
                                 empty($_POST['name'])||
                                 empty($_POST['re_password'])||
                                 empty($_POST['password'])))
        {

        $error_msg="All essential fields must be filled.<br/>";
        $verific=1;

        }
        else if(strlen($_POST['password'])<8)
        {
            $error_msg="Passwords must contain atleat 8 characters.<br/>";
            $verific=1;
        }
        else if($_POST['password']!=$_POST['re_password'])
        {   $error_msg="Passwords must match<br/>";
            $verific=1;
        }
        else
        {
            if($sys_verified==1)
            {
                $name=mysqli_real_escape_string($dbc,trim($name));
                $password=mysqli_real_escape_string($dbc,trim($_POST['password']));
                $college=mysqli_real_escape_string($dbc,trim($college));
                $phno=mysqli_real_escape_string($dbc,trim($phno));
                $nick_creator=explode(" ",strtolower($name));
                if(strlen($nick_creator[0])>8)
                    $nick_creator[0]=substr($nick_creator[0],0,8);
                $nick=$nick_creator[0].'-bit.ly/_HASH';
                    $flag=0;
                while($flag==0)
                {
                    $query='SELECT * FROM main_leader_travel WHERE nick="'.$nick.'"';
                    $data=mysqli_query($dbc,$query);
                    $query1='SELECT * FROM main_leader_travel WHERE nick="'.$nick.'"';
                    $data1=mysqli_query($dbc,$query1);
                    if(mysqli_num_rows($data)>0||mysqli_num_rows($data1)>0)
                    {
                        $nick=$nick_creator[0].rand(11,99).'-bit.ly/_HASH';
                    }
                    else
                        $flag=1;
                }
                $query='INSERT INTO our_travel (`nick`,`email`,`name`,`password`,`college`,`phno`) VALUES ';
                $query.='("'.$nick.'","'.$email.'","'.$name.'","'.$password.'","'.$college.'","'.$phno.'")';
                mysqli_query($dbc,$query) or die("Error adding user");

                $query='UPDATE email_verify SET used=1 WHERE email="'.$email.'"';
                mysqli_query($dbc,$query);

                if($remember==1)
                {
                        setcookie('email',$email);
                        setcookie('token',rand(183458254915491539263,139163916301630909968689696986986));
                }
                header('Location:howto.php?email='.$email);
            }
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
    <title>Takshak Miles</title>
    <link rel="shortcut icon" href="/sponsor/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/sponsor/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><i class="glyphicon glyphicon-phone"></i>Takshak Miles</a>
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
            <section class="testimonials">

        <div align="center">
         <a href="http://hashtagofficial.in" target="_blank"><img src="/sponsor/images/logo.png" alt="Hashtag" id="logo" width="200"></a>

            <div id="main_content2">
                <a href="http://hashtagofficial.in/travel/" target="_blank" style="text-decoration:none; color:#FFF;">"Travel To Track"</a>
            </div>
        </div>
        <div id="login_main" align="center">
            <?php
                if($sys_verified==0 && $used==1)
                    echo 'You seems to have already registered. Go back to the <a href="http://hashtagofficial.in/travel/" style="color:blue;" title="Home Page">home page</a> and enter your e-mail.<br/> Happy Travelling.<br/>';
                else if($sys_verified==0)
                    echo 'Invalid URL. Are you sure you registered in the <a href="http://hashtagofficial.in/travel/">home page</a>?<br/>';
                else if($verific==1&& $sys_verified==1)
                {
                    if($verific==1)
                    {

                        ?>
                            <form method="post" action="login.php">
                            <table>
                                <tr><td>Name: </td><td><input class="form-control" type="text" name="name" class="in_login" placeholder="Your Name Here" maxlength="20" value="<?php if(isset($name)) echo $name;?>" required></td></tr>
                                <tr><td>College: </td><td><input class="form-control" type="text" name="college" class="in_login" placeholder="Your College Name Here" maxlength="30" value="<?php if(isset($college)) echo $college;?>" required></td></tr>
                                <tr><td></td><td style="max-width:300px;">Don't type a valuable password. It may be e-mailed to you in clear text.</td></tr>
                                <tr><td>Password: </td><td><input class="form-control" type="password" name="password" class="in_login" placeholder="Minimum 8 characters" maxlength="20" required></td></tr>
                                <tr><td>Retype Password: </td><td><input class="form-control" type="password" name="re_password" class="in_login" placeholder="Retype Password Here" maxlength="20" required></td></tr>
                                <tr><td>Phone Number: </td><td><input class="form-control" type="text" name="phno" class="in_login" placeholder="Your Phone Number" maxlength="20" value="<?php if(isset($phno)) echo $phno; ?>" required></td></tr>
                                <input type="hidden" name="rand" value="<?php if(isset($_GET['rand'])) echo $_GET['rand']; else if(isset($rand)) echo $rand; ?>">
                                <input type="hidden" name="email" value="<?php if(isset($_GET['email'])) echo $_GET['email']; else if(isset($email)) echo $email; ?>">
                                <tr><td></td><td>Remember me: <input type="checkbox" name="remember" class="in_login" <?php if($remember==1) echo 'checked'; ?>></td></tr>
                                <tr><td></td><td><input class="btn btn-success" type="submit" name="submit" class="in_login" style="cursor:pointer;"></td></tr>
                            </table>
                                </form>

            <?php
                         if(isset($error_msg))
                            echo '<strong style="color:red;">'.$error_msg.'</strong>';
                    }
                }

            ?>
                </div>
    </section>
    </body></html>
