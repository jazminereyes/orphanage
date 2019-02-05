<?php

require('backend/dbconnect.php');

$year = $_GET['year'];
$sid = $_GET['scholarid'];
$bid = $_GET['bid'];

$supp = 0;
        $proj = 0;
        $uni = 0;
        $contrib = 0;
        $transpo = 0;

        $query2 = "SELECT expenseCategory, amount FROM s_expensestatement WHERE budgetID = '$bid' AND releaseDate LIKE '$year-%%-%%'";
        $res = mysqli_query($con, $query2);
        
        while ($rec = mysqli_fetch_row($res))
        {
            if ($rec[0]=="supplies")
            {
                $supp = $supp + $rec[1];
            }

            else if ($rec[0]=="projects")
            {
                $proj = $proj + $rec[1];
            }

            else if ($rec[0]=="uniform")
            {
                $uni = $uni + $rec[1];
            }

            else if ($rec[0]=="contributions")
            {
                $contrib = $contrib + $rec[1];
            }

            else if ($rec[0]=="transportation")
            {
                $transpo = $transpo + $rec[1];
            }
        }



        echo '

        <center><table class="table table-bordered text-center" style="width: 60%">
        <tr>
            <th>Expense Category</th>
            <th>Amount</th>
            </tr>
        <tr>
        <td>School Supplies</td>
        <td>'.$supp.'</td>
        </tr>

        <tr>
        <td>School Projects</td>
        <td>'.$proj.'</td>
        </tr>

        <tr>
        <td>School Uniform</td>
        <td>'.$uni.'</td>
        </tr>

        <tr>
        <td>School Contributions</td>
        <td>'.$contrib.'</td>
        </tr>

        <tr>
        <td>Transportation</td>
        <td>'.$transpo.'</td>
        </tr>

        <tr>
        <td>TOTAL EXPENSE</td>
        <td>'.($supp + $proj + $uni + $contrib + $transpo).'</td>
        </tr>

        </table></center>';

?>