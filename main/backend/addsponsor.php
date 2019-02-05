<?php
    require ('../../connection.php');

    $today = date('Y-m-d');
    $flag = 0;

    $fn = $_POST['fn'];
    $mn = $_POST['mn'];
    $ln = $_POST['ln'];

    $query = "INSERT INTO person(firstName, middleName, lastName, type) VALUES (?, ?, ?, 'SP')";
    $st = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st, $query)){
      echo "error";
    }
    else{
      mysqli_stmt_bind_param($st, "sss", $fn, $mn, $ln);
      mysqli_stmt_execute($st);
      $person_id = mysqli_insert_id($con);
      $flag += 1;
    }

    $pw = $_POST['password'];    

    $query2 = "INSERT INTO user(personID, password, programType) VALUES ('$person_id', ?, 'Sponsor')";
    $st2 = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($st2, $query2)){
      echo "error";
    }
    else{
      mysqli_stmt_bind_param($st2, "s", $pw);\
      mysqli_stmt_execute($st2);
      $user_id = mysqli_insert_id($con);
      $flag += 1;
    }

    $st = $_POST['street'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $country $_POST['country'];
    $bday = $_POST['bday'];
    $telno = $_POST['telno'];
    $email = $_POST['email'];
    $count = $_POST['scholar'];
    $dtype = $_POST['dtype'];
    $amt = $_POST['amount'];
    $sdate = $_POST['submission'];

    $query3 = "INSERT INTO sponsor(personID, street, city, zip, country, birthdate, telNo, email, scholarCount, donationType, amount, submissionDate, activeDate, applicationStatus, activeFlag) VALUES ('$person_id', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, '$today', 'A', '0')";
    $stm = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stm, $query3)){
      echo "error";
    }
    else{
      mysqli_stmt_bind_param($stm, "ssissisisis", $st, $city, $zip, $country, $bday, $telno, $email, $count, $dtype, $amt, $sdate)
      mysqli_stmt_execute($stm);
      $sponsor_id = mysqli_insert_id($con);
      $flag += 1;
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

      $flag += 1;
    }

    if($flag == 4){
      echo "<script>
              alert('Sponsor added successfully.');
              window.location = '../sponsors.php?sponsorid=".$sponsor_id."';
              </script>
              ";
    }

?>