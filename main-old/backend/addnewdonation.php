<?php
    require('../../connection.php');

    if ($_POST['anon']=='Anonymous')
    {
        $donor = "Anonymous";
    }

    else 
    {
        $donor = $_POST['donor'];
    }

    $query = "INSERT INTO a_donation(donor, donationDate) VALUES ('$donor', '$_POST[donatedate]')";
    if (mysqli_query($con, $query))
    {
        $last_id = mysqli_insert_id($con);
    }

    $value = str_replace('-', '', $_POST['donatedate']);

    $query2 = "INSERT INTO a_stocks(unitID, itemName, qtyOnHand, criticalAmount, stockType) VALUES ('$_POST[unit]', '$_POST[itemname]', '$_POST[qty]', '$_POST[critical]', '$_POST[stocktype]')";
    if (mysqli_query($con, $query2))
    {
        $stock_id = mysqli_insert_id($con);
    }

    $query3 = "INSERT INTO a_donationdetails(donationID, stockNo, qtyDonated) VALUES ('$last_id', '$stock_id', '$_POST[qty]')";
    mysqli_query($con, $query3);

    $reference = "D-".$last_id."-".$value;

    $query4 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('1', '$reference', '$stock_id', '$_POST[donatedate]', 'R', '$_POST[qty]', '$_POST[qty]')";
    if (mysqli_query($con, $query4))
    {
        header('Location: ../donation.php');
    }

?>