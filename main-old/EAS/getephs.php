<?php

require('backend/dbconnect.php');

$type = $_GET["type"];

$sel = "SELECT effectivityPeriod FROM s_budgetallocation where budgetType = '$type'";
$qry = mysqli_query($con, $sel);
$x = mysqli_fetch_array($qry);

$date = new DateTime($x['effectivityPeriod']);

$now = new DateTime();
          if($date < $now){
            echo "<div class='btn-group float-right'>
                    <a href='' data-toggle='modal' data-target='#modal-default'><button type='button' class='btn btn-success btn-flat'>
                      <span>Change Percentage&nbsp&nbsp</span>
                      <i class='fa fa-edit'></i>
                    </button></a>
                </div>";
          }
          else{
                      echo "<div class='btn-group float-right'>
                              <a href='' data-toggle='modal' data-target='#modal-default'><button type='button' class='btn btn-success btn-flat' disabled>
                                <span>Change Percentage&nbsp&nbsp</span>
                                <i class='fa fa-edit'></i>
                              </button></a>
                          </div>";
              }


?>