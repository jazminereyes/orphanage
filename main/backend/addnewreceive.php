<?php
    require('../../connection.php');

    $uid = $_POST['unit'];
    $iname = $_POST['iname'];
    $qty = $_POST['qty'];
    $crit = $_POST['critical'];
    $stype = $_POST['stocktype'];


    $query = "INSERT INTO a_stocks(unitID, itemName, qtyOnHand, criticalAmount, stockType) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stmt, "isiis", $uid, $iname, $qty, $crit, $stype);
        mysqli_stmt_execute($stmt);
        $last_id = mysqli_insert_id($con);
    }

    $refno = $_POST['reference'];
    $dateref = $_POST['dreceive'];

    $query2 = "INSERT INTO a_receive(referenceNo, stockNo, dateReceived, qtyReceived) VALUES (?, $last_id, ?, ?)";
    $stm = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stm, $query2)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stm, "isi", $refno, $dateref, $qty);
        mysqli_stmt_execute($stm);
    }

    $reference = "R-".$_POST['reference'];

    $query3 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES (1, ?, '$last_id', ?, 'R', ?, ?)";
    $st = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st, $query3)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st, "ssss", $reference, $dateref, $qty, $qty);
        mysqli_stmt_execute($st);
        echo "<script>
              alert('Item added successfully.');
              window.location = '../receive2.php';
              </script>
              ";
    }

?>