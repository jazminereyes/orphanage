<?php

//Sending Email
$flag = 2;
$error = '';
$email = '';
$subject = '';
$message = '';

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
	 
	    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	        // $error .= '<p><label class="text-danger">Invalid email format</label></p>';
	        echo "invalid email";
	    }

	if(empty($_POST["subject"])){
	    // $error .= '<p><label class="text-danger">Subject is required</label></p>';
	    echo "subject empty";
	}
	else{
	    $subject = clean_text($_POST["subject"]);
	}

	if(empty($_POST["message"])){
	    // $error .= '<p><label class="text-danger">Message is required</label></p>';
	    echo "message empty";
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
	  	// echo "<script>
	  	// alert('Message not sent.');
	  	// </script>";
	  	$flag = 2;
	  }
	  else
	  	// echo "<script>
	  	// alert('Message has been sent.');
	  	// </script>";
	    $flag = 0;
    }

require('dbconnect.php');

$spid = $_POST['spid'];

$get = "SELECT firstName, lastName from person as p join sponsor as sp on p.personID = sp.personID WHERE sponsorID = '$spid'";
$g = mysqli_query($con, $get);
$d = mysqli_fetch_array($g);

$fname = $d['firstName'];
$lname = $d['lastName'];
$today = date('Y-m-d');

$check = "SELECT scholarID FROM scholar WHERE sponsorID = '$spid'";
$qwe = mysqli_query($con, $check);
if(mysqli_num_rows($qwe) == 0){
    // if($flag == 0){
    	$sel = "UPDATE sponsor SET activeFlag = '0', inactivityDate = '$today' WHERE sponsorID = '$spid'";
		$qry = mysqli_query($con, $sel);
		if($qry){
			echo "<script>
		                alert('Email sent. Sponsor has been set as inactive.');
		                window.location='../sponsor.php';
		                </script>";
		}
    // }
	
}
else{
	echo "<script>
	                alert('Termination error. ".$fname." ".$lname." still has scholars.');
	                window.location='../sponsor.php';
	                </script>";
}

?>