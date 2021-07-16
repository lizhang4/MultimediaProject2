<?php

include "db.inc.php";

$sql = "SELECT * FROM contents ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// if($result) {
//     header("Location: ../read.php?success=successfully created");

// }
// else {
//     header("Location: ../upload.php?error=unknown error occurred");
    
// }