<?php
    require ('../../connection.php');

    $query = "INSERT INTO a_unit(unitName) VALUES ('$_POST[unit]')";

    if (mysqli_query($con, $query))
    {
        header ('Location: ../unit.php');
    }
?>