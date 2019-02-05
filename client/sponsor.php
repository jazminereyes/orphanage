 <?php
    if (isset($_POST["submit"])){
    require ('../connection.php');

    $submission = date("Y-m-d");
    $type = $_POST["level"].$_POST["type"];
    $password = createRandomPassword();
    $pref = $_POST["pref"];

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

    if ($_POST["level"] == "E")
    {
        $count = $_POST["scholar"];
    }

    else if ($_POST["level"] == "HS")
    {
        $count = $_POST["scholar"];
    }

    if ($type == "EM")
    {
        $amt = 1250;
    }

    else if ($type == "EY")
    {
        $amt = 12500;
    }

    else if ($type == "HSM")
    {
        $amt = 1500;
    }

    else if ($type == "HSY")
    {
        $amt = 15000;
    }

    $query = "INSERT INTO person (firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'SP')";

    if (mysqli_query($con, $query))
    {
        $person_id = mysqli_insert_id($con);
    }

    $query2 = "INSERT INTO user(personID, programType) VALUES ('$person_id', 'Sponsor')";

    if (mysqli_query($con, $query2))
    {
        $user_id = mysqli_insert_id($con);
    }

    $query3 = "INSERT INTO sponsor(personID, street, city, zip, country, birthdate, telNo, email, scholarCount, donationType, amount, submissionDate, applicationCode, applicationStatus) VALUES ('$person_id', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[country]', '$birthday', '$_POST[telNo]', '$_POST[email]', '$count', '$type', '$amt', '$submission', '$password', 'P')";
    echo $query3;

    if (mysqli_query($con, $query3))
    {
        $sponsor_id = mysqli_insert_id($con);
    }

    else{
        echo "Error";
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