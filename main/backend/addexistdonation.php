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

    $ddate = $_POST['ddate'];

    $query = "INSERT INTO a_donation(donor, donationDate) VALUES (?, ?)";
    $st = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st, $query)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st, "ss", $donor, $ddate);
        mysqli_stmt_execute($st);
        $last_id = mysqli_insert_id($con);
    }


    $value = str_replace('-', '', $_POST['ddate']);
    $sno = $_POST['item'];
    $qty = $_POST['qtydonate']; 

    $query2 = "INSERT INTO a_donationdetails(donationID, stockNo, qtyDonated) VALUES ('$last_id', ?, ?)";
    $st2 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st2, $query2)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st2, "ii", $sno, $qty);
        mysqli_stmt_execute($st2);
    }

    $reference = "D-".$last_id."-".$value;

    $query3 = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = ?";
    $stm = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stm, $query3)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stm, "i", $sno);
        mysqli_stmt_execute($stm);
        $res = mysqli_stmt_get_result($stm);
        $row = mysqli_fetch_row($res);
    }

    // $res = mysqli_query($con, $query3);
    // $row = mysqli_fetch_row($res);

    $query4 = "SELECT COUNT(stockNo) FROM a_stockcard WHERE stockNo = ?";
    $stm2 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stm2, $query4)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stm2, "i", $sno);
        mysqli_stmt_execute($stm2);
        $result = mysqli_stmt_get_result($stm2);
        $rows = mysqli_fetch_row($result);
    }

    // $result = mysqli_query($con, $query4);
    // $rows = mysqli_fetch_row($result);

    $count = $rows[0]+1;

    $balance = $row[0] + $_POST['qtydonate'];

    $query5 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('$count', '$reference', ?, ?, 'R', ?, '$balance')";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $query5)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stmt, "isi", $sno, $ddate, $qty);
        mysqli_stmt_execute($stmt);
        $query6 = "UPDATE a_stocks SET qtyOnHand = '$balance' WHERE stockNo = ?";
        $stm5 = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stm5, $query6)){
            echo "error";
        }
        else{
            mysqli_stmt_bind_param($stm5, "i", $sno);
            mysqli_stmt_execute($con);
            echo "<script>
                 alert('Item added successfully.');
                 window.location = '../receive2.php';
                 </script>
                 ";
        }
    }


?>