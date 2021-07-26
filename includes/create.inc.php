<?php

if (isset($_POST['create']) && isset($_FILES['image'])) {
    include "db.inc.php";

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(($data));
        return $data;
    }

    $name = validate($_POST['name']);
    $date = validate($_POST['date']);
    $info = validate($_POST['info']);

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    echo "<pre>";
    print_r($_FILES['image']);
    echo "<pre>";
    


    if (empty($name)) {
        header("Location: ../upload.php?error=Name is required");
    }
    else if (empty($date)) {
        header("Location: ../upload.php?error=Date is required");
    }
    else if (empty($info)) {
        header("Location: ../upload.php?error=Info is required");
    }
    else if (empty($img_name)) {
        header("Location: ../upload.php?error=Image is required");
    }
    else if($error !== 0) {
        header("Location: ../upload.php?error=Error on image");
    }
    else {
        
        if ($img_size > 125000) {
            header("Location: ../upload.php?error=Sorry, your file is too large");
        }
        else {
            $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_extension_lc = strtolower($img_extension);

            $allowed_extensions = array("jpg", "jpeg", "png");

            if (in_array($img_extension_lc, $allowed_extensions)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_extension_lc;
                $img_upload_path = '../uploads/contentImg/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
            else {
                header("Location: ../upload.php?error=only jpg, jpeg and png allow");

            }
        }

        $sql = "INSERT INTO contents(name, date, info, image_url)
                VALUES('$name', '$date','$info', '$new_img_name')";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: ../read.php?success=successfully created");
        
        }
        else {
            header("Location: ../upload.php?error=unknown error occurred");
            
        }
    }


}
else {
    header("Location: ../upload.php");
}