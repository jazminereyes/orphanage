<?php

    require ('../../../connection.php');

    $pid = $_POST['pid'];
    $swid = $_POST['swid'];
    $uname = $_POST['usern'];
    $pw = $_POST['pword'];
    $today = date('Y-m-d');

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
        $user = clean_text($_POST["usern"]);
        $pass = clean_text($_POST["pword"]);
     
        // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     $error .= '<p><label class="text-danger">Invalid email format</label></p>';
        // }

    // if(empty($_POST["subject"])){
    //     $error .= '<p><label class="text-danger">Subject is required</label></p>';
    //     echo "subject empty";
    // }
    // else{
    //     $subject = clean_text($_POST["subject"]);
    // }

    // if(empty($_POST["message"])){
    //     $error .= '<p><label class="text-danger">Message is required</label></p>';
    //     echo "message empty";
    // }
    // else{
    //     $message = clean_text($_POST["message"]);
    // }
 

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
      $mail->Subject="Referral Request Notification";
      $mail->Body="<p>Good day.<br/><br/>This is to inform you that your request for referral in Concordia Children's Service Inc has been approved. Below is your account information. You can use this to sign in to our website to refer orphans and view the referral progress. You may reply to this message if you have any questions. Thank you!</p>

          <h4>Account Information:</h4>
          <p>
           
           Email:".$user."<br/>
           Password:".$pass."
          </p>";

      if(!$mail->send()){
        // $flag = 0;
      }
      else{
        
        // $flag = 1;
      }
    }


    $get = "SELECT userID FROM user WHERE personID = '$pid'";
    $qwe = mysqli_query($con, $get);
    $h = mysqli_fetch_array($qwe);
    $uid = $h['userID'];

    $up = "UPDATE user SET password = ?, programType = 'Social Worker' WHERE userID = '$uid'";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $up)){
        echo "user update error";
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $pw);
        mysqli_stmt_execute($stmt);
        $sel = "UPDATE socialworker SET verifiedFlag = '1', activeFlag = '1' WHERE socialWorkerID = '$swid'";
        $qry = mysqli_query($con, $sel);
        if($qry){
            // if($flag == 1){
                
                    echo "<script>
                                alert('Social worker authenticated. Email sent.');
                                window.location='../viewsocialworker.php?swid=".$swid."';
                                </script>";
            // }

        }

    }
?>