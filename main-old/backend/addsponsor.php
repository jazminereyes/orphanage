<?php
    require ('../../connection.php');

    $today = date('Y-m-d');

    $query = "INSERT INTO person(firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'SP')";
    if (mysqli_query($con, $query))
    {
        $person_id = mysqli_insert_id($con);
    }

    $query2 = "INSERT INTO user(personID, password, programType) VALUES ('$person_id', '$_POST[password]', 'Sponsor')";
    if (mysqli_query($con, $query2))
    {
        $user_id = mysqli_insert_id($con);
    }

    $query3 = "INSERT INTO sponsor(personID, street, city, zip, country, birthdate, telNo, email, scholarCount, donationType, amount, submissionDate, activeDate, applicationStatus, activeFlag) VALUES ('$person_id', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[country]', '$_POST[bday]', '$_POST[telno]', '$_POST[email]', '$_POST[scholar]', '$_POST[dtype]', '$_POST[amount]', '$_POST[submission]', '$today', 'A', '0')";
    if (mysqli_query($con, $query3))
    {
        $sponsor_id = mysqli_insert_id($con);
    }

    if ($pref=="Yes")
    {
      $query4 = "INSERT INTO s_preference(sponsorID) VALUES ('$sponsor_id')";
      mysqli_query($con, $query4);

      if($_POST["first"]==1)
      {
        $gender = $_POST["gender"];
        $query5 = "UPDATE s_preference SET gender = '$gender' WHERE sponsorID = '$sponsor_id'";
        mysqli_query($con, $query5);
      }

      if($_POST["second"]==1)
      {
        $religion = $_POST["religion"];
        $query5 = "UPDATE s_preference SET religion = '$religion' WHERE sponsorID = '$sponsor_id'";
        mysqli_query($con, $query5);
      }

      if($_POST["third"]==1)
      {
        $gwa = $_POST["gwa"];
        $query5 = "UPDATE s_preference SET averageGender = '$averageGender' WHERE sponsorID = '$sponsor_id'";
        mysqli_query($con, $query5);
      }
    }

?>