<?php 

    $conn = mysqli_connect('localhost', 'root', '', 'content_db');

    if(!$conn) {
        die('failed to connect');
    }

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $userData = mysqli_fetch_assoc($result);


    $loggedInId = $userData['id'];
    $loggedInUsername = $userData['username'];
    $loggedInProfileImageUrl = $userData['profileImage'];
    $loggedInGender = $userData['gender'];
    $loggedInShortSummary = $userData['shortSummary'];