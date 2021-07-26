<?php

// This script handles deletion of content from database
if(isset($_GET['id'])) {
    include "db.inc.php";
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(($data));
        return $data;
    }

    $id = validate($_GET['id']);


    $sql = "DELETE FROM contents
            WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: ../read.php?success=successfully deleted");
    
    }
    else {
        header("Location: ../read.php?error=unknown error occurred");
        
    }

}
else {
    header("Location: ../read.php");
}