<?php
    include_once "header.php";
?>




<form id="loginForm" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" id="username" name="usernameL">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="passwordL">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>



<script src="./JS/loginRegister.js"></script>


<script>
    $("#loginForm").submit(function(e) {
        
        if (registrationErrorHandler()) {
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



