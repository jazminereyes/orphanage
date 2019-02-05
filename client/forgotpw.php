<?php

require('../connection.php');

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$email = clean_text($_POST["sendmailto"]);

$sel = "SELECT password FROM user join socialworker on user.personID = socialworker.personID WHERE email = '$email'";
$qry = mysqli_query($con, $sel);
if(mysqli_num_rows($qry) == 0){

	$sel2 = "SELECT password from user join sponsor on user.personID = sponsor.personID WHERE email = '$email'";
	$qry2 = mysqli_query($con, $sel2);

	if(mysqli_num_rows($qry2) == 0){

		echo "<script>
		       alert('Email does not exist in our system. Please try again.');
		       window.location = 'index.php';
		       </script>
		       ";
	}
	else{

		$get = mysqli_fetch_array($qry2);
	    $password = $get['password'];

	    $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        $mail->Username='concordiacsinc@gmail.com';
        $mail->Password='ccsi0987';

        $mail->setFrom('concordiacsinc@gmail.com','Concordia Children Services');
        $mail->addAddress($email);
        $mail->addReplyTo('concordiacsinc@gmail.com');

        $mail->isHTML(true);
        $mail->Subject="Password Recovery";
        $mail->Body="<p>Good day.<br/><br/>You recently requested for a password recovery. Below is your account's recent password in Concordia Children's Services Inc. website. God bless you.</p>

          <h4>Account Information:</h4>
          <p>
           Password:".$password."
          </p>";

        if(!$mail->send()){
          // $flag = 0;
        }
        else{
          // $flag = 1;
        }

        echo "<script>
              alert('Your password has been send to your email. Please check your inbox.');
              window.location = 'index.php';
              </script>
              ";

	}
	
}
else{
	$rec = mysqli_fetch_array($qry);
	$password = $rec['password'];

	$mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        $mail->Username='concordiacsinc@gmail.com';
        $mail->Password='ccsi0987';

        $mail->setFrom('concordiacsinc@gmail.com','Concordia Children Services');
        $mail->addAddress($email);
        $mail->addReplyTo('concordiacsinc@gmail.com');

        $mail->isHTML(true);
        $mail->Subject="Password Recovery";
        $mail->Body="<p>Good day.<br/><br/>You recently requested for a password recovery. Below is your account's recent password in Concordia Children's Services Inc. website. God bless you.</p>

          <h4>Account Information:</h4>
          <p>
           Password:".$password."
          </p>";

        if(!$mail->send()){
          // $flag = 0;
        }
        else{
          // $flag = 1;
        }

        echo "<script>
              alert('Your password has been send to your email. Please check your inbox.');
              window.location = 'index.php';
              </script>
              ";

}



?>