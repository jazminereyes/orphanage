<?php

        require ('../connection.php');

        $password = createRandomPassword();

        $height = $_POST['height'];
        $weight = $_POST['weight'];

        $bmi = $weight/($height/100*$height/100);

        if ($bmi<18.5){
            $weightstatus = "Underweight";
        } elseif ($bmi>=18.5&&$bmi<=25){
            $weighstatus = "Normal Weight";
        } elseif ($bmi>=25&&$bmi<=30){
            $weighstatus = "Obese";
        } elseif ($bmi>30){
            $weightstatus = "Overweight";
        }

        if ($_POST["byear"]==" "){
            $byear = "0000";
        } else{
            $byear = $_POST["byear"];
        }
    
        if ($_POST["bmonth"]=""){
            $bmonth = "00";
        } else{
            $bmonth = $_POST["bmonth"];
        }
    
        if ($_POST["bdate"]){
            $bday = "00";
        } else{
            $bday = $_POST["bdate"];
        }

        $birthday = $byear."-".$bmonth."-".$bday;

        if ($_POST["hyear"]==" "){
            $hyear = "0000";
        } else{
            $hyear = $_POST["hyear"];
        }
    
        if ($_POST["hmonth"]=""){
            $hmonth = "00";
        } else{
            $hmonth = $_POST["hmonth"];
        }
    
        if ($_POST["hdate"]){
            $hday = "00";
        } else{
            $hday = $_POST["hdate"];
        }

        $lastdhp = $hyear."-".$hmonth."-".$hday;

        if ($_POST["myear"]==" "){
            $myear = "0000";
        } else{
            $myear = $_POST["myear"];
        }
    
        if ($_POST["mmonth"]=""){
            $mmonth = "00";
        } else{
            $mmonth = $_POST["mmonth"];
        }
    
        if ($_POST["mdate"]){
            $mday = "00";
        } else{
            $mday = $_POST["mdate"];
        }

        $mbirthdate = $_POST["mbdyear"]."-".$_POST["mbdmonth"]."-".$_POST["mbddate"];

        $mother = $myear."-".$mmonth."-".$mday;

        if ($_POST["fyear"]==" "){
            $fyear = "0000";
        } else{
            $fyear = $_POST["fyear"];
        }
    
        if ($_POST["fmonth"]=""){
            $fmonth = "00";
        } else{
            $fmonth = $_POST["fmonth"];
        }
    
        if ($_POST["fdate"]){
            $fday = "00";
        } else{
            $fday = $_POST["fdate"];
        }

        $father = $fyear."-".$fmonth."-".$fday;

        $fbirthdate = $_POST["fbdyear"]."-".$_POST["fbdmonth"]."-".$_POST["fbddate"];

        $query = "INSERT INTO person(firstName, middleName, lastName, gender, type) VALUES ('$_POST[first]', '$_POST[middle]', '$_POST[last]', '$_POST[gender]', 'S')";

        if (mysqli_query($con, $query))
        {
            $person_id = mysqli_insert_id($con);
        }

        $query2 = "INSERT INTO s_healthinfo(height, weight, weightStatus, discolorMarks, hairColor, eyeColor, skinTone, illness, lastDateHospitalized, lastPlaceHospitalized) VALUES ('$_POST[height]', '$_POST[weight]', '$weighstatus', '$_POST[discolorMarks]', '$_POST[hairColor]', '$_POST[eyeColor]', '$_POST[skinTone]', '$_POST[illness]', '$lastdhp', '$_POST[lastph]')";

        if (mysqli_query($con, $query2))
        {
            $health_id = mysqli_insert_id($con);
        }

        $query3 = "INSERT INTO s_hobbies(homeActivity, outsideActivity, faveSubject, extracoActivities, faveSport, ambition) VALUES ('$_POST[homeActivity]', '$_POST[outsideActivity]', '$_POST[faveSubject]', '$_POST[extracoActivities]', '$_POST[faveSport]', '$_POST[ambition]')";

        if (mysqli_query($con, $query3))
        {
            $hobby_id = mysqli_insert_id($con);
        }
        
        $queryy = "INSERT INTO s_expenditure(homeType, homeStatus, houseMonthlyCost, electricityType, electricityMonthlyCost, foodType, individualCount, waterType, waterCost, bathroomType, educExpense, medExpense, otherExpense) VALUES ('$_POST[homeType]', '$_POST[homeStatus]', '$_POST[houseMonthlyCost]', '$_POST[electricityType]', '$_POST[electricityMonthlyCost]', '$_POST[foodType]', '$_POST[individualCount]', '$_POST[waterType]', '$_POST[waterCost]', '$_POST[bathType]', '$_POST[educExpense]', '$_POST[medExpense]', '$_POST[otherExpense]')";

        if (mysqli_query($con, $queryy))
        {
            $expenditure_id = mysqli_insert_id($con);
        }

        $today = date("Y-m-d");

        $queries = "INSERT INTO s_appform(expenditureID, hobbyID, healthInfoID, lastSemAverage, submissionDate, referredBy, relationToReferrer, applicationCode) VALUES ('$expenditure_id', '$hobby_id', '$health_id', '$_POST[lgwa]', '$today', '$_POST[referredBy]', '$_POST[relationToReferrer]', '$password')";

        if (mysqli_query($con, $queries))
        {
            $app_id = mysqli_insert_id($con);
        }

        $query4 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$app_id', '$_POST[mname]', '$mbirthdate', 'Mother', '$_POST[mcno]', '$_POST[moccupation]', '$_POST[mincome]')";

        if (mysqli_query($con, $query4))
        {
            $fbg_id = mysqli_insert_id($con);
        }

        $query5 = "INSERT INTO s_parentinfo(familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$fbg_id', '$_POST[mcity]', '$_POST[mprovince]', '$_POST[mcivilStatus]', '$_POST[mplaceOfMarriage]', '$mother', '$_POST[mnoOfChildren]', '$_POST[mmedicalHistory]')";

        if (mysqli_query($con, $query5))
        {
            $parent_id = mysqli_insert_id($con);
        }

        $query6 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$app_id', '$_POST[fname]', '$fbirthdate', 'Father', '$_POST[fcno]', '$_POST[foccupation]', '$_POST[fincome]')";

        if (mysqli_query($con, $query6))
        {
            $fbg_id = mysqli_insert_id($con);
        }

        $query7 = "INSERT INTO s_parentinfo(familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$fbg_id', '$_POST[fcity]', '$_POST[fprovince]', '$_POST[fcivilStatus]', '$_POST[fplaceOfMarriage]', '$father', '$_POST[fnoOfChildren]', '$_POST[fmedicalHistory]')";

        if (mysqli_query($con, $query7))
        {
            $parent_id = mysqli_insert_id($con);
        }

        $query9 = "INSERT INTO scholar(personID, scholarAppID, currentYrLevel, birthdate, street, city, zip, classification, school, religion, applicationStatus) VALUES ('$person_id', '$app_id', '$_POST[currentYrLevel]', '$birthday', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[classification]', '$_POST[school]', '$_POST[religion]', 'Pending')";

        if (mysqli_query($con, $query9))
        {
            echo '<script>swal({
                title: "Success!",
                text: "<center>Application is submitted. \nPlease remember this code for viewing. \nReferral Code:'.$password.'</center>",
                icon: "success"
              }).then(function() {
                window.location = "index.php";
              });</script>';

            // echo "<script>
            // alert('Application submitted. Please remember this code for viewing: ".$password."');
            // window.location = ''
            // </script>"
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