<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'content_db');

if(!$conn) {
    die('failed to connect');
}


if (isset($_POST['usernameR'])) {
    $username = $_POST['usernameR'];
    $password = $_POST['passwordR'];
    $repassword = $_POST['repasswordR'];
    $gender = $_POST['genderR'];
    $shortSummary = $_POST['shortSummaryR'];

    $img_name = $_FILES['profileImageR']['name'];
    $img_size = $_FILES['profileImageR']['size'];
    $tmp_name = $_FILES['profileImageR']['tmp_name'];
    $error = $_FILES['profileImageR']['error'];

    if(!empty($username) && !empty($password) && !empty($repassword) && !empty($img_name) && !empty($gender) && !empty($shortSummary) ) {
        

        
        
        $query1 = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result1 = mysqli_query($conn, $query1);

        if(mysqli_num_rows($result1) == 0 &&($password == $password)) {
            $query = "INSERT INTO users (username, password, gender, shortSummary)
                      VALUES ('$username', '$password', '$gender', '$shortSummary')";

            mysqli_query($conn, $query);
            $_SESSION['username'] = $username;
            echo 1;
        }
        else if(mysqli_num_rows($result1) > 0) {
            echo 2;
        }
        else {
            echo 3;

        }


    }
    
}


