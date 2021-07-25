<?php
    include_once "header.php";
?>




<form id="loginForm" class="login-container d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
    <div class="box d-flex flex-column justify-content-center align-items-center">
        
        <div class="account-img mb-3">
            <i class="fas fa-user-alt"></i>
        </div>
        <h1 class=" text-center mb-4">User Log in</h1>
    
        <div class="mb-3">
            <!-- <label for="username" class="form-label">Username</label> -->
            <input class="form-control" id="username" name="usernameL" placeholder="Username">
        </div>
        <div class="mb-3">
            <!-- <label for="password" class="form-label">Password</label> -->
            <input type="text" class="form-control" id="password" name="passwordL" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mb-3" name="login">Login</button>
        <p>Haven't register? <a href="./register.php">Register Here!</a></p>
    </div>
</form>



<script src="./JS/loginRegister.js"></script>


<script>
    $("#loginForm").submit(function(e) {
        
        if (loginErrorHandler()) {
            $.ajax({
                type: "POST",
                url: "./includes/users/userAccountAction.inc.php",
                data: $("#loginForm").serialize(),
                success:function(data) {
                    console.log("Submit");
                    if(data == 1) {
                        console.log("Logined");
                        location.replace("./index.php");
                    }
                    else if (data == 2) {
                        console.log("Wrong password");
                    }
                    else {
                        console.log("No such data");
                    }





                }

            });
        }
        e.preventDefault();


    });




</script>




<?php
    include_once "footer.php";
?>



