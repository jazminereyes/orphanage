<?php
    require ('../dbconnect.php');

    $orphan_id = $_POST['oid'];

    $adoptdate = $_POST['year']."-".$_POST['month']."-".$_POST['date'];

    $type = $_POST['adoptiontype'];
    $name = $_POST['adoptivename'];
    $email = $_POST['adoptiveemail'];
    $contact = $_POST['adoptivecontact']
    $addr = $_POST['adoptiveaddress'];

    $query = "INSERT INTO o_adoptiondetails(orphanID, type, adoptionDate, adopterName, adopterEmail, adopterContact, adopterAddress) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $query)){
    	echo "error";
    }
    else{
    	mysqli_stmt_bind_param($stmt, "issssis", $orphan_id, $type, $adoptdate, $name, $email, $contact, $addr);
    	mysqli_stmt_execute($stmt);
    	echo "<script>
    	       alert('Adoption details added.');
    	       window.location = '../RHvieworphan.php?orphanid=".$orphan_id."';
    	       </script>";
    }

?>