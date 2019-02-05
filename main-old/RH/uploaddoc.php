<?php
    $type = $_POST['type'];
    $refdocs_id = $_POST['refid'];
    $oid = $_POST['oid'];

    require ('../../connection.php');

    $flag = 0;

    if($type==1)
    {
        $file = $_FILES['birth'];
        $name = $file['name'];

        $path = "../../client/referrals/" . basename($name);
        if (move_uploaded_file($file['tmp_name'], $path)) {
            echo "Succeed.";
            $birth = $path;
            $a = "UPDATE o_referraldocs SET birthCertificate = '$brgy' WHERE referraldocsID = '$refdocs_id'";
            mysqli_query($con, $a);
            $flag = 1;
        } else {
            echo "Error.";
            $flag = 0;
        }
    }

    elseif($type==2)
    {
        $file = $_FILES['brgy'];
        $name = $file['name'];

        $path = "../../client/referrals/" . basename($name);
        if (move_uploaded_file($file['tmp_name'], $path)) {
            echo "Succeed.";
            $brgy = $path;
            $a = "UPDATE o_referraldocs SET brgyBlotter = '$brgy' WHERE referraldocsID = '$refdocs_id'";
            mysqli_query($con, $a);
            $flag = 1;
        } else {
            echo "Error.";
            $flag = 0;
        }
    }

    if($flag==1)
    {
        header ('Location: RHvieworphan.php?orphanid='.$oid.'');
    }
?>