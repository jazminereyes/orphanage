<?php

require('dbconnect.php');

$sid = $_POST['sid'];
$fromCat = $_POST['rowName'];
$toCat = $_POST['columnName'];
$amt = $_POST['amt'];

$sel = "SELECT * FROM s_budget WHERE scholarID = '$sid'";
$qwe = mysqli_query($con, $sel);
$rec = mysqli_fetch_array($qwe);

$supp = $rec['equivSupplies'];
$proj = $rec['equivProjects'];
$unif = $rec['equivUniform'];
$cont = $rec['equivContrib'];
$trans = $rec['equivTranspo'];

echo $amt;

if($fromCat == "School Supplies"){
		$supp = $supp - $amt;

	if($toCat == "School Contribution"){
		$cont = $amt + $cont;
		$up = "UPDATE s_budget SET equivSupplies = '$supp', equivSupplies = '$cont'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Projects"){
		$proj = $amt + $proj;
		$up = "UPDATE s_budget SET equivSupplies = '$supp', equivProjects = '$proj'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Uniform"){
		$unif = $amt + $unif;
		$up = "UPDATE s_budget SET equivSupplies = '$supp', equivUniform = '$unif'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "Transportation"){
		$trans = $amt + $trans;
		$up = "UPDATE s_budget SET equivSupplies = '$supp', equivTranspo = '$trans'";
		$sql = mysqli_query($con, $up);
	}

	echo "<script>
			alert('Amount transferred.');
			window.location = '../expense.php?scholarid=".$sid."';
		</script>";
}
else if($fromCat == "School Projects"){

	$proj = $proj - $amt;

	if($toCat == "School Supplies"){
		$supp = $amt + $supp;
		$up = "UPDATE s_budget SET equivProjects = '$proj', equivSupplies = '$supp'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Uniform"){
		$supp = $amt + $unif;
		$up = "UPDATE s_budget SET equivProjects = '$proj', equivUniform = '$unif'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Contribution"){
		$supp = $amt + $cont;
		$up = "UPDATE s_budget SET equivProjects = '$proj', equivContrib = '$cont'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "Transportation"){
		$supp = $amt + $trans;
		$up = "UPDATE s_budget SET equivProjects = '$proj', equivTranspo = '$trans'";
		$sql = mysqli_query($con, $up);
	}

	echo "<script>
			alert('Amount transferred.');
			window.location = '../expense.php?scholarid=".$sid."';
		</script>";

}
else if($fromCat == "School Uniform"){

	$unif = $unif - $amt;

	if($toCat == "School Contribution"){
		$cont = $amt + $cont;
		$up = "UPDATE s_budget SET equivUniform = '$unif', equivContrib = '$cont'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Supplies"){
		$supp = $amt + $supp;
		$up = "UPDATE s_budget SET equivUniform = '$unif', equivSupplies = '$supp'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Projects"){
		$proj = $amt + $proj;
		$up = "UPDATE s_budget SET equivUniform = '$unif', equivProjects = '$proj'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "Transportation"){
		$proj = $amt + $proj;
		$up = "UPDATE s_budget SET equivUniform = '$unif', equivTranspo = '$trans'";
		$sql = mysqli_query($con, $up);
	}

	echo "<script>
			alert('Amount transferred.');
			window.location = '../expense.php?scholarid=".$sid."';
		</script>";

}
else if($fromCat == "School Contribution"){

	$cont = $cont - $amt;

	if($toCat == "School Supplies"){
		$supp = $amt + $supp;
		$up = "UPDATE s_budget SET equivContrib = '$cont', equivSupplies = '$supp'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Projects"){
		$supp = $amt + $supp;
		$up = "UPDATE s_budget SET equivContrib = '$cont', equivProjects = '$proj'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Uniform"){
		$unif = $amt + $unif;
		$up = "UPDATE s_budget SET equivContrib = '$cont', equivUniform = '$unif'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "Transportation"){
		$trans = $amt + $trans;
		$up = "UPDATE s_budget SET equivContrib = '$cont', equivTranspo = '$trans'";
		$sql = mysqli_query($con, $up);
	}

	echo "<script>
			alert('Amount transferred.');
			window.location = '../expense.php?scholarid=".$sid."';
		</script>";
}
else if($fromCat == "Transportation"){

	$trans = $trans - $amt;

	if($toCat == "School Supplies"){
		$supp = $amt + $sup;
		$up = "UPDATE s_budget SET equivTranspo = '$trans', equivSupplies = '$supp'";
		$sql = mysqli_query($con, $up);
	}
	else if($toCat == "School Uniform"){
		$unif = $amt + $unif;
		$up = "UPDATE s_budget SET equivTranspo = '$trans', equivUniform = '$unif'";
		$sql = mysqli_query($con, $up);
	}
	if($toCat == "School Projects"){
		$proj = $amt + $proj;
		$up = "UPDATE s_budget SET equivTranspo = '$trans', equivProjects = '$proj'";
		$sql = mysqli_query($con, $up);
	}
	if($toCat == "School Contribution"){
		$trans = $amt + $trans;
		$up = "UPDATE s_budget SET equivTranspo = '$trans', equivContrib = '$cont'";
		$sql = mysqli_query($con, $up);
	}

	echo "<script>
			alert('Amount transferred.');
			window.location = '../expense.php?scholarid=".$sid."';
		</script>";
}



?>