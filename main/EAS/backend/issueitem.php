<?php
    require ('../../connection.php');

    $query = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = '$_POST[item]'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);

    if ($_POST['qty']>$row[0])
    {
        echo "<script>";
        echo "alert('Quantity should not be greater than quantity on hand.')";
        echo "window.location.href = '../adjustment.php'";
        echo "</script>";
    }

    else
    {
        $query2 = "INSERT INTO a_adjustment(stockNo, remarks, qtyAdjusted) VALUES ('$_POST[item]', '$_POST[remarks]', '$_POST[qty]')";
        if (mysqli_query($con, $query2))
        {
            $last_id = mysqli_insert_id($con);
        }
    
        $today = date('Y-m-d');
        $value = str_replace('-', '', $today);

        $reference = "A-".$last_id."-".$value;
    
        $query3 = "SELECT COUNT(stockNo) FROM a_stockcard WHERE stockNo = '$_POST[item]'";
        $result = mysqli_query($con, $query3);
        $rows = mysqli_fetch_row($result);

        $count = $rows[0]+1;
        echo $count;

        $balance = $row[0] - $_POST['qty'];
        echo $balance;

        $query4 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('$count', '$reference', '$_POST[item]', '$today', 'I', '$_POST[qty]', '$balance')";
        if (mysqli_query($con, $query4))
        {
            $query5 = "UPDATE a_stocks SET qtyOnHand = '$balance' WHERE stockNo = '$_POST[item]'";
            if (mysqli_query($con, $query5))
            {
                header ('Location: ../adjustment.php');
            }
        }
    }
?>