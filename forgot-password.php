<?php session_start();
include "connect.php"; //connects to the database
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $query="select * from user where username='$username'";
    $result   = mysql_query($query);
    $count=mysql_num_rows($result);
    // If the count is equal to one, we will send message other wise display an error message.
    if($count==1)
    {
        $rows=mysql_fetch_array($result);
        $pass  =  $rows['password'];//FETCHING PASS
        //echo "your pass is ::".($pass)."";
        $to = $rows['email'];
        //echo "your email is ::".$email;
        //Details for sending E-mail
        $from = "Lokalhost";
        $url = "http://localhost/app-login";
        $body  =  "Lokalhost password recovery Script
        -----------------------------------------------
        Url : $url;
        email Details is : $to;
        Here is your password  : $pass;
        Sincerely,
        Coding Cyber";
        $from = "autosend@localhost.com";
        $subject = "Lokalhost Password recovered";
        $headers1 = "From: $from\n";
        $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
        $headers1 .= "X-Priority: 1\r\n";
        $headers1 .= "X-MSMail-Priority: High\r\n";
        $headers1 .= "X-Mailer: Just My Server\r\n";
        $sentmail = mail ( $to, $subject, $body, $headers1 );
    } else {
    if ($_POST ['email'] != "") {
    echo "<span style='color: #ff0000;'> Not found your email in our database</span>";
        }
        }
    //If the message is sent successfully, display sucess message otherwise display an error message.
    if($sentmail==1)
    {
        echo "<span style='color: #ff0000;'> Your Password Has Been Sent To Your Email Address.</span>";
    }
        else
        {
        if($_POST['email']!="")
        echo "<span style='color: #ff0000;'> Cannot send password to your e-mail address.Problem with sending mail...</span>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'/>
<title>Lupa Kata Sandi</title>
</head>
<body>
<div class="register-form">
<h1>Lupa Kata Sandi</h1>
<form action="" method="POST">
    <p class="label">Masukkan Username</p>
	<input id="username" type="text" name="username" placeholder="username" /></p>
    <input class="btn register" type="submit" name="submit" value="Kirim" />
    <p class="tanya">Butuh bantuan? <a class="ok" href="#">Hubungi kami</a></p>
</form>
</div>
</body>
</html>