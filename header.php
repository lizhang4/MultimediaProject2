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
    <link rel="stylesheet" href="./CSS/loginSignup.css">


    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</head>
<body>
    <nav class="row d-flex align-items-center">
        <div class="logo col-2 text-uppercase ">
            <a href="./index.php">Penang</a>
        </div>
        <div class="links col-7 " >
            <a href="./index.php" class="mx-4 d-none d-md-inline">Home</a>
            <?php 
                if (!empty($_SESSION['username'])){
                    if($_SESSION['username'] == 'admin')  {?>
                    <a href="./upload.php" class="mx-4 d-none d-md-inline">Upload</a>
            <?php } } ?>
        </div>
        <div class="account col-3 d-flex justify-content-end align-items-center">
            <?php
                if (isset($_SESSION['username'])) {

            ?>
                    <div class="nav-profile d-none d-md-flex align-items-center">
                        <img class="profile-image" <?= empty($loggedInProfileImageUrl) ? 'src="./uploads/userProfilePic/IMG-60f2a53cf1b7e8.11118489.jpg"' : 'src="./uploads/userProfilePic/'.$loggedInProfileImageUrl.'"'; ?>>
                        <a href="./userAccountProfile.php">Hi, <?php echo $_SESSION['username'];?></a>
                        <button class="logout-button" style="padding-left: 20px;"><a href="#">Logout</a></button>
                    </div>
            <?php        
                }
                else {
            ?>
                    <button style="padding: 0 20px;" class="d-none d-md-inline"><a href="./login.php">Login</a></button>
                    <button style="padding-left: 20px;" class="d-none d-md-inline"><a href="./register.php">Register</a></button>

            <?php        

                }
            ?>

            <div class="nav-button d-md-none ">
                <button id="nav-open"><i class="fas fa-bars" style="font-size: 1.5rem;"></i></button>
            </div>


        </div>
        <div class="nav-slide-handler">

            <div class="nav-slide d-flex flex-column justify-content-center align-items-center">
                <a href="./index.php"  class="my-3">Home</a>
                <a href="./upload.php" class="my-3">Upload</a>
    
                <?php
                    if (isset($_SESSION['username'])) {
    
                ?>
                        <button class="my-3 logout-button"><a href="#">Logout</a></button>
                <?php        
                    }
                    else {
                ?>
                        <button class="my-3"><a href="./login.php">Login</a></button>
                        <button class="my-3"><a href="./register.php">Register</a></button>
    
                <?php        
    
                    }
                ?>
            </div>
        </div>
    </nav>



    <script>
    $(".logout-button").click(function(e) {
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


    $(".nav-button").click(function(e) {
        $(".nav-slide-handler").slideToggle();


    });
</script>