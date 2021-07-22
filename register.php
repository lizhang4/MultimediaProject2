<?php
    include_once "header.php";
?>




<form id="registrationForm"  enctype="multipart/form-data">
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
        <label for="gender" class="form-label">Gender</label>
        <select name="genderR" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="shortSummary" class="form-label">Short Summary</label>
        <textarea name="shortSummaryR" id="shortSummary" cols="80" rows="10"></textarea>
    </div>

    <!-- <div class="mb-3">
        <label for="profileImage" class="form-label w-100">Profile Image</label>
        <input type="file" id="profileImage" name="profileImageR" >
    </div> -->
    
    <button type="submit" class="btn btn-primary" name="register">Register</button>
</form>



<script src="./JS/loginRegister.js"></script>


<script>
    $(document).ready(function(e){
        $("#registrationForm").submit(function(e) {
            
            if (loginErrorHandler()) {
    
                $.ajax({
                    type: "POST",
                    url: "./includes/users/userAccountAction.inc.php",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response);
                        console.log("Submit");
                        if(response == 1) {
                            console.log("Logined");
                            location.replace("./index.php");
                        }
                        else if (response == 2) {
                            alert("already exist");
                        }
                        else {
                            alert("Else");
                        }
    
    
    
    
    
                    }
    
                });
            }
            e.preventDefault();

    
    
        });



    });




</script>




<?php
    include_once "footer.php";
?>



