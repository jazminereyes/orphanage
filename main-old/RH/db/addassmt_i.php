<?php

	require('../dbconnect.php');

	$date = date('Y-m-d');
	$aid = $_POST['iname'];
	$qty = $_POST['qty'];
	$from = $_POST['slct1'];
	$to = $_POST['slct2'];
	$rem = $_POST['rem'];
	$aby = $_POST['aby'];

	$sql = "INSERT INTO a_assessment (assetID, dateAssessed, previousAssessment, recentAssessment, quantity, remarks, assessedBy) VALUES ('$aid','$date', ?, ?, ?, ?, ?)";

	$st = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($st, $sql)){
		echo "error";
	}
	else{
		mysqli_stmt_bind_param($st, "ssiss", $from, $to, $qty, $rem, $aby);
		mysqli_stmt_execute($st);
		echo "recorded";
	}

			echo "item set from: ".$from."to: ".$to."testing:";

	$sel = "SELECT itemCount FROM a_asset WHERE assetID = '$aid'";
		$sel2 = mysqli_query($con, $sel);
		$c2 = mysqli_fetch_array($sel2);
		$a_count = $c2[0];


	if($from == "instock"){

		$q = "SELECT inStockCount FROM a_inventory WHERE assetID = '$aid'";
		$r = mysqli_query($con, $q);
		$c = mysqli_fetch_array($r);
		$in_count = $c[0];
		$ttl = $in_count - $qty;

		$db = "UPDATE a_inventory SET inStockCount = $ttl WHERE assetID = '$aid'";
		if($db2 = mysqli_query($con, $db)){
			if($to == "inuse"){

				$up = "UPDATE a_inventory SET inUseCount = $qty WHERE assetID = '$aid'";
				if($go = mysqli_query($con, $up)){

					echo "use count updated";
				}
				else{
					echo "use count not updated";
				}
			}

			elseif($to == "damaged"){

				$up = "UPDATE a_inventory SET damagedCount = $qty WHERE assetID = '$aid'";
				if($go = mysqli_query($con, $up)){
					echo "dmg count updated";

					$ttl = $a_count - $qty;
					$put = "UPDATE a_asset SET itemCount = $ttl WHERE assetID = '$aid'";
					$put2 = mysqli_query($con, $put);
					echo "item count updated";
				}
				else{
					echo "dmg count not updated";
				}

			}

			elseif($to == "lost"){

				$up = "UPDATE a_inventory SET lostCount = $qty WHERE assetID = '$aid'";
				if($go = mysqli_query($con, $up)){

					echo "lost count updated";

					$ttl = $a_count - $qty;
					$put = "UPDATE a_asset SET itemCount = $ttl WHERE assetID = '$aid'";
					$put2 = mysqli_query($con, $put);
					echo "item count updated";
				}
				else{
					echo "lost count not updated";
				}

			}
			
		}		
		
	}
	elseif($from == "inuse"){

		$q = "SELECT inUseCount FROM a_inventory WHERE assetID = '$aid'";
		$r = mysqli_query($con, $q);
		$c = mysqli_fetch_array($r);
		$in_count = $c[0];
		$ttl = $in_count - $qty;

		$db = "UPDATE a_inventory SET inUseCount = $ttl WHERE assetID = '$aid'";
		if($db2 = mysqli_query($con, $db)){
			if($to == "damaged"){

				$up = "UPDATE a_inventory SET damagedCount = $qty WHERE assetID = '$aid'";
				if($go = mysqli_query($con, $up)){
					echo "dmg count updated";

					$ttl = $a_count - $qty;
					$put = "UPDATE a_asset SET itemCount = $ttl WHERE assetID = '$aid'";
					$put2 = mysqli_query($con, $put);
					echo "item count updated";
				}
				else{
					echo "dmg count not updated";
				}

			}

			elseif($to == "lost"){

				$up = "UPDATE a_inventory SET lostCount = $qty WHERE assetID = '$aid'";
				if($go = mysqli_query($con, $up)){

					echo "lost count updated";

					$ttl = $a_count - $qty;
					$put = "UPDATE a_asset SET itemCount = $ttl WHERE assetID = '$aid'";
					$put2 = mysqli_query($con, $put);
					echo "item count updated";
				}
				else{
					echo "lost count not updated";
				}

			}

		}

	}
	elseif($from == "damaged"){
		$q = "SELECT damagedCount FROM a_inventory WHERE assetID = '$aid'";
		$r = mysqli_query($con, $q);
		$c = mysqli_fetch_array($r);
		$in_count = $c[0];

		if($to == "replace"){
			$ttl = $in_count + $qty;
			$db = "UPDATE a_inventory SET inStockCount = $ttl WHERE assetID = '$aid'";
			if($qwe = mysqli_query($con, $db)){
				echo "stock count updated";
				$ttl = $in_count - $qty;
				$db2 = "UPDATE a_inventory SET damagedCount = $ttl WHERE assetID = '$aid'";
				$x = mysqli_query($con, $db2);
				echo "damage count updated";
			}
		}
		elseif($to == "disposed"){
				$ttl = $in_count - $qty;
				$db2 = "UPDATE a_inventory SET damagedCount = $ttl WHERE assetID = '$aid'";
				$x = mysqli_query($con, $db2);
				echo "damage count updated";
		}

		

	}

?>