<?php

require('dbconnect.php');

$oid = $_POST['oid'];

//Sending Email

$error = '';
$email = '';
$subject = '';
$message = '';
$flag = 2;

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
	 
	
	 $email = clean_text($_POST["email"]);

	if(empty($_POST["subject"])){
		echo "<script>
			                alert('Subject cannot be empty.');
			                window.location='../RHreferral.php';
			                </script>";
	}
	else{
	    $subject = clean_text($_POST["subject"]);
	}

	if(empty($_POST["message"])){
	echo "<script>
			                alert('Message cannot be empty.');
			                window.location='../RHreferral.php';
			                </script>";
	}
	else{
	    $message = clean_text($_POST["message"]);
	}
 

    if($error == ''){
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
	  $mail->Subject=$subject;
	  $mail->Body=$message;

	  if(!$mail->send()){
	  	$flag = 2;
	  }
	  else
	    $flag = 1;
    }

$up = "UPDATE orphan SET applicationStatus = 'Accepted' WHERE orphanID = '$oid'";
$qry = mysqli_query($con, $up);
if($qry){
	if($flag == 1){
		echo "<script>
              alert('You have accepted ".$name."');
              window.location = '../vieworphan.php?orphanid=".$oid."';
              </script>
              ";
	}
}



?>