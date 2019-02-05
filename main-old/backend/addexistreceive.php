<?php
    require ('../../connection.php');

    $query = "INSERT INTO a_receive(referenceNo, stockNo, dateReceived, qtyReceived) VALUES ('$_POST[refno]', '$_POST[item]', '$_POST[daterec]', '$_POST[qtyreceive]')";
    mysqli_query($con, $query);

    $query2 = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = '$_POST[item]'";
    $res = mysqli_query($con, $query2);
    $row = mysqli_fetch_row($res);
    
    $reference = "R-".$_POST['refno'];
    
    $query3 = "SELECT COUNT(stockNo) FROM a_stockcard WHERE stockNo = '$_POST[item]'";
    $result = mysqli_query($con, $query3);
    $rows = mysqli_fetch_row($result);

    $count = $rows[0]+1;
    echo $count;

    $balance = $row[0] + $_POST['qtyreceive'];
    echo $balance;

    $query4 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('$count', '$reference', '$_POST[item]', '$_POST[daterec]', 'R', '$_POST[qtyreceive]', '$balance')";
    echo $query4;
    if (mysqli_query($con, $query4))
    {
        $query5 = "UPDATE a_stocks SET qtyOnHand = '$balance' WHERE stockNo = '$_POST[item]'";
        if (mysqli_query($con, $query5))
        {
            header ('Location: ../receive.php');
        }
    }


?>