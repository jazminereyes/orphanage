<?php
    if (isset($_POST['submit'])){
        
        require('../../connection.php');  

	    if ($con){
            
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];

            if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != ""){
                $file = "photos/" . basename($_FILES['photo']['name']);
                
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $file)){

                    $new = "../photos/" . basename($_FILES['photo']['name']);
                    $dir = "photos/";
                    $name = basename($_FILES['photo']['name']);

                    if(copy($file, $new)){

                        $photo = $dir.$name;

                        $query = "INSERT INTO person(firstName, middleName, lastName, gender, type, photo) VALUES(?, ?, ?, ?, 'O', '$photo')";
                        $stmt = mysqli_stmt_init($con);
                        if(!mysqli_stmt_prepare($stmt, $query)){
                            echo "error";
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "ssss", $fname, $mname, $lname, $gender);
                            mysqli_stmt_execute($stmt);
                            echo "person added";
                            $pid = mysqli_insert_id($con);
                        }

                    }
                }

                
            }
       
            $query2 = "SELECT COUNT(orphanID) as total FROM orphan";
            $result = mysqli_query($con, $query2);

            if ($result){
                $row = mysqli_fetch_row($result);
            }
        
            $year = (int) $_POST['admission'];
            $case = $row[0]+1;
            $caseno = $year."-".$case;

            $bday = $_POST['birthdate'];
            $religion = $_POST['religion'];
            $placefound = $_POST['placefound'];
            $admission = $_POST['admission'];
            $casestatus = $_POST['casestatus'];

		    $query3 = "INSERT INTO orphan(personID, caseNo, birthdate, religion, placeFound, admissionDate, caseStatus, applicationStatus) VALUES ('$pid', '$caseno', ?, ?, ?, ?, ?, 'Accepted')";
            $st = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($st, $query3)){
                echo "error";
            }
            else{
                mysqli_stmt_bind_param($st, "sssss", $bday, $religion, $placefound, $admission, $casestatus);
                mysqli_stmt_execute($st);
                $orphan_id =  mysqli_insert_id($con);
                echo "orphan added";
            }

            $sw = $_POST['socialworker'];
            $ref = $_POST['referral'];

            $query4 = "INSERT INTO o_referral(orphanID, socialWorkerID, referralDate) VALUES ('$orphan_id', ?, ?)";
            $st2 = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($st2, $query4)){
                echo "error";
            }
            else{
                mysqli_stmt_bind_param($st2, "is", $sw, $ref);
                mysqli_stmt_execute($st2);
                $refer_id =  mysqli_insert_id($con);
                echo "referral added".$refer_id;
            }

            $query5 = "INSERT INTO o_referraldocs(referralID) VALUES ('$refer_id')";
            if (mysqli_query($con, $query5)){
                $refdocs_id = mysqli_insert_id($con);
            }

            $file = $_FILES['referral'];
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

            $file = $_FILES['medical'];
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

            if($_FILES['birth']['size']==0){
                echo "Empty.";
            } else {
                $file = $_FILES['birth'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $bc = $path;
                    $a = "UPDATE o_referraldocs SET birthCertificate = '$bc' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                    $flag = 0;
                }
            }

            if($_FILES['brgy']['size']==0){
                echo "Empty.";
            } else {
                $file = $_FILES['birth'];
                $name = $file['name'];

                $path = "referrals/" . basename($name);
                if (move_uploaded_file($file['tmp_name'], $path)) {
                    echo "Succeed.";
                    $brgy = $path;
                    $a = "UPDATE o_referraldocs SET brgyBlotter = '$brgy' WHERE referraldocsID = '$refdocs_id'";
                    mysqli_query($con, $a);
                } else {
                    echo "Error.";
                    $flag = 0;
                }
            }
        
            header ('Location: ../vieworphan.php?orphanid='.$orphan_id.'');
	    }

        else{
		    echo "Error".mysqli_connect_error();
	    }
    }		
?>