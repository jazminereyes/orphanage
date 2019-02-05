<?php
    require ('backend/dbconnect.php');

    $type = $_GET["type"];

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

    $query = "SELECT schoolSuppPercent, schoolProjPercent, schoolUniPercent, schoolContribPercent, transpoPercent, effectivityPeriod FROM s_budgetallocation WHERE budgetType = '".$type."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);

    echo '
    <label>Amount</label>
      <input class="form-control am" type="text" name="amount" value="'.$amt.'" readonly/>
    <label>Effectivity Period:</label>
    <input class="form-control" type="text" name="period" id="edate" value="'.$row[5].'" readonly/>

    <table class="table table-bordered">
    <tr>
    <th>Expense Category</th>
    <th>Percentage</th>
    <th>Equivalent Amount</th>
    </tr>

    <tr>
        <td>School Supplies</td>
        <td>'.$row[0].'</td>
        <td>&#8369;'.($row[0]/100)*$amt.'</td>
    </tr>

    <tr>
        <td>School Projects</td>
        <td>'.$row[1].'</td>
        <td>&#8369;'.($row[1]/100)*$amt.'</td>
    </tr>

    <tr>
        <td>School Uniform</td>
        <td>'.$row[2].'</td>
        <td>&#8369;'.($row[2]/100)*$amt.'</td>
    </tr>

    <tr>
        <td>School Contributions</td>
        <td>'.$row[3].'</td>
        <td>&#8369;'.($row[3]/100)*$amt.'</td>
    </tr>

    <tr>
        <td>Transportation</td>
        <td>'.$row[4].'</td>
        <td>&#8369;'.($row[4]/100)*$amt.'</td>
    </tr></table>';
?>