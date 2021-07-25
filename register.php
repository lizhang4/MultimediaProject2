<?php
    include_once "header.php";
?>




<form id="registrationForm" class="register-container d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
<div class="box d-flex flex-column justify-content-center align-items-center">
        <h1 class=" text-center my-4">Register</h1>
        
            <div class="mb-3">
                <!-- <label for="username" class="form-label">Username</label> -->
                <input class="form-control" id="username" name="usernameR" placeholder="Username">
            </div>
            <div class="mb-3">
                <!-- <label for="password" class="form-label">Password</label> -->
                <input type="text" class="form-control" id="password" name="passwordR" placeholder="Password">
            </div>
            <div class="mb-3">
                <!-- <label for="repassword" class="form-label">Repeat Password</label> -->
                <input type="text" class="form-control" id="repassword" name="repasswordR"  placeholder="Repeat Password">
            </div>
        
            <div class="mb-3 gender">
                <label for="gender" class="form-label">Gender</label>
                <select name="genderR" id="gender" >
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="mb-3 d-flex flex-column">
                <!-- <label for="shortSummary" class="form-label">Short Summary</label> -->
                <textarea name="shortSummaryR" id="shortSummary" cols="50" rows="10" placeholder="Short Summary"></textarea>
            </div>

        
            <button type="submit" class="btn btn-primary mb-3" name="register">Register</button>
            <p class="mb-4">Already register? <a href="./login.php">Log in Here!</a></p>

    </div>
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



