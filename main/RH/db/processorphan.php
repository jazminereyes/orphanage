<?php
    require ('../dbconnect.php');

    $orphan_id = $_POST["oid"];

    $sel = "SELECT firstName, lastName FROM person JOIN orphan ON person.personID = orphan.personID WHERE orphanID = '$orphan_id'";
    $qry = mysqli_query($con, $sel);
    $rec = mysqli_fetch_array($qry);
    $fn = $rec['firstName'];
    $ln = $rec['lastName'];

    $query = "UPDATE orphan SET applicationStatus = 'Processing' WHERE orphanID = '$orphan_id'";
    echo $oid;
    if (mysqli_query($con, $query))
    {   
        
        echo "bat ganun";
        echo $oid;
    	// echo "<script>
    	//       alert('Adoption status has been tagged as processing.');
    	//       window.location = '../RHvieworphan.php?orphanid=".$orphan_id."';
    	//       </script>";
    }

?>