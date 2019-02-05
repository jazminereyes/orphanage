<?php
    require ('../../connection.php');

    $scholar_id = $_POST["oid"];

    echo $scholar_id;

    $query = "UPDATE scholar SET applicationStatus = 'Declined' WHERE scholarID = '$scholar_id'";
    if (mysqli_query($con, $query))
    {
        header ('Location: ../application.php');
    }
?>