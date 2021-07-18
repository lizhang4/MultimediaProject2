<?php


session_start();

$conn = mysqli_connect('localhost', 'root', '', 'content_db');

if(!$conn) {
    die('failed to connect');
}



// Update Profile Image
if (isset($_POST['updateProfileImage'])) {
    $img_name = $_FILES['profileImage']['name'];
    $img_size = $_FILES['profileImage']['size'];
    $tmp_name = $_FILES['profileImage']['tmp_name'];
    $error = $_FILES['profileImage']['error'];
    $username = $_SESSION['username'];

    if (!empty($img_name)) {
        if ($img_size > 125000) {
            header("Location: ../../userAccountProfile.php?error=Sorry, your file is too large");
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
            header("Location: ../../userAccountProfile.php?error=only jpg, jpeg and png");
            die();
        }

        $sql = "UPDATE users
                SET profileImage='$new_img_name'
                WHERE username='$username'";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: ../../userAccountProfile.php?success=successfully updated");
            die();

        }
        else {
            header("Location: ../../userAccountProfile.php?username=$username&error=unknown error occurred");
            die();

            
        }
            
    }


}
else {
    header("Location: ../../userAccountProfile.php?username=$username&error=no file chosen");
    die();

}