<?php

//This script is designed by Android-Examples.com
//Define your host here.
$hostname = "localhost";
//Define your database username here.
$username = "root";
//Define your database password here.
$password = "";
//Define your database name here.
$dbname = "data";

 $con = mysqli_connect($hostname,$username,$password,$dbname);

 $name = $_POST['name'];
 $college = $_POST['college'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 $sex = $_POST['sex'];



 $Sql_Query = "insert into students (name,college,email,phone,sex) values ('$name','$college','$email','$phone','$sex')";

 if(mysqli_query($con,$Sql_Query)){

 echo 'Data Inserted Successfully';

 }
 else{

 echo 'Try Again';

 }
 mysqli_close($con);
?>
