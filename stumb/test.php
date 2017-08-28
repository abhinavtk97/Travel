<?php
// You can use your own mailing methods.
date_default_timezone_set('Etc/UTC');
require 'Mailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "takshak17app@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Marshmallow";
//Set who the message is to be sent from
$mail->setFrom('takshak17app@gmail.com', 'Takshak Miles');
//Set an alternative reply-to address
$mail->addReplyTo('takshak17app@gmail.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('abhinavtk97@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 $message_to='Hi,<br/> We have recieved your request to sign in for "Travel To Track", ';
            $message_to.='an online competition to travel and collect points through <strong>Mozilla Stumbler</strong>, ';
            $message_to.='an android app(firefox os app also available) and get rewarded.<br/><br/>';
            $message_to.="We have recieved a registration for this email id. Click on the link below to activate the competition. Please ignore this message if you haven't registered for the event.<br/>";
            $message_to.='<a href="http://hashtagofficial.in/travel/login.php?type=verify&email='.$email_new.'&rand='.$rand.'">http://hashtagofficial.in/travel/login.php?type=verify&email='.$email_new.'&rand='.$rand.'</a><br/><br/>';
            $message_to.='For more information <a href="http://hashtagofficial.in/travel/">Click Here</a><br/><br/>';
            $message_to.='Thanks,<br/>Hashtag Online Team<br/><a href="http://hashtagofficial.in/">
            <img src="http://hashtagofficial.in/mail_footer.png" alt="Silver Jubilee Celebration | CSE Dept."></a>';
$mail->msgHTML($message_to);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";

?>
