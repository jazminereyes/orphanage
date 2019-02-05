<?php
    $orphan_id = $_POST['oid'];

    require ('../../connection.php');
    
    $query = "UPDATE orphan SET applicationStatus = 'Declined' WHERE orphanID = '$orphan_id'";
    
    if (mysqli_query($con, $query))
    {
        header ('Location: ../referrals.php');
    }

?>