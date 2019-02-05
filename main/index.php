<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="sign.css" />
	<script src="../client/js/sweetalert.min.js"></script>
	<style>
		*
		{
			font-family: 'Open Sans';
		}
	</style>
</head>
<body>
    <div class="container">
        <div class="side">
            <img class="logo" src="../img/logo2.png"/>
        </div>
        <div class="right">
            <center><img class="concordia" src="../icons/Concordia.jpg"/></center>
            <form method="post" action="index.php">
                <input type="text" class="input" placeholder="Username" name="username" required/>
                <input type="password" class="input" placeholder="Password" name="password" required/>
                <input type="submit" value="Sign In" name="submit"/><br/>
                <input type="reset" value="Clear" name="reset"/>
            </form>

            <?php
	            if (isset($_POST['submit'])){
		            login();
	            }

	            function login(){
		            global $username; 
		            $errors = [];

		            $username = $_POST['username'];
		            $password = $_POST['password'];

		        if (empty($username)&&empty($password)) {
			        array_push($errors, "Username is required");
			        echo '<script language="javascript">'; 
					//echo 'alert("Enter username and password");';
					echo 'swal("Error!", "Enter username and password.", "error");';
			        echo '</script>'; 
		        }

		        elseif (empty($username)||empty($password)){
			        echo '<script language="javascript">'; 
					//echo 'alert("Enter missing fields");';
					echo 'swal("Error!", "Enter missing fields.", "error");';
			        echo '</script>'; 
		        }

		        else {
		            if (count($errors) == 0) {

			        require('../connection.php');

			        if ($con){
				        $query = "SELECT * FROM user WHERE username = '".$username."'";
				        $result = mysqli_query($con, $query);
				
				        if (mysqli_num_rows($result) == 1) {
					        $logged_in_user = mysqli_fetch_assoc($result);
					        if ($logged_in_user['programType'] == 'Admin' && $logged_in_user['password'] == $password) {
						        $_SESSION['userid'] = $logged_in_user['userID'];
								$_SESSION['success']  = "You are now logged in";
								header('location: dashboard.php');	
					        }

					else if ($logged_in_user['programType'] == 'RH' && $logged_in_user['password'] == $password) {
						$_SESSION['userid'] = $logged_in_user['userID'];
						$_SESSION['success']  = "You are now logged in";
						header('location: RH/RHDashboard.php');	
					}

					else if ($logged_in_user['programType'] == 'EAS' && $logged_in_user['password'] == $password) {
						$_SESSION['userid'] = $logged_in_user['userID'];
						$_SESSION['success']  = "You are now logged in";
						header('location: EAS/dashboard.php');	
					}

					else
					{
						echo '<script language="javascript">'; 
						//echo 'alert("Invalid Password");';
						echo 'swal("Cannot log in!", "Invalid password.", "error");';
						echo '</script>'; 
					}
				}

				else {
					array_push($errors, "Wrong username/password combination");
					echo '<script language="javascript">'; 
					//echo 'alert("Invalid Username");';
					echo 'swal("Cannot log in!", "Invalid username.", "error");';
					echo '</script>'; 
				}
			}

			else {
				echo 'MySQL Error: ' . mysqli_connect_error();
			}
			}
		}
	}
?>
        </div>
    </div>
</body>
</html>