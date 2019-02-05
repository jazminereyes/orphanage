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

    $ddate = $_POST['donatedate'];

    $query = "INSERT INTO a_donation(donor, donationDate) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($con);
    $st = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st, $query)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st, "ss", $donor, $ddate);
        mysqli_stmt_execute($st);
        $last_id = mysqli_insert_id($con);
    }

    $value = str_replace('-', '', $_POST['donatedate']);

    $unit = $_POST['unit'];
    $iname = $_POST['itemname'];
    $qty = $_POST['qty'];
    $crit = $_POST['critical'];
    $stype = $_POST['stocktype'];

    $query2 = "INSERT INTO a_stocks(unitID, itemName, qtyOnHand, criticalAmount, stockType) VALUES (?, ?, ?, ?, ?)";
    $st2 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st2, $query2)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st2, "isiis", $unit, $iname, $qty, $crit, $stype);
        mysqli_stmt_execute($st2);
        $stock_id = mysqli_insert_id($con);
    }

    $query3 = "INSERT INTO a_donationdetails(donationID, stockNo, qtyDonated) VALUES ('$last_id', '$stock_id', ?)";
    $stm = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stm, $query3)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stm, "i", $qty);
        mysqli_stmt_execute($stm);
    }

    $reference = "D-".$last_id."-".$value;

    $query4 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('1', '$reference', '$stock_id', ?, 'R', ?, ?)";
    $stm2 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stm2, $query4)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stm2, "sii", $ddate, $qty, $qty);
        mysqli_stmt_execute($stm2);
        echo "<script>
              alert('Item added successfully.');
              window.location = '../receive2.php';
              </script>
              ";
    }
    // if (mysqli_query($con, $query4))
    // {
    //     header('Location: ../donation.php');
    // }

?>