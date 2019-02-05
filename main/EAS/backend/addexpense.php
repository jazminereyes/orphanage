<?php

session_start();

require('dbconnect.php');


$date = date('Y-m-d');
$sid = $_POST['scholar'];
$budid = $_POST['budid'];
$bal = $_POST['balance'];
$purpose = $_POST['purpose'];
$category = $_POST['category'];
$qty = $_POST['quantity'];
$price = $_POST['price'];
$tbal = $_POST['tbal'];
$auth = $_POST['auth'];

$ins = "INSERT INTO s_expensestatement (budgetID, purpose, expenseCategory, quantity, amount, balance, receivedBy, releaseDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt, $ins)){
}
else{
	mysqli_stmt_bind_param($stmt, "issiddss", $budid, $purpose, $category, $qty, $price, $tbal, $auth, $date);
	mysqli_stmt_execute($stmt);
	$flag = 1;
}

if($category == "supplies"){

	$spent = 0;
	$sp = $_POST['spent'];

	$cat = $bal - $price;
	$spent = $sp + $price;

	$in = "UPDATE s_budget SET equivSupplies = ?, amountSpent = ?, amountRemaining = ? WHERE scholarID = '$sid'";

	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $in)){
	}
	else{
		mysqli_stmt_bind_param($st, "ddd", $cat, $spent, $tbal);
		mysqli_stmt_execute($st);
		$flag = 1;
	}


}
elseif($category == "projects"){

	$spent = 0;
	$sp = $_POST['spent'];

	$cat = $bal - $price;
	$spent = $sp + $price;

	$in = "UPDATE s_budget SET equivProjects = ?, amountSpent = ?, amountRemaining = ? WHERE scholarID = '$sid'";

	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $in)){
	}
	else{
		mysqli_stmt_bind_param($st, "ddd", $cat, $spent, $tbal);
		mysqli_stmt_execute($st);
		$flag = 1;
	}
}
elseif($category == "uniform"){

	$spent = 0;
	$sp = $_POST['spent'];

	$cat = $bal - $price;
	$spent = $sp + $price;

	$in = "UPDATE s_budget SET equivUniform = ?, amountSpent = ?, amountRemaining = ? WHERE scholarID = '$sid'";

	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $in)){
	}
	else{
		mysqli_stmt_bind_param($st, "ddd", $cat, $spent, $tbal);
		mysqli_stmt_execute($st);
		$flag = 1;
	}
}
elseif($category == "contributions"){

	$spent = 0;
	$sp = $_POST['spent'];

	$cat = $bal - $price;
	$spent = $sp + $price;

	$in = "UPDATE s_budget SET equivContrib = ?, amountSpent = ?, amountRemaining = ? WHERE scholarID = '$sid'";

	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $in)){
	}
	else{
		mysqli_stmt_bind_param($st, "ddd", $cat, $spent, $tbal);
		mysqli_stmt_execute($st);
		$flag = 1;
	}
}
elseif($category == "transportation"){

	$spent = 0;
	$sp = $_POST['spent'];

	$cat = $bal - $price;
	$spent = $sp + $price;

	$in = "UPDATE s_budget SET equivTranspo = ?, amountSpent = ?, amountRemaining = ? WHERE scholarID = '$sid'";

	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $in)){
	}
	else{
		mysqli_stmt_bind_param($st, "ddd", $cat, $spent, $tbal);
		mysqli_stmt_execute($st);
		$flag = 1;
	}
}

if($flag == 1){
	echo "<script>
                alert('Expense added.');
                window.location='../expense.php';
                </script>";
}
else{
	 echo "<script>
                alert('Error');
                window.location='../expense.php';
                </script>";
}

?>