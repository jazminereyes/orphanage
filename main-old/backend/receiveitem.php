<?php
    require ('../../connection.php');

    $query = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = '$_POST[itemname]'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);

    if ($_POST['qtyadjust']>$row[0])
    {
        echo "<script>";
        echo "alert('Quantity should not be greater than quantity on hand.')";
        echo "window.location.href = '../adjustment.php'";
        echo "</script>";
    }

    else
    {
        $query2 = "INSERT INTO a_adjustment(stockNo, remarks, qtyAdjusted) VALUES ('$_POST[itemname]', '$_POST[remark]', '$_POST[qtyadjust]')";
        if (mysqli_query($con, $query2))
        {
            $last_id = mysqli_insert_id($con);
        }
    
        $today = date('Y-m-d');
        $value = str_replace('-', '', $today);

        $reference = "A-".$last_id."-".$today;
    
        $query3 = "SELECT COUNT(stockNo) FROM a_stockcard WHERE stockNo = '$_POST[itemname]'";
        $result = mysqli_query($con, $query3);
        $rows = mysqli_fetch_row($result);

        $count = $rows[0]+1;
        echo $count;

        $balance = $row[0] + $_POST['qtyadjust'];
        echo $balance;

        $query4 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('$count', '$reference', '$_POST[itemname]', '$today', 'R', '$_POST[qtyadjust]', '$balance')";
        if (mysqli_query($con, $query4))
        {
            $query5 = "UPDATE a_stocks SET qtyOnHand = '$balance' WHERE stockNo = '$_POST[itemname]'";
            if (mysqli_query($con, $query5))
            {
                header ('Location: ../adjustment.php');
            }
        }
    }
?>