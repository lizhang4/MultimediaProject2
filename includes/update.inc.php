<?php



if (isset($_GET['id'])) {
    include "db.inc.php";

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(($data));
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM contents WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }
    else {
        header("Location: read.php");
    }

}
else if (isset($_POST['update']) && isset($_FILES)) {
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
    $id = validate($_POST['id']);

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    echo "<pre>";
    print_r($_FILES['image']);
    echo "<pre>";

    if (empty($name)) {
        header("Location: ../update.php?error=Name is required");
    }
    else if (empty($date)) {
        header("Location: ../update.php?error=Date is required");
    }
    else if (empty($info)) {
        header("Location: ../update.php?error=Info is required");
    }
    else if (empty($img_name)) {
        header("Location: ../update.php?error=Image is required");
    }
    else if($error !== 0) {
        header("Location: ../update.php?error=Error on image");
    }
    else {
        if ($img_size > 125000) {
            header("Location: ../update.php?error=Sorry, your file is too large");
        }
        else {
            $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_extension_lc = strtolower($img_extension);

            $allowed_extensions = array("jpg", "jpeg", "png");

            if (in_array($img_extension_lc, $allowed_extensions)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_extension_lc;
                $img_upload_path = '../uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
            else {
                header("Location: ../update.php?error=only jpg, jpeg and png allow");

            }
        }
        $sql = "UPDATE contents
                SET name = '$name', date = '$date', info = '$info', image_url = '$new_img_name'
                WHERE id=$id ";

        $result = mysqli_query($conn, $sql);

        if($result) {
            header("Location: ../read.php?success=successfully updated");
        
        }
        else {
            header("Location: ../update.php?id=$id&error=unknown error occurred");
            
        }
    }
}

else {
    header("Location: read.php");
}