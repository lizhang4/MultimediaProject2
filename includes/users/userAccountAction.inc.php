<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'content_db');

if(!$conn) {
    die('failed to connect');
}

// echo 1;


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
if(isset($_POST['usernameR'])) {
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
        if ($img_size > 125000) {
            header("Location: ../../register.php?error=Sorry, your file is too large");
            die();

        }

        $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_extension_lc = strtolower($img_extension);

        $allowed_extensions = array("jpg", "jpeg", "png");

        if (in_array($img_extension_lc, $allowed_extensions)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_extension_lc;
            $img_upload_path = '../../uploads/userProfilePic/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
        }
        else {
            header("Location: ../../register.php?error=only jpg, jpeg and png");
            die();
        }


        $query1 = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result1 = mysqli_query($conn, $query1);

        if(mysqli_num_rows($result1) == 0 &&($password == $password)) {
            $query = "INSERT INTO users (username, password, profileImage, gender, shortSummary)
                      VALUES ('$username', '$password', '$new_img_name', '$gender', '$shortSummary')";

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
    else {
        header("Location: ../../register.php?error=unknown error");
        die();
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
