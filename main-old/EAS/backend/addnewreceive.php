<?php
    require ('dbconnect.php');

    $query = "INSERT INTO a_stocks(unitID, itemName, qtyOnHand, criticalAmount, stockType) VALUES ('$_POST[unit]', '$_POST[itemName]', '$_POST[qty]', '$_POST[critical]', '$_POST[stocktype]')";
    if (mysqli_query($con, $query))
    {
        $last_id = mysqli_insert_id($con);
        echo $query;
    }

   $query2 = "INSERT INTO a_receive(referenceNo, stockNo, dateReceived, qtyReceived) VALUES ('$_POST[reference]', $last_id, '$_POST[dreceive]', '$_POST[qty]')";
    mysqli_query($con, $query2);

    $reference = "R-".$_POST['reference'];

    $query3 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES (1, '$reference', '$last_id', '$_POST[dreceive]', 'R', '$_POST[qty]', '$_POST[qty]')";
    if (mysqli_query($con, $query3))
    {
        header('Location: ../receive.php');
    }
?>