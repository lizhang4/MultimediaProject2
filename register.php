<?php
    include_once "header.php";
?>




<form id="registrationForm" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input class="form-control" id="username" name="usernameR">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="text" class="form-control" id="password" name="passwordR">
    </div>
    <div class="mb-3">
        <label for="repassword" class="form-label">Repeat Password</label>
        <input type="text" class="form-control" id="repassword" name="repasswordR" >
    </div>

    <div class="mb-3">
        <label for="profileImage" class="form-label w-100">Profile Image</label>
        <input type="file" id="profileImage" name="profileImageR" >
    </div>
    
    <button type="submit" class="btn btn-primary" name="register">Register</button>
</form>



<script src="./JS/loginRegister.js"></script>


<script>
    $("#registrationForm").submit(function(e) {
        
        if (registrationErrorHandler()) {
            var form = $(this);
            var formData = new FormData($("#registrationForm")[0]);
            console.log(formData);

            // console.log($("#registrationForm").serialize())
            $.ajax({
                type: "POST",
                url: "./includes/users/userAccountAction.inc.php",
                processData: false,
                contentType: false,
                data: formData,
                success:function(data) {
                    console.log("Submit");
                    console.log(data);

                    if(data == 1) {
                        console.log("Registered");
                        // location.replace("./index.php");
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



