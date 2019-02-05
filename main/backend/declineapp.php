<?php
    require ('../../connection.php');

    $scholar_id = $_POST["oid"];

    $query = "UPDATE scholar SET applicationStatus = 'Declined' WHERE scholarID = ?";
    $st = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($st, $query)){
        echo "error";
    }
    else{
    	mysqli_stmt_bind_param($st, "i", $scholar_id);
    	mysqli_stmt_execute($st);
    	header ('Location: ../application.php');

    }
    // if (mysqli_query($con, $query))
    // {
    //     header ('Location: ../application.php');
    // }
?>