<?php

session_start();
require('dbconnect.php');

$sid = $_POST['sid'];
$spid = $_POST['spid'];

    $ch = "SELECT amount, donationType FROM sponsor WHERE sponsorID='$spid'";
    $df = mysqli_query($con, $ch);
    $info = mysqli_fetch_array($df);
    $amount = $info['amount'];
    $dtype = $info['donationType'];

	$sel = "SELECT scholarID FROM s_budget WHERE scholarID = '$sid'";
	$qry = mysqli_query($con, $sel);
	if(mysqli_num_rows($qry) == 0){

		$get = "SELECT * FROM s_budgetallocation WHERE budgetType = '$dtype'";
		$b = mysqli_query($con, $get);
		$ba = mysqli_fetch_array($b);
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

		$in = "INSERT INTO s_budget (budgetAllocationID, scholarID, equivSupplies, equivProjects, equivUniform, equivContrib, equivTranspo, amountSpent, amountRemaining, amountCredited) VALUES ('$budid', '$sid', '$e_supp', '$e_proj', '$e_unif', '$e_cont', '$e_transpo', '0', '$amount', '$amount')";
		$qwe = mysqli_query($con, $in);
		if($qwe){
			$sql = "UPDATE scholar SET sponsorID = '$spid' WHERE scholarID = '$sid'";
            $up = mysqli_query($con, $sql);
            if($up){
			  echo "<script>
                alert('Sponsor Assigned Succesfully');
                window.location='../sponsordet.php';
                </script>";
			}
			else 
				echo "<script>
                alert('Sponsor Assignment Error');
                window.location='../sponsordet.php';
                </script>";
		}
		else{
			echo "<script>
                alert('Sponsor Assignment Error');
                window.location='../sponsordet.php';
                </script>";
		}
	}
	else{

		$db = "SELECT amountRemaining FROM s_budget WHERE scholarID = '$sid'";
		$db2 = mysqli_query($con, $db);
		$g = mysqli_fetch_array($db2);
		$rem = $g['amountRemaining'];

		$get = "SELECT * FROM s_budgetallocation WHERE budgetType = '$dtype'";
		$b = mysqli_query($con, $get);
		$ba = mysqli_fetch_array($b);
		$budid = $ba['budgetAllocationID'];
		$supp = "0.".$ba['schoolSuppPercent'];
		$proj = "0.".$ba['schoolProjPercent'];
		$unif = "0.".$ba['schoolUniPercent'];
		$cont = "0.".$ba['schoolContribPercent'];
		$transpo = "0.".$ba['transpoPercent'];

		$amount = $amount + $rem;
		$e_supp = $amount*$supp;
		$e_proj = $amount*$proj;
		$e_unif = $amount*$unif;
		$e_cont = $amount*$cont;
		$e_transpo = $amount*$transpo;

		$upd = "UPDATE s_budget SET budgetAllocationID = '$budid', equivSupplies = '$e_supp', equivProjects = '$e_proj', equivUniform = '$e_unif', equivContrib = '$e_cont', equivTranspo = '$e_transpo', amountSpent = '0', amountRemaining = '$amount', amountCredited = '$amount' WHERE scholarID = '$sid'";
		$save = mysqli_query($con, $upd);
		if($save){
			$sql = "UPDATE scholar SET sponsorID = '$spid' WHERE scholarID = '$sid'";
            $up = mysqli_query($con, $sql);
            if($up){
			  echo "<script>
                alert('Sponsor Assigned Succesfully');
                window.location='../sponsordet.php';
                </script>";
		    }
		} 
		else{
			echo "<script>
                alert('Sponsor Assignment Error');
                window.location='../sponsordet.php';
                </script>";
		}

	}


?>