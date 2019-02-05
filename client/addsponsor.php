<?php
    require ('../connection.php');

    $submission = date("Y-m-d");
    $type = $_POST["level"].$_POST["type"];
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

    if ($_POST["level"] == "E")
    {
        $count = $_POST["count"];
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

    $query = "INSERT INTO person (firstName, middleName, lastName, type) VALUES ('$_POST[fn]', '$_POST[mn]', '$_POST[ln]', 'U')";

    if (mysqli_query($con, $query))
    {
        $person_id = mysqli_insert_id($con);
    }

    $query2 = "INSERT INTO user(personID, programType) VALUES ('$person_id', 'Sponsor')";

    if (mysqli_query($con, $query2))
    {
        $user_id = mysqli_insert_id($con);
    }

    $query3 = "INSERT INTO sponsor(userID, street, city, zip, country, birthdate, telNo, email, scholarCount, donationType, amount, submissionDate, applicationCode, applicationStatus) VALUES ('$user_id', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[country]', '$birthday', '$_POST[telNo]', '$_POST[email]', '$count', '$type', '$amt', '$submission', '$password', 'P')";

    if (mysqli_query($con, $query3))
    {
        echo "<script>";
        echo "alert('Application is submitted. Please remember this code for viewing. Referral Code:".$password."');";
        echo "window.location.href='index.php'";
        echo "</script>";
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