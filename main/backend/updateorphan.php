<?php
    $person = $_POST["pid"];
    $orphan = $_POST["oid"];

    $flag = 0;

    require('../../connection.php');

    $query = "SELECT firstName, middleName, lastName FROM person WHERE personID = $person";

    $res = mysqli_query($con, $query);

    $rec = mysqli_fetch_row($res);

    if ($rec[0]!=$_POST["fn"]||$rec[1]!=$_POST["mn"]||$rec[2]!=$_POST["ln"])
    {  

        echo "Pumasok";

        $query2 = "UPDATE person SET"; 

        if ($rec[0]!=$_POST["fn"])
        {
            $query2 = $query2." firstName = '$_POST[fn]'";
        }

        if ($rec[1]!=$_POST["mn"])
        {
            $query2 = $query2." middleName = '$_POST[mn]'";
        }

        if ($rec[2]!=$_POST["ln"])
        {
            $query2 = $query2." lastName = '$_POST[ln]'";
        }

        $query2 = $query2."WHERE personID = $person";

        if (mysqli_query($con, $query2))
        {
            $query3 = "SELECT religion FROM orphan WHERE personID = $person";

            $res2 = mysqli_query($con, $query3);

            $rec2 = mysqli_fetch_row($res2);

            $query4 = "UPDATE orphan SET";

            if ($rec2[0]!=$_POST["religion"])
            {
                $query4 = $query4." religion = '$_POST[religion]'";
                $flag = 1;
            }

            if ($flag==1)
            {
                $query4 = $query4." WHERE personID = $person";

                echo $query4;

                if (mysqli_query($con, $query4))
                {
                    echo "<script>";
                    echo "disableOrphan();";
                    echo "alert('Record updated');";
                    //echo "window.location = '../vieworphan.php?orphanid=".$orphan."';";
                    echo "</script>";
                    header ('Location: ../vieworphan.php?orphanid='.$orphan.'');
                }
            }

            else
            {
                echo "<script>";
                echo "disableOrphan();";
                echo "alert('Record updated');";
                //echo "window.location = '../vieworphan.php?orphanid=".$orphan."';";
                echo "</script>";
                header ('Location: ../vieworphan.php?orphanid='.$orphan.'');
            }
        }

    }

    else
    {
        echo "Pasok";

        $query5 = "SELECT religion FROM orphan WHERE personID = $person";

        $res3 = mysqli_query($con, $query5);

        $rec3 = mysqli_fetch_row($res3);

        $query6 = "UPDATE orphan SET";

            if ($rec3[0]!=$_POST["religion"])
            {
                $query6 = $query6." religion = '$_POST[religion]'";
                $flag = 1;
            }

            if ($flag==1)
            {   
                $query6 = $query6." WHERE personID = $person";

                if (mysqli_query($con, $query6))
                {
                    echo "<script>";
                    echo "disableOrphan();";
                    echo "alert('Record updated');";
                    //echo "window.location = '../orphans.php';";
                    echo "</script>";
                    header ('Location: ../vieworphan.php?orphanid='.$orphan.'');
                }
            }

            else
            {
                echo "<script>";
                echo "disableOrphan();";
                echo "alert('Record updated');";
                //echo "window.location = '../vieworphan.php?orphanid=".$orphan."'';";
                echo "</script>";
                header ('Location: ../vieworphan.php?orphanid='.$orphan.'');
            }
    }
    
?>