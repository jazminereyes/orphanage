<?php
    require ('../../../connection.php');

    $file = $_FILES['social'];
    $name = $file['name'];

    $path = "referrals/".basename($name);
    if (move_uploaded_file($file['tmp_name'], $path)) {
      echo "Succeed.";
      $swidcard = $path;
    } else {
      echo "Error.";
    }

    $fn = $_POST['fn'];
    $mn = $_POST['mn'];
    $ln = $_POST['ln'];

    $query = "INSERT INTO person (firstName, middleName, lastName, type) VALUES (?, ?, ?, 'SW')";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stmt, "sss", $fn, $mn, $ln);
        mysqli_stmt_execute($stmt);
        $person_id = mysqli_insert_id($con);
    }

    $pw = $_POST['password'];

    $query2 = "INSERT INTO user(personID, password, programType) VALUES ('$person_id', ?, 'Social Worker')";
    $stmt2 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt2, $query2)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($stmt2, "s", $pw);
        mysqli_stmt_execute($stmt2);
        $user_id = mysqli_insert_id($con);
    }

    $email = $_POST['email'];
    $bday = $_POST['birthdate'];
    $addr = $_POST['address'];
    $telno = $_POST['telNo'];
    $endorser = $_POST['endorser'];
    $date = $_POST['dapp'];

    $query3 = "INSERT INTO socialworker(personID, email, birthdate, address, contactNo, endorserAgency, swIDCard, dateApplied, verifiedFlag, activeFlag) VALUES ('$person_id', ?, ?, ?, ?, ?, '$swidcard', ?, '1', '1')";
    $st = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st, $query3)){
        echo "error";
    }
    else{
        mysqli_stmt_bind_param($st, "sssiss", $email, $bday, $addr, $telno, $endorser, $date);
        mysqli_stmt_execute($st);
        $swid = mysqli_insert_id($con);
        echo "<script>
               alert('Social worker added.');
               window.location='../socialworker.php?swid=".$swid."';
               </script>
               ";
    }
?>