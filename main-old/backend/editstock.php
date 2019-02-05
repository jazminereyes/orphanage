<?php
    require ('../../connection.php');

    $query = "UPDATE a_stocks SET itemName = '$_POST[item]', criticalAmount = '$_POST[critical]', stockType = '$_POST[stocktype]' WHERE stockNo = '$_POST[stockno]'";

    if (mysqli_query($con, $query))
    {
        header ('Location: ../stocks.php');
    }
?>