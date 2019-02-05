<?php
	require('../dbconnect.php');

	$name = $_POST['iname'];
	$count = $_POST['count'];
	$unit = $_POST['unit'];
	$crit = $_POST['crit'];
	$type = $_POST['type'];


if($type == 'S'){
	$sql = "INSERT INTO a_asset (itemName, itemCount, unit, criticalAmount, assetType) VALUES (?, ?, ?, ?, ?)";

	$stmt = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "error";
	}
	else{
		mysqli_stmt_bind_param($stmt, "sisis", $name, $count, $unit, $crit, $type);
		mysqli_stmt_execute($stmt);
		echo "<script>
			alert('Item added successfully.');
			window.location='../A_List.php';
		</script>";
	}
}
else{
	$db = "INSERT INTO a_asset (itemName, itemCount, unit, criticalAmount, assetType) VALUES (?, ?, ?, ?, ?)";

	$stmt2 = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($stmt2, $db)){
		echo "error";
	}
	else{
		mysqli_stmt_bind_param($stmt2, "sisis", $name, $count, $unit, $crit, $type);
		mysqli_stmt_execute($stmt2);
		$aid = mysqli_insert_id($con);

		$in = "INSERT INTO a_inventory (assetID, damagedCount, inStockCount, lostCount, inUseCount) VALUES ('$aid', '0', ?, '0', '0')";

		$st = mysqli_stmt_init($con);

		if(!mysqli_stmt_prepare($st, $in)){
			echo "error";
		}
		else{
			mysqli_stmt_bind_param($st, "i", $count);
			mysqli_stmt_execute($st);
			echo "<script>
			alert('Item added successfully.');
			window.location='../A_List.php';
		</script>";

		}
	}
}

	mysqli_close($con);
?>