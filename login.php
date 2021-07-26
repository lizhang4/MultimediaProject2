<?php
    include_once "header.php";
?>


<!-- Login form section -->

<form id="loginForm" class="login-container d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
    <div class="box d-flex flex-column justify-content-center align-items-center">
        
        <div class="account-img mb-3">
            <i class="fas fa-user-alt"></i>
        </div>
        <h1 class=" text-center mb-4">User Log in</h1>
    
        <div class="mb-3">
            <input class="form-control" id="username" name="usernameL" placeholder="Username">
            <p class="error-text m-0 p-0"></p>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="password" name="passwordL" placeholder="Password">
            <p class="error-text m-0 p-0"></p>

        </div>
        <button type="submit" class="btn btn-primary mb-3" name="login">Login</button>
        <p>Haven't register? <a href="./register.php">Register Here!</a></p>
    </div>
</form>

<!-- End Login form section -->





<!-- Login form script -->
<script>

    let username = $("#username");
    let password = $("#password");

    
    // This function is to reset the errors on the form when user is going to submit again
    function resetLoginErrors() {
        username.next().html("");
        username.next().removeClass("error-shake");
        password.next().html("");
        password.next().removeClass("error-shake");
    }

    // this function is to validate info from login form
    function loginErrorHandler() {
        
        resetLoginErrors();
        let bool = true;        

        if (username.val() == "") {
            username.next().html("Cannot leave username blank!")
            username.next().addClass("error-shake");
            bool = false;
        }

        if (password.val() == "") {
            password.next().html("Cannot leave password blank!")
            password.next().addClass("error-shake");
            bool = false;

        }

        return bool;
    }


    // POST request to php will be sent here through ajax
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
                        console.log("wrong password");

                        password.next().html("Wrong Password")
                        password.next().addClass("error-shake");
                    }
                    else {
                        console.log("username doesn't exist");
                        username.next().html("Username doesn't exist")
                        username.next().addClass("error-shake");
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



