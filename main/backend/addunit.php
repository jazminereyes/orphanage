<?php
    require ('../../connection.php');

    $unit = $_POST['unit'];

    $query = "INSERT INTO a_unit(unitName) VALUES (?)";
    $st = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st, $query)){
        echo "error";
    }
    else{
    	mysqli_stmt_bind_param($st, "s", $unit);
    	mysqli_stmt_execute($st);
    	echo "<script>
                 alert('Unit added successfully.');
                 window.location = '../uniy.php';
                 </script>
                 ";
    }

    // if (mysqli_query($con, $query))
    // {
    //     header ('Location: ../unit.php');
    // }
?>