<?php

        require ('../../connection.php');

        $height = $_POST['height'];
        $weight = $_POST['weight'];

        $bmi = $weight/($height/100*$height/100);
        echo $bmi;

        if ($bmi<18.5){
            $weightstatus = "Underweight";
        } elseif ($bmi>=18.5&&$bmi<=25){
            $weighstatus = "Normal Weight";
        } elseif ($bmi>=25&&$bmi<=30){
            $weighstatus = "Obese";
        } elseif ($bmi>30){
            $weightstatus = "Overweight";
        }

        $query = "INSERT INTO person(firstName, middleName, lastName, type) VALUES ('$_POST[first]', '$_POST[middle]', '$_POST[last]', 'S')";

        if (mysqli_query($con, $query))
        {
            $person_id = mysqli_insert_id($con);
        }

        $query2 = "INSERT INTO s_healthinfo(height, weight, weightStatus, discolorMarks, hairColor, eyeColor, skinTone, illness, lastDateHospitalized, lastPlaceHospitalized) VALUES ('$_POST[height]', '$_POST[weight]', '$weightstatus', '$_POST[discolorMarks]', '$_POST[hairColor]', '$_POST[eyeColor]', '$_POST[skinTone]', '$_POST[illness]', '$_POST[lastdhp]', '$_POST[lastph]')";

        if (mysqli_query($con, $query2))
        {
            $health_id = mysqli_insert_id($con);
        }

        if (isset($_POST['homeActivity'])||isset($_POST['outsideActivity'])||isset($_POST['faveSubject'])||isset($_POST['extracoActivities'])||isset($_POST['faveSport'])||isset($_POST['ambition']))
        {
            $query3 = "INSERT INTO s_hobbies(homeActivity, outsideActivity, faveSubject, extracoActivities, faveSport, ambition) VALUES ('$_POST[homeActivity]', '$_POST[outsideActivity]', '$_POST[faveSubject]', '$_POST[extracoActivities]', '$_POST[faveSport]', '$_POST[ambition]')";

            if (mysqli_query($con, $query3))
            {
                $hobby_id = mysqli_insert_id($con);
            }
        }

        $queryy = "INSERT INTO s_expenditure(homeType, homeStatus, houseMonthlyCost, electricityType, electricityMonthlyCost, foodType, individualCount, waterType, waterCost, bathroomType, educExpense, medExpense, otherExpense) VALUES ('$_POST[homeType]', '$_POST[homeStatus]', '$_POST[houseMonthlyCost]', '$_POST[electricityType]', '$_POST[electricityMonthlyCost]', '$_POST[foodType]', '$_POST[individualCount]', '$_POST[waterType]', '$_POST[waterCost]', '$_POST[bathType]', '$_POST[educexpense]', '$_POST[medexpense]', '$_POST[otherexpense]')";

        echo $queryy;
        
        if (mysqli_query($con, $queryy))
        {
            $expenditure_id = mysqli_insert_id($con);
        }

        $queries = "INSERT INTO s_appform(expenditureID, hobbyID, healthInfoID, submissionDate, referredBy, relationToReferrer, interviewDate, interviewedBy) VALUES ('$expenditure_id', '$hobby_id', '$health_id', '$_POST[submission]', '$_POST[referredBy]', '$_POST[relationToReferrer]', '$_POST[intdate]', '$_POST[intby]')";

        if (mysqli_query($con, $queries))
        {
            $app_id = mysqli_insert_id($con);
        }

        if (isset($_POST['mname']))
        {
            $query4 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$app_id', '$_POST[mname]', '$_POST[mbirthdate]', 'Mother', '$_POST[mcno]', '$_POST[moccupation]', '$_POST[mincome]')";

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
            $query6 = "INSERT INTO s_familybground(scholarAppID, name, birthdate, relationType, contactNo, occupation, income) VALUES ('$app_id', '$_POST[fname]', '$_POST[fbirthdate]', 'Father', '$_POST[fcno]', '$_POST[foccupation]', '$_POST[fincome]')";

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

        $query9 = "INSERT INTO scholar(personID, scholarAppID, caseNo, nickname, currentYrLevel, birthdate, street, city, zip, classification, school, religion, admissionDate, applicationStatus) VALUES ('$person_id', '$app_id', '$caseno', '$_POST[nickname]', '$_POST[currentYrLevel]', '$_POST[birthdate]', '$_POST[street]', '$_POST[city]', '$_POST[zip]', '$_POST[classification]', '$_POST[school]', '$_POST[religion]', '$_POST[admission]', 'Accepted')";

        echo $query9;

        if (mysqli_query($con, $query9))
        {
            $scholar_id = mysqli_insert_id($con);
            header ('Location: ../viewscholar.php?scholarid='.$scholar_id.'');
        }

?>