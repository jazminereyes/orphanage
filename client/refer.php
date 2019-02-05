<?php
    if (isset($_POST['submit']))
    {
        require ('../connection.php');

        if ($_POST['month']==""||$_POST['date']==""||$_POST['year']=="")
        {
            $birthdate = "";
        }

        else
        {
            $birthdate = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
        }

        /*$age = date_diff(date_create($birthdate), date_create('today'))->y;

        if ($age>1)
        {
            echo '<script>
                alert("Child cannot be older than 1 year old.");
                window.location = "referral.php";    
            </script>';
        }*/

        $password = createRandomPassword();
        $userid = $_SESSION["user"];
        $q = "SELECT socialWorkerID FROM user JOIN person JOIN socialworker ON user.personID = person.personID AND person.personID = socialworker.personID WHERE userID = '$userid'";
        $result = mysqli_query($con, $q);
        $row = mysqli_fetch_row($result);
        $swid = $row[0];

        echo $swid;

        /*$query = "INSERT INTO person(firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'O')";
        if (mysqli_query($con, $query))
        {
            $last_id = mysqli_insert_id($con);
        }

        $query2 = "INSERT INTO orphan(personID, birthdate, gender, religion, placeFound, caseStatus, applicationStatus) VALUES ('$last_id', '$birthdate', '$_POST[gender]', '$_POST[religion]', '$_POST[placefound]', '$_POST[casestatus]', 'Pending')";
        if (mysqli_query($con, $query2))
        {
            $orphan_id = mysqli_insert_id($con);
        }

        $today = date('Y-m-d');

        $query3 = "INSERT INTO o_referral(orphanID, socialWorkerID, referralDate, referralCode) VALUES ('$orphan_id', '$swid', '$today', '$password')";
        if (mysqli_query($con, $query3))
        {
            $referral_id = mysqli_insert_id($con);
        }

        $query4 = "INSERT INTO o_referraldocs(referralID) VALUES ('$referral_id')";
        if (mysqli_query($con, $query4))
        {
            $refdocs_id = mysqli_insert_id($con);
        }*/

       //if (!empty($_POST["swid"]))
        //{

            $file = $_FILES['child'];
            $name = $file['name'];

            $path = "referrals/" . basename($name);
            if (move_uploaded_file($file['tmp_name'], $path)) {
            echo "Succeed.";
            $child = $path;
            } else {
            echo "Error.";
            }

            /*if (empty($_POST['swid']))
            {
                echo "Referral Letter is Empty";
            }*/

            if ($_FILES['swid']['size']==0)
            {
                echo "Walang Laman.";
            }
            
            else
            {
                echo "May Laman";

                $file = $_FILES['swid'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $swid = $path;
                    $a = "UPDATE o_referraldocs SET swIDcard = '$swid' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }

            }

            if ($_FILES['refer']['size']==0)
            {
                echo "Walang Laman.";
            }
            
            else 
            {
                $file = $_FILES['refer'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $refer = $path;
                    $a = "UPDATE o_referraldocs SET referralLetter = '$refer' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }
            }
            
            if ($_FILES['bc']['size']==0)
            {
                echo "Walang Laman.";
            }
            
            else 
            {
                $file = $_FILES['bc'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $bc = $path;
                    $a = "UPDATE o_referraldocs SET birthCertificate = '$bc' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }

            }
            
            if ($_FILES['med']['size']==0)
            {
                echo "Walang Laman.";
            }
            else 
            {
                $file = $_FILES['med'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $med = $path;
                    $a = "UPDATE o_referraldocs SET medicalAbstract = '$med' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                }
            }
            
            if ($_FILES['brgy']['size']==0)
            {
                echo "Walang Laman.";
            }

            else 
            {
                $file = $_FILES['brgy'];
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

            echo "<script src='js/sweetalert.min.js'></script>";
            echo "swal('Success!', 'Yey', 'success');";
            echo "</script>";

            /*echo "<script>";
            echo "alert('Application is submitted. Please remember this code for viewing. Referral Code:".$password."');";
            echo "window.location.href='index.php'";
            echo "</script>";*/

            /*$target_file = $target_directory.basename($_FILES["swid"]["name"]);

            if (move_uploaded_file($_FILE["swid"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $swid = $target_file;
            }*/
        //}

        /*if (!empty($_POST["refer"]))
        {
            $target_file = $target_directory.basename($_FILES["refer"]["name"]);

            if (move_uploaded_file($_FILE["refer"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $refer = $target_file;
            }
        }

        if (!empty($_POST["bc"]))
        {
            $target_file = $target_directory.basename($_FILES["bc"]["name"]);

            if (move_uploaded_file($_FILE["bc"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $bc = $target_file;
            }
        }

        if (!empty($_POST["med"]))
        {
            $target_file = $target_directory.basename($_FILES["med"]["name"]);

            if (move_uploaded_file($_FILE["med"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $med = $target_file;
            }
        }

        if (!empty($_POST["brgy"]))
        {
            $target_file = $target_directory.basename($_FILES["brgy"]["name"]);

            if (move_uploaded_file($_FILE["brgy"]["tmp_name"], $target_file))
            {
                echo "File has been uploaded";
                $brgy = $target_file;
            }
        }
        
        $query4 = "INSERT INTO o_referraldocs(referralID, referralLetter, brgyBlotter, medicalAbstract, birthCertificate) VALUES ('$referral_id', '$refer', '$brgy', '$med', '$bc')";
        if (mysqli_query($con, $query4))
        {
            echo "<script>";
            echo "alert('Application is submitted. Please remember this code for viewing. Referral Code:".$password."');";
            echo "window.location.href='index.php'";
            echo "</script>";
        }*/
    }

    function createRandomPassword() { 

        $chars = "abcdefghijkmnopqrstuvwxyz0123456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
    
        while ($i <= 5) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
    
        return $pass; 
    
    } 
?>