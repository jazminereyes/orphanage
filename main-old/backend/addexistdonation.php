<?php
    require ('../../connection.php');

    if ($_POST['anonymous']=='Anonymous')
    {
        $donor = "Anonymous";
    }

    else 
    {
        $donor = $_POST['donorname'];
    }

    $query = "INSERT INTO a_donation(donor, donationDate) VALUES ('$donor', '$_POST[ddate]')";
    if (mysqli_query($con, $query))
    {
        $last_id = mysqli_insert_id($con);
    }

    $value = str_replace('-', '', $_POST['ddate']);

    $query2 = "INSERT INTO a_donationdetails(donationID, stockNo, qtyDonated) VALUES ('$last_id', '$_POST[item]', '$_POST[qtydonate]')";
    mysqli_query($con, $query2);

    $reference = "D-".$last_id."-".$value;

    $query3 = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = '$_POST[item]'";
    $res = mysqli_query($con, $query3);
    $row = mysqli_fetch_row($res);

    $query4 = "SELECT COUNT(stockNo) FROM a_stockcard WHERE stockNo = '$_POST[item]'";
    $result = mysqli_query($con, $query4);
    $rows = mysqli_fetch_row($result);

    $count = $rows[0]+1;
    echo $count;

    $balance = $row[0] + $_POST['qtydonate'];
    echo $balance;

    $query5 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('$count', '$reference', '$_POST[item]', '$_POST[ddate]', 'R', '$_POST[qtydonate]', '$balance')";
    if (mysqli_query($con, $query5))
    {
        $query6 = "UPDATE a_stocks SET qtyOnHand = '$balance' WHERE stockNo = '$_POST[item]'";
        if (mysqli_query($con, $query6))
        {
            header ('Location: ../donation.php');
        }
    }

?>