<?php
    $orphan_id = $_POST['oid'];

    require ('../../connection.php');
    
    $a = "SELECT COUNT(orphanID) FROM orphan WHERE applicationStatus = 'Accepted'";
    $b = mysqli_query($con, $a);
    $c = mysqli_fetch_row($b);

    $today = date('Y-m-d');
    $year = (int)$today;
    $case = $c[0]+1;
    $caseno = $year."-".$case;

    $query = "UPDATE orphan SET applicationStatus = 'Accepted', admissionDate = '$today', caseNo = '$caseno' WHERE orphanID = '$orphan_id'";
    if (mysqli_query($con, $query))
    {
        header ('Location: ../referrals.php');
    }

?>