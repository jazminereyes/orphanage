<?php
    echo '<div class="report">
    <form method="post" action="reports/orphansperyear.php">
      <label>Admission Year</label>
      <select name="year">
        <option>2000</option>
        <option>2001</option>
        <option>2002</option>
        <option>2003</option>
        <option>2004</option>
        <option>2005</option>
        <option>2006</option>
        <option>2007</option>
        <option>2008</option>
        <option>2009</option>
        <option>2010</option>
        <option>2011</option>
        <option>2012</option>
        <option>2013</option>
        <option>2014</option>
        <option>2015</option>
        <option>2016</option>
        <option>2017</option>
        <option>2018</option>
      </select>
      <select name="month">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
      <button type="submit" name="submit" class="submit">Submit</button>

    </form>';

    if (isset($_POST["submit"])){
        $admission = $_POST["year"];
        $admonth = $_POST["month"];

        if ($admonth=="01"){
            $month = "January";
        } else if ($admonth=="02"){
            $month = "February";
        } else if ($admonth=="03"){
            $month = "March";
        } else if ($admonth=="04"){
            $month = "April";
        } else if ($admonth=="05"){
            $month = "May";
        } else if ($admonth=="06"){
            $month = "June";
        } else if ($admonth=="07"){
            $month = "July";
        } else if ($admonth=="08"){
            $month = "August";
        } else if ($admonth=="09"){
            $month = "September";
        } else if ($admonth=="10"){
            $month = "October";
        } else if ($admonth=="11"){
            $month = "November";
        } else if ($admonth=="12"){
            $month = "December";
        }

        echo "<center><h4>".$month.", ".$admission."</h4></center>";

        require('../../connection.php');

        $query = "SELECT caseNo, firstName, lastName, caseStatus FROM person LEFT JOIN orphan on person.personID = orphan.personID WHERE admissionDate LIKE '".$admission."-".$admonth."-%%'";
        $res = mysqli_query($con, $query);

        if ($res){ 
            echo "<table>";
            echo "<th>Case Number</th>";
            echo "<th>Name</th>";
            echo "<th>Case Category</th>";

            while ($rec=mysqli_fetch_row($res))
            {
                echo "<tr>";
                echo "<td>".$rec[0]."</td>";
                echo "<td>".$rec[1]." ".$rec[2]."</td>";
                echo "<td>".$rec[3]."</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    }
?>