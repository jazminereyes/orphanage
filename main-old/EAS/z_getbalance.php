<?php
    require ('backend/dbconnect.php');

    $type = $_GET["type"];
    $scholar_id = $_GET["scholarid"];

    // $bud = "SELECT budgetID FROM s_budget WHERE scholarID = 'scholar_id'";
    // $b = mysqli_query($con, $bud);
    // $res = mysqli_fetch_row($b);
    // $bid = $res[0];

    // // get current balance
    // $cur = "SELECT balance, MAX(releaseDate) FROM s_expensestatement as exp JOIN s_budget as bud on exp.budgetID = bud.budgetID WHERE exp.budgetID = '$bid'";

    // // get total amount per category
    // $per = "SELECT amount FROM s_expensestatement as exp JOIN s_budget as bud on exp.budgetID = bud.budgetID WHERE exp.budgetID = '$bid' AND expenseCategory = '$type'";
    // $g = mysqli_query($con, $per);
    // while($t = mysqli_fetch_array($g)){}


    $query = "SELECT equivSupplies, equivProjects, equivUniform, equivContrib, equivTranspo FROM s_budget WHERE scholarID = '$scholar_id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);

    if ($type == "supplies")
    {
        echo '<label class="lblto"> Remaining Balance </label>
            <input type="text" class="form-control input" readonly id="balance" name="balance"  value="'.$row[0].'"/>';
    }

    else if ($type == "projects")
    {
        echo '<label class="lblto"> Remaining Balance </label>
            <input type="text" class="form-control input" readonly id="balance" name="balance"  value="'.$row[1].'"/>';
    }

    else if ($type == "uniform")
    {
        echo '<label class="lblto"> Remaining Balance </label>
            <input type="text" class="form-control input" readonly id="balance" name="balance"  value="'.$row[2].'">';
    }

    else if ($type == "contributions")
    {
        echo '<label class="lblto"> Remaining Balance </label>
            <input type="text" class="form-control input" readonly id="balance" name="balance"  value="'.$row[3].'">';
    }

    else if ($type == "transportation")
    {
        echo '<label class="lblto"> Remaining Balance </label>
            <input type="text" class="form-control input" readonly id="balance" name="balance"  value="'.$row[4].'">';
    }
?>