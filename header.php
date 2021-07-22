<?php
    session_start();
    $currentPage = basename($_SERVER['PHP_SELF'], ".php");
    if ($currentPage != 'register' && $currentPage != 'login') {
        if(empty($_SESSION['username']) || $_SESSION['username'] == '') {
            header("Location: http://localhost/multimediaproject2/login.php");
            die();
        }
    }
    
    if(!(empty($_SESSION['username']) || $_SESSION['username'] == '')) {
        include "./includes/users/userInfo.inc.php";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penang</title>

    <!-- CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/profile.css">


    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</head>
<body>
    <nav class="row border d-flex align-items-center">
        <div class="logo col-2 border text-uppercase ">
            <a href="./index.php">Travel</a>
        </div>
        <div class="links col-8 border" >
            <a href="./index.php" class="mx-4">Home</a>
            <a href="" class="mx-4">About us</a>
            <a href="./upload.php" class="mx-4">Upload</a>
        </div>
        <div class="account col-2 border d-flex justify-content-end">
            <?php
                if (isset($_SESSION['username'])) {

            ?>
                    <div class="nav-profile d-flex">
                        <img class="profile-image" <?= empty($loggedInProfileImageUrl) ? 'src="./uploads/userProfilePic/IMG-60f2a53cf1b7e8.11118489.jpg"' : 'src="./uploads/userProfilePic/'.$loggedInProfileImageUrl.'"'; ?>>
                        <a href="./userAccountProfile.php"><h5>Hi, <?php echo $_SESSION['username'];?></h5></a>
                        <button id="logout-button">Logout</button>
                    </div>
            <?php        
                }
                else {
            ?>
                    <button><a href="./login.php">Login</a></button>
                    <button><a href="./register.php">Register</a></button>

            <?php        

                }
            ?>


        </div>
    </nav>



    <script>
    $("#logout-button").click(function(e) {
        var action = 'logout';
        console.log("Submitted");
        $.ajax({
            type: "POST",
            url: "./includes/users/userAccountAction.inc.php",
            data: {action:action},
            success:function() {
                location.reload();

            }

        });
        e.preventDefault();
    });
</script>