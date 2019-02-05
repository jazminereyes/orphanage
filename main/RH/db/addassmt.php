<?php
	require ('../dbconnect.php');

	$date = date('Y-m-d');
	$aid = $_POST['iname'];
	$qty = $_POST['qty'];
	$relby = $_POST['rby'];
	$asset = $_POST['asset'];

	foreach ($_POST['rto'] as $record) {
		$sql = "INSERT INTO a_assetrelease (assetID, dateReleased, quantity, personID, releasedBy) VALUES ('$aid', '$date', ?, ?, ?)";

		$s = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($s, $sql)){
			echo "error";
		}
		else{
			$pid = $record;
			echo $pid;
			mysqli_stmt_bind_param($s, "iis", $qty, $pid, $relby);
			mysqli_stmt_execute($s);
			echo "recorded";
		}

	}

	if ($asset = "stock")
	{
		$query = "SELECT inStockCount FROM a_inventory WHERE assetID = '$aid'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result); 
		$assetct = $row[0];
		$total = $assetct - $qty;

		$query3 = "UPDATE a_inventory SET inStockCount = ? WHERE assetID = '$aid'";
		$st = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($st, $query3))
		{
			echo "Error";
		}
		else
		{
			mysqli_stmt_bind_param($st, "i", $total);
			mysqli_stmt_execute($st);
			echo "done";
		}

	}

	else if ($asset = "use")
	{
		$query2 = "SELECT inUseCount FROM a_inventory WHERE assetID = '$aid'";
		$res = mysqli_query($con, $query2);
		$rec = mysqli_fetch_array($rec); 
		$assetct = $rec[0];
		$total = $assetct - $qty;

		$query3 = "UPDATE a_inventory SET inUseCount = ? WHERE assetID = '$aid'";
		$st = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($st, $query3))
		{
			echo "Error";
		}
		else
		{
			mysqli_stmt_bind_param($st, "i", $total);
			mysqli_stmt_execute($st);
			echo "done";
		}
	}

	$asd = "SELECT itemCount FROM a_asset WHERE assetID = '$aid'";
	$chk = mysqli_query($con, $asd);
	$in = mysqli_fetch_array($chk);

	$count = $in[0];
	$ttl = $count - $qty;

	$up = "UPDATE a_asset SET itemCount = ? WHERE assetID = '$aid'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $up)){
		echo "error";
	}
	else{
		mysqli_stmt_bind_param($stmt, "i", $ttl);
		mysqli_stmt_execute($stmt);
		echo "recorded pt2";
	}
?>