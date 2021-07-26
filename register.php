<?php
    include_once "header.php";
?>



<!-- Registration form section -->
<form id="registrationForm" class="register-container d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
    <div class="box d-flex flex-column justify-content-center align-items-center">
        <h1 class=" text-center my-4">Register</h1>
        
        <div class="mb-3">
            <input class="form-control" id="username" name="usernameR" placeholder="Username">
            <p class="error-text m-0 p-0"></p>

        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="password" name="passwordR" placeholder="Password">
            <p class="error-text m-0 p-0"></p>

        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="repassword" name="repasswordR"  placeholder="Repeat Password">
            <p class="error-text m-0 p-0"></p>

        </div>
    
        <div class="mb-3 gender d-flex flex-column">
            <select name="genderR" id="gender">
                <option value="" disabled selected>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <p class="error-text m-0 p-0"></p>

        </div>

        <div class="mb-3 d-flex flex-column">
            <textarea name="shortSummaryR" id="shortSummary" cols="50" rows="10" placeholder="Short Summary within 100 words"></textarea>
            <p class="error-text m-0 p-0"></p>
        </div>

    
        <button type="submit" class="btn btn-primary mb-3" name="register">Register</button>
        <p class="mb-4">Already register? <a href="./login.php">Log in Here!</a></p>

    </div>
</form>

<!-- End Registration form section -->





<!-- Registration form script -->
<script>
    let username = $("#username");
    let password = $("#password");
    let repassword = $("#repassword");
    let gender = ($("#gender"));
    let shortSummary = $("#shortSummary");

    // This function is to reset the errors on the form when user is going to submit again
    function resetRegisterErrors() {
        username.next().html("");
        username.next().removeClass("error-shake");
        password.next().html("");
        password.next().removeClass("error-shake");
        repassword.next().html("");
        repassword.next().removeClass("error-shake");
        gender.next().html("");
        gender.next().removeClass("error-shake");
        shortSummary.next().html("");
        shortSummary.next().removeClass("error-shake");
    }

    // This function will validate the register info be fore submiting
    function loginErrorHandler() {
        resetRegisterErrors();

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

        if (repassword.val() == "") {
            repassword.next().html("Cannot leave repeat password blank!")
            repassword.next().addClass("error-shake");
            bool = false;
        }

        if (password.val() != repassword.val()) {
            password.next().html("Password doesn't match")
            password.next().addClass("error-shake");
            repassword.next().html("Password doesn't match")
            repassword.next().addClass("error-shake");
            bool = false;
        }


        if (gender.val() == null) {
            gender.next().html("Cannot leave gender blank!")
            gender.next().addClass("error-shake");
            bool = false;
        }

        if (shortSummary.val() == "") {
            shortSummary.next().html("Cannot leave short summary blank!")
            shortSummary.next().addClass("error-shake");
            bool = false;
        }

        let shortSummaryWordCount = shortSummary.val().split(' ').length;
        let shortSummaryLetterCount = shortSummary.val().split('').length;
        
        if (shortSummaryLetterCount > 1000) {
            shortSummary.next().html("Too long!")
            shortSummary.next().addClass("error-shake");
            bool = false;

        }

        if(shortSummaryWordCount > 100) {
            shortSummary.next().html("Too long!")
            shortSummary.next().addClass("error-shake");
            bool = false;
        }

        return bool;
    }
    

    // Registration form will be POST with ajax with the code below
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
                        console.log("Submit");
                        if(response == 1) {
                            console.log("Logined");
                            location.replace("./index.php");
                        }
                        else if (response == 2) {
                            username.next().html("Username already exist!")
                            username.next().addClass("error-shake");
                        }
                        else {
                            alert("Error");
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



