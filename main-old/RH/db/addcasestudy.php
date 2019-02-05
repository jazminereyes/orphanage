<?php
    
    require('../dbconnect.php');

    $file = $_FILES['fileToUpload'];
    $name = $file['name'];

    $path = "referrals/" . basename($name);

    if (move_uploaded_file($file['tmp_name'], $path)){
	    $fpath = $path;
    } 
    else{
    	echo "Error.";
    }

    $oid = $_POST['oid'];
    $title = $_POST['title'];
    $today = date('Y-m-d');

    $sel = "SELECT personID FROM orphan WHERE orphanID = '$oid'";
    $qry = mysqli_query($con, $sel);
    $rec = mysqli_fetch_array($qry);
    $pid = $rec['personID'];

    $save = "INSERT INTO is_casestudy (personID, title, dateUploaded, filePath, fileName) VALUES ('$pid', ?, '$today', '$fpath', '$name')";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $save)){
    	echo "error";
    }
    else{
    	mysqli_stmt_bind_param($stmt, "s", $title);
    	mysqli_stmt_execute($stmt);
    	echo "<script>
    	      alert('Case study added');
    	      window.location = '../RHvieworphan.php?orphanid=".$oid."';
    	      </script>";
    }


?>