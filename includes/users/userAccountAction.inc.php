<?php
// This script handles the login, register, logout and delete function for user account


session_start();

$conn = mysqli_connect('localhost', 'root', '', 'content_db');

if(!$conn) {
    die('failed to connect');
}



//Login
if(isset($_POST['usernameL'])) {
    $username = $_POST['usernameL'];
    $password = $_POST['passwordL'];

    if(!empty($username) && !empty($password)) {
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0) {
                $userdata = mysqli_fetch_assoc($result);

                if($userdata['password'] == $password) {
                    $_SESSION['username'] = $userdata['username'];
                    echo 1; // Login successful

                }
                else {
                    echo 2; // wrong password
                }
            }
            else {
                echo 3; // no such data
            }
        }
        
    }

}

// Logout
if (isset($_POST['action'])) {
    unset($_SESSION['username']);
}



// Register
if (isset($_POST['usernameR'])) {
    $username = $_POST['usernameR'];
    $password = $_POST['passwordR'];
    $repassword = $_POST['repasswordR'];
    $gender = $_POST['genderR'];
    $shortSummary = $_POST['shortSummaryR'];

    if(!empty($username) && !empty($password) && !empty($repassword) && !empty($gender) && !empty($shortSummary) ) {
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

//Delete Account
if (isset($_POST['deleteAccount'])) {
    $username = $_SESSION['username'];
    unset($_SESSION['username']);
    
    $sql = "DELETE FROM users
            WHERE username='$username'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: ../../login.php?success=successfully deleted");
        die();

    }
    else {
        header("Location: ../../login.php?error=unknown error occurred");
        die();

        
    }
}

