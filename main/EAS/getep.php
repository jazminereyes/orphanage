<?php

require('backend/dbconnect.php');

$type = $_GET["type"];

$sel = "SELECT effectivityPeriod, budgetAllocationID FROM s_budgetallocation where budgetType = '$type'";
$qry = mysqli_query($con, $sel);
$x = mysqli_fetch_array($qry);

$budid = $x['budgetAllocationID'];
$date = new DateTime($x['effectivityPeriod']);

$now = new DateTime();
          if($date < $now){
            echo "<div class='btn-group float-right'>
                    <a href='' data-toggle='modal' data-target='#modal-default'><button type='button' class='btn btn-success btn-flat'>
                      <span>Change Percentage&nbsp&nbsp</span>
                      <i class='fa fa-edit'></i>
                    </button></a>
                </div>";

            echo '<div id="modal-default" class="modal fade" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>

              <div class="modal-body">

               <form method="post" action="backend/updatebudget.php">         

                <center>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-hover tblcustom text-center" style="padding:0px; margin-bottom: 0px;">
                      <thead>
                        <tr>
                          <td width="50%">Expense Category</td>
                          <td width="50%">Percentage</td>
                        </tr>
                      </thead>
                        
                      <tbody style="padding:0px;">
                        <tr>
                          <td>School Supplies</td>
                          <td><input class="text-center input decimal gr" type="number" name="supp" id="supp" onchange="computepct()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Projects</td>
                          <td><input class="text-center input decimal gr" type="number" name="proj" id="proj" onchange="computepct()" value=""></td>
                        </tr>
                        <tr>
                          <td>School Uniform</td> 
                          <td><input class="text-center input decimal gr" type="number" name="unif" id="unif" onchange="computepct()" value=""/></td>
                        </tr>
                        <tr>
                          <td>School Contributions</td>
                          <td><input class="text-center input decimal gr" type="number" name="cont" id="cont" onchange="computepct()" value="" /></td>
                        </tr>
                        <tr>
                          <td>Transportation</td>
                          <td><input class="text-center input decimal gr" type="number" name="transpo" id="transpo" onchange="computepct()" value=""></td>
                        </tr>
                        <tr>
                          <td style="font-weight: bold;">Total</td>
                          <td><input class="text-center form-control input" type="number" name="total" id="total" readonly style="border:none;" /></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                    </center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                   <input type="hidden" name="budid" value="'.$budid.'"/>
                   <input type="submit" name="submit" class="btn btn-success" value="Confirm" onclick="validatepct()"/>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->';
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