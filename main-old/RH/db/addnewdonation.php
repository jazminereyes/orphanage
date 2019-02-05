<?php
	require('../dbconnect.php');

	$name = $_POST['iname'];
	$count = $_POST['count'];
	$unit = $_POST['unit'];
	$crit = $_POST['crit'];
	$type = $_POST['type'];
    $anon = $_POST['anon'];
    $donor = $_POST['donor'];
    $date = date("Y-m-d");

if($type == 'S'){
	$sql = "INSERT INTO a_asset (itemName, itemCount, unit, criticalAmount, assetType) VALUES (?, ?, ?, ?, ?)";

	$stmt = mysqli_stmt_init($con);

	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "error";
	}
	else{
		mysqli_stmt_bind_param($stmt, "sisis", $name, $count, $unit, $crit, $type);
        mysqli_stmt_execute($stmt);
        $aid = mysqli_insert_id($con);
        
        if ($anon == "Anonymous")
        {
            $sql2 = "INSERT INTO a_donation(assetID, name, unit, donationDate, quantity) VALUES (?, ?, ?, '$date', ?)";
            $state = mysqli_stmt_init($con);

            if(!mysqli_stmt_prepare($state, $sql2)){
                echo "error";
            }
            else{
                mysqli_stmt_bind_param($state, "issi", $aid, $anon, $unit, $count);
                mysqli_stmt_execute($state);
            }
        }

        else
        {
            $sql3 = "INSERT INTO a_donation(assetID, name, unit, donationDate, quantity) VALUES (?, ?, ?, '$date', ?)";
            $statement = mysqli_stmt_init($con);

            if(!mysqli_stmt_prepare($statement, $sql3)){
                echo "error";
            }
            else{
                mysqli_stmt_bind_param($statement, "issi", $aid, $donor, $unit, $count);
                mysqli_stmt_execute($statement);
            }
        }

		echo "<script>
			alert('Donation added successfully.');
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