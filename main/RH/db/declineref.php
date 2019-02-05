<?php
    
    require('../dbconnect.php');

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

    $message = nl2br($message);
    // $message = trim($message);
    // $message = str_replace('\t', '&nbsp', $message);
    // $message = str_replace('\n', '<br/>', $message);

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
        $flag = 0;
    }

            $qry = "UPDATE orphan SET applicationStatus = 'Declined' WHERE orphanID = '$oid'";
            if($sql = mysqli_query($con, $qry)){
              if($flag == 0){
                echo "<script>
                          alert('You have declined the referral. Email sent.');
                          window.location='../RHreferral.php';
                          </script>";
              }
            }
             else{
                echo "<script>
                          alert('Decline referral error.');
                          window.location='../RHreferral.php';
                          </script>";
            }




?>