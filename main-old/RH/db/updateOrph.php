<?php
    session_start();
    $person = $_POST["pid"];
    $orphan = $_POST["oid"];

    $flag = 0;

    require('../dbconnect.php');

        $fname = $_POST["fn"];
        $mname = $_POST["mn"];
        $lname = $_POST["ln"];

        $query2 = "UPDATE person SET firstName = ?, middleName = ?, lastName = ? WHERE person.personID = '$person'";

        $stmt = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt, $query2)){
            echo 'name update error';

        }

        else{
            mysqli_stmt_bind_param($stmt, "sss", $fname, $mname, $lname);
            mysqli_stmt_execute($stmt);
            $flag = 1;
        }
        
        if($flag == 1){

            $religion = $_POST["religion"];
            $bdate = $_POST["birthdate"];

            $query4 = "UPDATE orphan SET birthdate = ?, religion = ? WHERE orphan.personID = '$person'";

            $stmt2 = mysqli_stmt_init($con);

            if(!mysqli_stmt_prepare($stmt2, $query4)){
                echo 'details update error';
            }

            else{
                mysqli_stmt_bind_param($stmt2, "ss", $bdate, $religion);
                mysqli_stmt_execute($stmt2);
                echo "<script>
                alert('Record Updated Succesfully');
                window.location='../RHvieworphan.php?orphanid=".$orphan."';
                disableOrphan();
                </script>";
                
            }
        
        }
        else{
            echo "update error";
        }
    
?>