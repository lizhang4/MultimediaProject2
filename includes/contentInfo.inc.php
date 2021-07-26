<?php 
    // This script fetch database content data
    $conn = mysqli_connect('localhost', 'root', '', 'content_db');

    if(!$conn) {
        die('failed to connect');
    }

    
    $postId = $_GET['id'];


    $query = "SELECT * FROM contents WHERE id = '$postId' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $userData = mysqli_fetch_assoc($result);
    }
    else {
        header("Location: index.php");
    }

    if(!isset($userData['name'])) {
        header("Location: index.php");
        exit();
    }
    else {

        $postName = $userData['name'];
        $postHistoricalDate = $userData['date'];
        $postInfo = $userData['info'];
        $postImage = $userData['image_url'];
    }

