<?php

	require('../dbconnect.php');

	$aid = $_POST['iname'];
	$qty = $_POST['count'];

	$x = "SELECT itemCount FROM a_asset WHERE assetID = '$aid'";
	$y = mysqli_query($con, $x);
	$z = mysqli_fetch_array($y);
	$c = $z[0];

	$ttl = $c + $qty;

	$que = "UPDATE a_asset SET itemCount = ? WHERE assetID = '$aid'";

	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $que)){
		echo "error";
	}
	else{
		mysqli_stmt_bind_param($st, "i", $ttl);
		mysqli_stmt_execute($st);
		$flag = 1;

	}

	if($flag == 1){
	
		$qry = "SELECT inStockCount FROM a_inventory WHERE assetID = '$aid'";
		$q = mysqli_query($con, $qry);
		$get = mysqli_fetch_array($q);
		$count = $get[0];
	
		$total = $count + $qty;
	
		$sql = "UPDATE a_inventory SET inStockCount = ? WHERE assetID = '$aid'";
	
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "error";
		}
		else{
			mysqli_stmt_bind_param($stmt, "i", $total);
			mysqli_stmt_execute($stmt);
			echo "<script>
			alert('Item count updated.');
			window.location='../A_List.php';
			</script>
			";
	
		}
	}
	else{
		echo "updating error";
	}

?>