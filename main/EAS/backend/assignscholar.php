<?php

session_start();
require('dbconnect.php');

$spid = $_POST['spid'];
$sid = $_POST['scholar'];

$ch = "SELECT amount, donationType FROM sponsor WHERE sponsorID='$spid'";
    $df = mysqli_query($con, $ch);
    $info = mysqli_fetch_array($df);
    $amount = $info['amount'];
    $dtype = $info['donationType'];

    	$get = "SELECT * FROM s_budgetallocation WHERE budgetType = '$dtype'";
		$b = mysqli_query($con, $get);
		$ba = mysqli_fetch_array($b);

		echo $ba['schoolUniPercent'];
		$budid = $ba['budgetAllocationID'];
		$supp = "0.".$ba['schoolSuppPercent'];
		$proj = "0.".$ba['schoolProjPercent'];
		$unif = "0.".$ba['schoolUniPercent'];
		$cont = "0.".$ba['schoolContribPercent'];
		$transpo = "0.".$ba['transpoPercent'];

		$e_supp = $amount*$supp;
		$e_proj = $amount*$proj;
		$e_unif = $amount*$unif;
		$e_cont = $amount*$cont;
		$e_transpo = $amount*$transpo;

		$check = "SELECT budgetID FROM s_budget WHERE scholarID = '$sid'";
		$g = mysqli_query($con, $check);
		if(mysqli_num_rows($g) == 0){
		
				$in = "INSERT INTO s_budget (budgetAllocationID, scholarID, equivSupplies, equivProjects, equivUniform, equivContrib, equivTranspo, amountSpent, amountRemaining, amountCredited) VALUES ('$budid', '$sid', '$e_supp', '$e_proj', '$e_unif', '$e_cont', '$e_transpo', '0', '$amount', '$amount')";
				$qwe = mysqli_query($con, $in);
				if($qwe){
			    	$sel = "UPDATE scholar SET sponsorID = '$spid' WHERE scholarID = '$sid'";
					$qry = mysqli_query($con, $sel);
					if($qry){
						echo "<script>
					                alert('Scholar Assigned Succesfully');
					                window.location='../viewsponsor.php';
					                </script>";
						// echo "scholar assigned";
					}
					else{
						echo "<script>
					                alert('Assignment Error');
					                window.location='../viewsponsor.php';
					                </script>";
						// echo "scholar not assigned";
					}
				}
				else{
					echo "<script>
					                alert('Assignment Error');
					                window.location='../viewsponsor.php';
					                </script>";
		
					// echo "scholar not assigned";
				}
		
		}
		else{

			$up = "UPDATE s_budget SET equivSupplies = '$e_supp', equivProjects = '$e_proj', equivUniform = '$e_unif', equivContrib = '$e_cont', equivTranspo = '$e_transpo', amountSpent = '0', amountRemaining = '$amount', amountCredited = '$amount' WHERE scholarID = '$sid'";
			$zxc = mysqli_query($con, $up);
				if($zxc){
			    	$sel = "UPDATE scholar SET sponsorID = '$spid' WHERE scholarID = '$sid'";
					$qry = mysqli_query($con, $sel);
					if($qry){
						echo "<script>
					                alert('Scholar Assigned Succesfully');
					                window.location='../viewsponsor.php';
					                </script>";
						// echo "scholar assigned";
					}
					else{
						echo "<script>
					                alert('Assignment Error');
					                window.location='../viewsponsor.php';
					                </script>";
						// echo "scholar not assigned";
					}
				}
				else{
					echo "<script>
					                alert('Assignment Error');
					                window.location='../viewsponsor.php';
					                </script>";
		
					// echo "scholar not assigned";
				}

		}

?>