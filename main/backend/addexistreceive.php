<?php
    require ('../../connection.php');

    $refno = $_POST['refno'];
    $sno = $_POST['item'];
    $daterec = $_POST['daterec'];
    $qtyrec = $_POST['qtyreceive'];

    $query = "INSERT INTO a_receive(referenceNo, stockNo, dateReceived, qtyReceived) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stmt, "iisi", $refno, $sno, $daterec, $qtyrec);
        mysqli_stmt_execute($stmt);
    }

    $query2 = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = ?";
    $st = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st, $query2)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st, "i", $sno);
        mysqli_stmt_execute($st);
        $res = mysqli_stmt_get_result($st);
        $row = mysqli_fetch_row($res);
    }

    // $res = mysqli_query($con, $query2);
    // $row = mysqli_fetch_row($res);
    
    $reference = "R-".$_POST['refno'];
    
    $query3 = "SELECT COUNT(stockNo) FROM a_stockcard WHERE stockNo = ?";
    $st2 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st2, $query3)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st2, "i", $sno);
        mysqli_stmt_execute($st2);
        $result = mysqli_stmt_get_result($st2);
        $rows = mysqli_fetch_row($result);
    }

    // $result = mysqli_query($con, $query3);
    // $rows = mysqli_fetch_row($result);

    $count = $rows[0]+1;
    // echo $count;

    $balance = $row[0] + $qtyrec;
    // echo $balance;

    $query4 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('$count', '$reference', ?, ?, 'R', ?, '$balance')";
    $st4 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st4, $query4)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st4, "isi", $sno, $daterec, $qtyrec);
        mysqli_stmt_execute($st4);
        $query5 = "UPDATE a_stocks SET qtyOnHand = '$balance' WHERE stockNo = ?";
        $st5 = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($st5, $query5)){
            echo "error";
        }
        else{
            mysqli_stmt_bind_param($st5, "i", $sno);
            mysqli_stmt_execute($st5);
            echo "<script>
                 alert('Item added successfully.');
                 window.location = '../receive2.php';
                 </script>
                 ";
        }
    }



?>