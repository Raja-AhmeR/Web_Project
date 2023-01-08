<?php
    session_start();
    include("db.php");

    // $sql = " Select * from request";
    // $result = $conn->query($sql);
    // while ($row = $result->fetch_assoc())
    // {

        echo $_GET['status'];
        $sql = "UPDATE `request` SET `status`= '". $_GET['status'] ."' WHERE id = '". $_GET['id']. "' ";
        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE)
        {
            $_SESSION['message'] = "<div class='records'>
            <h2>Status Updated Successfully</h2></div>";
            header("location: trackrequests.php");
            
        }
        else 
        {
            echo "<br>Error: " .$sql. "<br>" .$conn->error;
        }
    // }

    
?>
