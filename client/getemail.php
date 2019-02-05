<?php
    $email = $_GET["email"];

    $q = "SELECT email FROM socialworker WHERE email = '$_POST[email]'";
    $r = mysqli_query($con, $query);
    $s = mysqli_num_rows($r);

    if($s==0)
    {
        echo "<script>";
        echo "alert('Email address is already taken.');";
        echo "</script>";
    }
?>