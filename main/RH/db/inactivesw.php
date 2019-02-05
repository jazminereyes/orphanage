<?php
    require ('../../../connection.php');

    $swid = $_POST['oid'];

    $query = "UPDATE socialworker SET activeFlag = 0 WHERE socialWorkerID = '$swid'";
    if (mysqli_query($con, $query))
    {
        echo '<script>alert("Social worker is set as inactive.");window.location="../socialworker.php";</script>';
    }

?>