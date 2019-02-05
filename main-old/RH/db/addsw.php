<?php
    require ('../dbconnect.php');

    $file = $_FILES['social'];
    $name = $file['name'];

    $path = "referrals/".basename($name);
    if (move_uploaded_file($file['tmp_name'], $path)) {
      echo "Succeed.";
      $swidcard = $path;
    } else {
      echo "Error.";
    }

    $query = "INSERT INTO person (firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'SW')";

    if (mysqli_query($con, $query))
    {
        $person_id = mysqli_insert_id($con);
    }

    $query2 = "INSERT INTO user(personID, password, programType) VALUES ('$person_id', '$_POST[password]', 'Social Worker')";

    if (mysqli_query($con, $query2))
    {
        $user_id = mysqli_insert_id($con);
    }

    $query3 = "INSERT INTO socialworker(personID, email, birthdate, address, contactNo, endorserAgency, swIDCard, dateApplied, verifiedFlag) VALUES ('$person_id', '$_POST[email]', $_POST[birthdate], '$_POST[address]', '$_POST[telNo]', '$_POST[endorser]', '$swidcard', '$_POST[dapp]', '1')";

    if (mysqli_query($con, $query3))
    {
      header ('Location: ../socialworker.php');
    }
?>