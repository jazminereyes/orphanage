<?php

require('dbconnect.php');

$supp = $_POST['supp'];
$proj = $_POST['proj'];
$unif = $_POST['unif'];
$cont = $_POST['cont'];
$transpo = $_POST['transpo'];
$ep = $_POST['ep'];
$budid = $_POST['budid'];

$yr = date('Y');
$mt = date('m');
$day = date('d');

if(isset($_POST['submit'])){
	if($budid == '1'){
		$sel = "UPDATE s_budgetallocation SET schoolSuppPercent = ?, schoolProjPercent = ?,  schoolUniPercent = ?, schoolContribPercent = ?, transpoPercent = ?, effectivityPeriod = ? WHERE budgetAllocationID = '1'";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $sel)){
			echo "error";
		}
		else{
			mysqli_stmt_bind_param($stmt, "iiiiis", $supp, $proj, $unif, $cont, $transpo, $ep);
			mysqli_stmt_execute($stmt);
			echo "<script>
	                alert('Scholar budget for Elementary - Monthly updated.');
	                window.location='../budget.php';
	                </script>";
		}
	}
	elseif($budid == '2'){
		$sel = "UPDATE s_budgetallocation SET schoolSuppPercent = ?, schoolProjPercent = ?,  schoolUniPercent = ?, schoolContribPercent = ?, transpoPercent = ?, effectivityPeriod = ? WHERE budgetAllocationID = '2'";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $sel)){
			echo "error";
		}
		else{
			mysqli_stmt_bind_param($stmt, "iiiiis", $supp, $proj, $unif, $cont, $transpo, $ep);
			mysqli_stmt_execute($stmt);
			echo "<script>
	                alert('Scholar budget for Elementary - Yearly updated.');
	                window.location='../budget.php';
	                </script>";
		}
	}
	elseif($budid == '3'){
		$sel = "UPDATE s_budgetallocation SET schoolSuppPercent = ?, schoolProjPercent = ?,  schoolUniPercent = ?, schoolContribPercent = ?, transpoPercent = ?, effectivityPeriod = ? WHERE budgetAllocationID = '3'";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $sel)){
			echo "error";
		}
		else{
			mysqli_stmt_bind_param($stmt, "iiiiis", $supp, $proj, $unif, $cont, $transpo, $ep);
			mysqli_stmt_execute($stmt);
			echo "<script>
	                alert('Scholar budget for Highschool - Monthly updated.');
	                window.location='../budget.php';
	                </script>";
		}
	}
	elseif($budid == '4'){
		$sel = "UPDATE s_budgetallocation SET schoolSuppPercent = ?, schoolProjPercent = ?,  schoolUniPercent = ?, schoolContribPercent = ?, transpoPercent = ?, effectivityPeriod = ? WHERE budgetAllocationID = '4'";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $sel)){
			echo "error";
		}
		else{
			mysqli_stmt_bind_param($stmt, "iiiiis", $supp, $proj, $unif, $cont, $transpo, $ep);
			mysqli_stmt_execute($stmt);
			echo "<script>
	                alert('Scholar budget for Highschool - Yearly updated.');
	                window.location='../budget.php';
	                </script>";
	    }
	}
}

?>