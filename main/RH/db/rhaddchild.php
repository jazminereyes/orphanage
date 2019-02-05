<?php
    if (isset($_POST['submit'])){
        
        global $last_id, $orphan_id, $row;

        include('../dbconnect.php');
        
        $flag = 0;
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];

	if ($con)
	{
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != ""){
            $file = "photos/" . basename($_FILES['photo']['name']);
            
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $file)){

                $new = "../../photos/" . basename($_FILES['photo']['name']);
                $dir = "photos/";
                $name = basename($_FILES['photo']['name']);

                if(copy($file, $new)){

                    $photo = $dir.$name;

                   $in = "INSERT INTO person (firstName, middleName, lastName, gender, type, photo) VALUES (?, ?, ?, ?, 'O', ?)";
                    $s = mysqli_stmt_init($con);
                    if(!mysqli_stmt_prepare($s, $in)){
                       echo "person error";
                    }
                    else{
                        mysqli_stmt_bind_param($s, "sssss", $fname, $mname, $lname, $gender, $photo);
                        mysqli_stmt_execute($s);
                        $flag = 1;
                        $last_id = mysqli_insert_id($con);
                    }

                }
            }

            unlink($file);
        } else
            $file = "";

        
        $query2 = "SELECT COUNT(orphanID) as total FROM orphan";
        $result = mysqli_query($con, $query2);

            if ($result)
            {
                $row = mysqli_fetch_row($result);
            }
        
        $year = (int) $_POST['admission'];
        $case = $row[0]+1;
        $caseno = $year."-".$case;

        $birthdate = $_POST['birthdate'];
        $religion = $_POST['religion'];
        $placefound = $_POST['placefound'];
        $admission = $_POST['admission'];
        $casestatus = $_POST['casestatus'];

 
        $qry3 = "INSERT INTO orphan(personID, caseNo, birthdate, religion, placeFound, admissionDate, caseStatus, applicationStatus) VALUES ('$last_id', ?, ?, ?, ?, ?, ?, 'Accepted')";

        $stmt2 = mysqli_stmt_init($con);

			if (!mysqli_stmt_prepare($stmt2, $qry3)){
                echo "Error.";
			}

			else
			{    
                mysqli_stmt_bind_param($stmt2, "ssssss", $caseno, $birthdate, $religion, $placefound, $admission, $casestatus);
                mysqli_stmt_execute($stmt2);
                $flag = 1;
                $orphan_id = mysqli_insert_id($con);
			}

		
        $swid = $_POST['socialworker'];
        $refdate = $_POST['refdate'];


        $q4 = "INSERT INTO o_referral (orphanID, socialWorkerID, referralDate) VALUES ('$orphan_id', '$swid', ?)";

        $stmt3 = mysqli_stmt_init($con);

        if (!mysqli_stmt_prepare($stmt3, $q4)){
            echo "Error.";
            
        }
        else{   
            mysqli_stmt_bind_param($stmt3, "s", $refdate);
            mysqli_stmt_execute($stmt3);
            $flag = 1;
            $refer_id = mysqli_insert_id($con);
        }

        $q5 = "INSERT INTO o_referraldocs (referralID) VALUES ('$refer_id')";
        if (mysqli_query($con, $q5))
        {
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

        if($_FILES['birth']['size']==0)
        {
            echo "Empty.";
        }

        else
        {
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

        if($_FILES['brgy']['size']==0)
        {
            echo "Empty.";
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
                $flag = 0;
            }
        }


        if($flag == 1){
            echo "<script>
                alert('Orphan added successfully.');
                window.location='../RHvieworphan.php?orphanid=".$orphan_id."';
                    </script>";

        }
	}

	else
	{
		echo "Error".mysqli_conect_error();
	}
    }
    
	
			
?>