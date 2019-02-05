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
			echo 'alert("Enter username and password");';
			echo '</script>'; 
		}

		elseif (empty($username)||empty($password)){
			echo '<script language="javascript">'; 
			echo 'alert("Enter missing fields");';
			echo '</script>'; 
		}

		else {
		if (count($errors) == 0) {

			$conn = mysqli_connect("localhost", "root", "", "omisdb");

			if ($conn){
				$query = "SELECT * FROM user WHERE username = '".$username."'";
				$result = mysqli_query($conn, $query);
				
				if (mysqli_num_rows($result) == 1) {
					$logged_in_user = mysqli_fetch_assoc($result);
					if ($logged_in_user['password'] == $password) {
						session_start();
						$_SESSION['user'] = $logged_in_user['userID'];
						$_SESSION['success']  = "You are now logged in";
						header('location: sponsorhome.php');	
					}

					else
					{
						echo '<script language="javascript">'; 
						echo 'alert("Invalid Password");';
						echo 'window.location = "index.php"';
						echo '</script>'; 
					}
				}

				else {
					array_push($errors, "Wrong username/password combination");
					echo '<script language="javascript">'; 
					echo 'alert("Invalid Username");';
					echo 'window.location = "index.php"';
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