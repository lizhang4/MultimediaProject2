<?php

include "db.inc.php";

// This is the backend php that get info from database to display on read.php
$sql = "SELECT * FROM contents ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

