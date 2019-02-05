<?php
    require('../../connection.php');

    if (isset($_POST["submit"]))
    {
    	if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != ""){
                $file = "photos/" . basename($_FILES['photo']['name']);
                
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $file)){

                    $new = "../photos/" . basename($_FILES['photo']['name']);
                    $dir = "photos/";
                    $name = basename($_FILES['photo']['name']);

                    if(copy($file, $new)){

                        $photo = $dir.$name;

                        $fn = $_POST['fn'];
				    	$mn = $_POST['mn'];
				    	$ln = $_POST['ln'];

				        $query = "INSERT INTO person(firstName, middleName, lastName, type) VALUES (?, ?, ?, 'U')";
				        $stmt = mysqli_stmt_init($con);
                        if(!mysqli_stmt_prepare($stmt, $query)){
                            echo "error";
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "sss", $fn, $mn, $ln);
                            mysqli_stmt_execute($stmt);
                            echo "person added";
                            $pid = mysqli_insert_id($con);
                        }

                    }
                }

                
            }

        $user = $_POST['user'];
        $pw = $_POST['pass'];
        $prog = $_POST['programtype'];

		$query2 = "INSERT INTO user(personID, username, password, programType) VALUES ('$pid', ?, ?, ?)";
		$st = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($st, $query2)){
            echo "error";
        }
        else{
        	mysqli_stmt_bind_param($st, "sss", $user, $pw, $prog);
        	mysqli_stmt_execute($st);

        	echo "<script>";
			echo "alert('Account added!')";
            echo "</script>";
            
            header ('Location: ../accounts.php');
        }
    }
?>