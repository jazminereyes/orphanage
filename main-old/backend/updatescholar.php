<?php

	require('../../connection.php');

	$scholarID = $_POST['sid'];

	$qry = "SELECT * FROM person JOIN scholar on person.personID = scholar.personID WHERE scholar.scholarID='$scholarID'";

	$check = mysqli_query($con, $qry);

	$info = mysqli_fetch_array($check);

    $flag = 0;
    $fn = $_POST['first'];
    $mn = $_POST['middle'];
    $ln = $_POST['last'];
    $nickname = $_POST['nickname'];
    $school = $_POST['school'];
	$yrlvl = $_POST['updateyr'];
    $birthdate = $_POST['birthdate'];
    $person = $info['personID'];


        if($info['firstName'] != $fn){
            $qry5 = "UPDATE person SET firstName = '$fn' WHERE personID = '$person'";
            if(mysqli_query($con, $qry5)){
                $flag = 1;
            }
        }

        if($info['middleName'] != $mn){
            $qry6 = "UPDATE person SET middleName = '$mn' WHERE personID = '$person'";
            if(mysqli_query($con, $qry6)){
                $flag = 1;
            }
        }

        if($info['lastName'] != $ln){
            $qry7 = "UPDATE person SET lastName = '$ln' WHERE personID = '$person'";
            if(mysqli_query($con, $qry7)){
                $flag = 1;
            }
        }

        if($info['school'] != $school){
            $qry8 = "UPDATE scholar SET school = '$school' WHERE scholarID = '$scholarID'";
            if(mysqli_query($con, $qry8)){
                $flag = 1;
            }
        }

		if($info['nickname'] != $nickname){
			$qry2 = "UPDATE scholar SET nickname = '$nickname' WHERE scholarID = '$scholarID'";

				if(mysqli_query($con, $qry2)){
					$flag = 1;
				}
		}

		if(strtotime($birthdate)!=''){
			if($info['birthdate'] != $birthdate){
				$qry3 = "UPDATE scholar SET birthdate = '$birthdate' WHERE scholarID = '$scholarID'";
				if(mysqli_query($con, $qry3)){
					$flag = 1;
				}
			}
			else 
				$flag = 1;

			
		}
		else{
			$flag = 1;
			
		}


		if($yrlvl != ''){
			if($info['currentYrLevel'] != $yrlvl){
				$qry4 = "UPDATE scholar SET currentYrLevel = '$yrlvl' WHERE scholarID = '$scholarID'";

					if(mysqli_query($con, $qry4)){

						$flag = 1;
					}
			}
			else
				$flag = 1;
			

			
		}
		else
			$flag = 1;
			
		
		
		if($flag == 1){
			echo "<script>
					alert('Scholar record updated.');
					window.location='../viewscholar.php?scholarid=".$scholarID."';
					</script>";
		}
?>