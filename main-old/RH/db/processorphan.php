<?php
    require ('../dbconnect.php');

    $orphan_id = $_GET["orphanid"];

    $sel = "SELECT firstName, lastName FROM person JOIN orphan ON person.personID = orphan.personID WHERE orphanID = '$orphan_id'";
    $qry = mysqli_query($con, $sel);
    $rec = mysqli_fetch_array($qry);
    $fn = $rec['firstName'];
    $ln = $rec['lastName'];

    $query = "UPDATE orphan SET applicationStatus = 'Processing' WHERE orphanID = '$orphan_id'";
    if (mysqli_query($con, $query))
    {   
    	echo "<script>
    	      alert('The adoption status of ".$fn." ".$ln." has been tagged as processing.');
    	      window.location = '../RHvieworphan.php?orphanid=".$orphan_id."';
    	      </script>";
    }

?>