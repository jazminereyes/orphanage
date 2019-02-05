<?php

        require ('../../connection.php');

        $fn = $_POST['first'];
        $mn = $_POST['middle'];
        $ln = $_POST['last'];

        $query = "INSERT INTO person(firstName, middleName, lastName, type) VALUES (?, ?, ?, 'S')";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)){
            echo "error";
        }
        else{
            mysqli_stmt_bind_param($stmt, "sss", $fn, $mn, $ln);
            mysqli_stmt_execute($stmt);
            $person_id = mysqli_insert_id($con);
        }

        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $marks = $_POST['discolorMarks'];
        $hc = $_POST['hairColor']; 
        $ec = $_POST['eyeColor'];
        $skin = $_POST['skinTone'];
        $illness = $_POST['illness'];
        $ldh = $_POST['lastdhp'];
        $lph = $_POST['lastph'];

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


        $query2 = "INSERT INTO s_healthinfo(height, weight, weightStatus, discolorMarks, hairColor, eyeColor, skinTone, illness, lastDateHospitalized, lastPlaceHospitalized) VALUES (?, ?, '$weightstatus', ?, ?, ?, ?, ?, ?, ?)";
        $st = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($st, $query2)){
            echo "error";
        }
        else{
            mysqli_stmt_bind_param($st, "ddsssssss", $height, $weight, $marks, $hc, $ec, $skin, $illness, $ldh, $lph);
            mysqli_stmt_execute($st);
            $health_id = mysqli_insert_id($con);
        }

        if (isset($_POST['homeActivity'])||isset($_POST['outsideActivity'])||isset($_POST['faveSubject'])||isset($_POST['extracoActivities'])||isset($_POST['faveSport'])||isset($_POST['ambition']))
        {

            $home = $_POST['homeActivity'];
            $out = $_POST['outsideActivity'];
            $subj = $_POST['faveSubject'];
            $eca = $_POST['extracoActivities'];
            $sport = $_POST['faveSport'];
            $amb = $_POST['ambition'];

            $query3 = "INSERT INTO s_hobbies(homeActivity, outsideActivity, faveSubject, extracoActivities, faveSport, ambition) VALUES (?, ?, ?, ?, ?, ?)";
            $st2 = mysqli_stmt_init($con);
            if(!mysqli_stmt_prepare($st2, $query3)){
                echo "error";
            }
            else{
                mysqli_stmt_bind_param($st2, "ssssss", $home, $out, $subj, $eca, $sport, $amb);
                mysqli_stmt_execute($st2);
                $hobby_id = mysqli_insert_id($con);
            }
        }

        $htype = $_POST['homeType'];
        $hstat = $_POST['homeStatus'];
        $hcost = $_POST['houseMonthlyCost'];
        $etype = $_POST['electricityType'];
        $ecost = $_POST['electricityMonthlyCost'];
        $ftype = $_POST['foodType'];
        $icount = $_POST['individualCount'];
        $wtype = $_POST['waterType'];
        $wcost = $_POST['waterCost'];
        $btype = $_POST['bathType'];
        $educ = $_POST['educexpense'];
        $med = $_POST['medexpense'];
        $other = $_POST['otherexpense'];

        $qry = "INSERT INTO s_expenditure(homeType, homeStatus, houseMonthlyCost, electricityType, electricityMonthlyCost, foodType, individualCount, waterType, waterCost, bathroomType, educExpense, medExpense, otherExpense) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stm = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stm, $qry)){
            echo "error";
        }
        else{
            mysqli_stmt_bind_param($stm, "ssdsdsisdsddd", $htype, $hstat, $hcost, $etype, $ecost, $ftype, $icount, $wtype, $wcost, $btype, $educ, $med, $other);
            mysqli_stmt_execute($stm);
            $expenditure_id = mysqli_insert_id($con);
        }
        
        $sdate = $_POST['submission'];
        $refby = $_POST['referredBy'];
        $relto = $_POST['relationToReferrer'];
        $intdate = $_POST['intdate'];
        $intby = $_POST['intby'];

        $qry2 = "INSERT INTO s_appform(expenditureID, hobbyID, healthInfoID, submissionDate, referredBy, relationToReferrer, interviewDate, interviewedBy) VALUES ('$expenditure_id', '$hobby_id', '$health_id', ?, ?, ?, ?, ?)";
        $stmt2 = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt2, $qry2)){
            echo "error";
        }
        else{
            mysqli_stmt_bind_param($stmt2, "sssss", $sdate, $refby, $relto, $intdate, $intby);
            mysqli_stmt_execute($stmt2);
            $app_id = mysqli_insert_id($con);
        }


        if (isset($_POST['mname']))
        {
            $query4 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, occupation, income) VALUES ('$app_id', '$_POST[mname]', '$_POST[mbirthdate]', 'Mother', '$_POST[moccupation]', '$_POST[mincome]')";

            if (mysqli_query($con, $query4))
            {
                $fbg_id = mysqli_insert_id($con);
            }

            $query5 = "INSERT INTO s_parentinfo(familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$fbg_id', '$_POST[mcity]', '$_POST[mprovince]', '$_POST[mcivilStatus]', '$_POST[mplaceOfMarriage]', '$_POST[mdateOfMarriage]', '$_POST[mnoOfChildren]', '$_POST[mmedicalHistory]')";

            if (mysqli_query($con, $query5))
            {
                $parent_id = mysqli_insert_id($con);
            }
        }
        
        if (isset($_POST['fname']))
        {
            $query6 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, occupation, income) VALUES ('$app_id', '$_POST[fname]', '$_POST[fbirthdate]', 'Father', '$_POST[foccupation]', '$_POST[fincome]')";

            if (mysqli_query($con, $query6))
            {
                $fbg_id = mysqli_insert_id($con);
            }
    
            $query7 = "INSERT INTO s_parentinfo(familyBgroundID, city, province, civilStatus, placeOfMarriage, dateOfMarriage, noOfChildren, medicalHistory) VALUES ('$fbg_id', '$_POST[fcity]', '$_POST[fprovince]', '$_POST[fcivilStatus]', '$_POST[fplaceOfMarriage]', '$_POST[fdateOfMarriage]', '$_POST[fnoOfChildren]', '$_POST[fmedicalHistory]')";
    
            if (mysqli_query($con, $query7))
            {
                $parent_id = mysqli_insert_id($con);
            }
        }

        $query8 = "SELECT COUNT(scholarID) as total FROM scholar";
        $result = mysqli_query($con, $query8);

        if ($result)
        {
            $row = mysqli_fetch_row($result);
        }

        $year = (int) $_POST['admission'];
        $case = $row[0] + 1;
        $caseno = $year."-".$case;
        echo $caseno;

        $query9 = "INSERT INTO scholar(personID, scholarAppID, caseNo, nickname, currentYrLevel, birthdate, street, city, zip, classification, school, admissionDate, applicationStatus) VALUES ('$person_id', '$app_id', '$caseno', '$_POST[nickname]', '$_POST[currentYrLevel]', '$_POST[birthdate]', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[classification]', '$_POST[school]', '$_POST[admission]', 'Accepted')";

        echo $query9;

        if (mysqli_query($con, $query9))
        {
            $scholar_id = mysqli_insert_id($con);
            header ('Location: ../viewscholar.php?scholarid='.$scholar_id.'');
        }

?>