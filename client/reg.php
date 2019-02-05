<?php
    if (isset($_POST["submit"])){
    require ('../connection.php');

    $submission = date("Y-m-d");
    $password = createRandomPassword();

    if ($_POST["year"]==" "){
        $year = "0000";
    } else{
        $year = $_POST["year"];
    }

    if ($_POST["month"]=""){
        $month = "00";
    } else{
        $month = $_POST["month"];
    }

    if ($_POST["day"]){
        $day = "00";
    } else{
        $day = $_POST["day"];
    }

    $birthday = $year."-".$month."-".$day;

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

    $query2 = "INSERT INTO user(personID, programType) VALUES ('$person_id', 'Social Worker')";

    if (mysqli_query($con, $query2))
    {
        $user_id = mysqli_insert_id($con);
    }

    $query3 = "INSERT INTO socialworker(personID, email, address, contactNo, endorserAgency, swIDCard, verifiedFlag) VALUES ('$person_id', '$_POST[email]', '$_POST[address]', '$_POST[telNo]', '$_POST[endorser]', '$swidcard', '0')";

    if (mysqli_query($con, $query3))
    {
      echo $swidcard;
    }
  }

    function createRandomPassword() { 

        $chars = "abcdefghijkmnopqrstuvwxyz0123456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
    
        while ($i <= 5) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
    
        return $pass; 
    
    } 
?>