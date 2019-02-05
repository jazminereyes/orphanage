<?php
    $sponsor_id = $_POST['oid'];

    require ('../../connection.php');

    $today = date('Y-m-d');

    $query = "UPDATE sponsor SET inactivityDate = '$today', activeFlag = '0' WHERE sponsorID = '$sponsor_id'";
    if (mysqli_query($con, $query))
    {
        header ('Location: ../sponsors.php');
    }
?>