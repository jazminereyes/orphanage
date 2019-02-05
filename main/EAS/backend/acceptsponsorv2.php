<?php

//Sending Email

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

     echo "walang error";
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
	  	echo "message not sent";
	  }
	  else
	  	// echo "<script>
	  	// alert('Message has been sent.');
	  	// </script>";

	  	echo "message sent";
    }


require('dbconnect.php');

$spid = $_POST['spid'];
$username = $_POST['usern'];
$pw = $_POST['pword'];

$get = "SELECT userID FROM sponsor WHERE sponsorID = '$spid'";
$qwe = mysqli_query($con, $get);
$h = mysqli_fetch_array($qwe);
$uid = $h['userID'];

$up = "UPDATE user SET username = ?, password = ?, programType = 'Sponsor' WHERE userID = '$uid'";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $up)){
	echo "user update error";
}
else{
	mysqli_stmt_bind_param($stmt, "ss", $username, $pw);
	mysqli_stmt_execute($stmt);
	$sel = "UPDATE sponsor SET applicationStatus = 'A' WHERE sponsorID = '$spid'";
    $qry = mysqli_query($con, $sel);
	if($qry){
		echo "<script>
	                alert('Sponsor accepted. An email has been sent to notify them.');
	                window.location='../viewsponsor.php?sponsorid=".$spid."';
	                </script>";

	}

}



?>