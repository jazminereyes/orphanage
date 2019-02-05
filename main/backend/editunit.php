<?php
    require ('../../connection.php');

    $uid = $_POST['unitid'];
    $uname = $_POST['uname'];

    $query = "UPDATE a_unit SET unitName = ? WHERE unitID = ?";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "error";
    }
    else{
    	mysqli_stmt_bind_param($stmt, "si", $uname, $uid);
    	mysqli_stmt_execute($stmt);
    	echo "<script>
                 alert('Unit updated successfully.');
                 window.location = '../uniy.php';
                 </script>
                 ";
    }
?>