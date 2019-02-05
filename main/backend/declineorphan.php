<?php
    $orphan_id = $_POST['oid'];

    require ('../../connection.php');
    
    $query = "UPDATE orphan SET applicationStatus = 'Declined' WHERE orphanID = ?";
    $st = mysqli_stmt_init($con);
     if(!mysqli_stmt_prepare($st, $query)){
        echo "error";
    }
    else{
    	mysqli_stmt_bind_param($st, "i", $orphan_id);
    	mysqli_stmt_execute($st);
    	header ('Location: ../application.php');

    }

?>