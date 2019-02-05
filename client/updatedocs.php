<?php
    if(isset($_POST["submit"]))
    {
        require ('../connection.php');
        $refdocs_id = $_POST["referraldocsid"];
        $oid = $_POST['oid'];

        if ($_FILES['birth']['size']==0)
        {
            echo "Walang Laman.";
        }
            
        else
        {
            echo "May Laman";

            $file = $_FILES['birth'];
            $name = $file['name'];

            $path = "referrals/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
                echo "Succeed.";
                $swid = $path;
                $a = "UPDATE o_referraldocs SET birthCertificate = '$swid' WHERE referraldocsID = '$refdocs_id'";
                mysqli_query($con, $a);
            } else {
                echo "Error.";
            }
        }

        if ($_FILES['blotter']['size']==0)
        {
            echo "Walang Laman.";
        }
            
        else
        {
            echo "May Laman";

            $file = $_FILES['blotter'];
            $name = $file['name'];

            $path = "referrals/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
                echo "Succeed.";
                $brgy = $path;
                $a = "UPDATE o_referraldocs SET brgyBlotter = '$brgy' WHERE referraldocsID = '$refdocs_id'";
                mysqli_query($con, $a);
            } else {
                echo "Error.";
            }
        }

        echo "<script>
        window.location='adddocs.php?orphanid=".$oid."';
        </script>";
    }
?>