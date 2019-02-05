<?php
    require ('dbconnect.php');

    $check = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = '$_POST[item]'";
    $a = mysqli_query($con, $check);
    $b = mysqli_fetch_row($a);

    if ($_POST['qty']>$b[0])
    {
        echo "<script>";
        echo "alert('Issued quantity cannot be greater than quantity on hand.')";
        echo "window.location.href = 'release.php'";
        echo "</script>";
    }

    else
    {
        foreach ($_POST['rto'] as $record)
        {
            $sql = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = '$_POST[item]'";
            $t = mysqli_query($con, $sql);
            $u = mysqli_fetch_row($t);

            if ($_POST['qty']>$u[0])
            {
                echo "<script>";
                echo "alert('Issued quantity cannot be greater than quantity on hand.')";
                echo "window.location.href = 'release.php'";
                echo "</script>";
            }

            else
            {
                $query = "INSERT INTO a_release(personID, stockNo, qtyIssued, dateReleased, purpose, releasedBy) VALUES ('$record', '$_POST[item]', '$_POST[qty]', '$_POST[daterelease]', '$_POST[purpose]', '$_POST[releaseby]')";
                if (mysqli_query($con, $query))
                {
                    $last_id = mysqli_insert_id($con);

                    $query2 = "SELECT COUNT(stockNo) FROM a_stockcard WHERE stockNo = '$_POST[item]'";
                    $res = mysqli_query($con, $query2);
                    $row = mysqli_fetch_row($res);

                    $count = $row[0] + 1;

                    $query3 = "SELECT qtyOnHand FROM a_stocks WHERE stockNo = '$_POST[item]'";
                    $result = mysqli_query($con, $query3);
                    $rows = mysqli_fetch_row($result);

                    echo $rows[0];

                    $balance = $rows[0] - $_POST['qty'];

                    $value = str_replace('-', '', $_POST['daterelease']);
                    $reference = "R-".$last_id."-".$value;

                    $query4 = "INSERT INTO a_stockcard(stockcardID, referenceNo, stockNo, date, action, qty, balanceQty) VALUES ('$count', '$reference', '$_POST[item]', '$_POST[daterelease]', 'I', '$_POST[qty]', '$balance')";
                    if (mysqli_query($con, $query4))
                    {
                        $query5 = "UPDATE a_stocks SET qtyOnHand = '$balance' WHERE stockNo = '$_POST[item]'";
                        mysqli_query($con, $query5);
                    }
                }
            }
            
        }

      header ('Location: ../release.php');
    }

    

    
?>