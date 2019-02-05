<?php
require ('../connection.php');

$email = $_POST['email'];

$echeck="select email from socialworker where email='$email'";
   $echk=mysqli_query($con, $echeck);
   $ecount=mysqli_num_rows($echk);
  if($ecount!=0)
   {
      echo "true";
   }
   else
   {
       echo "false";
   }
?>