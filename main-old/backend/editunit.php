<?php
    require ('../../connection.php');

    $query = "UPDATE a_unit SET unitName ='$_POST[unit]' WHERE unitID = '$_POST[unitid]'";

    if (mysqli_query($con, $query))
    {
        header ('Location: ../unit.php');
    }
?>