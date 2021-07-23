<?php
    include "header.php";
?>

<div class="profile-section d-flex justify-content-center align-items-center">

    <section class="profile-image d-flex justify-content-center mx-3">
        <div class="img" >
            <img <?= empty($loggedInProfileImageUrl) ? 'src="./uploads/userProfilePic/IMG-60f2a53cf1b7e8.11118489.jpg"' : 'src="./uploads/userProfilePic/'.$loggedInProfileImageUrl.'"'; ?>>
            <form action="./includes/users/userAccountUpdate.inc.php" id="profileImageForm" method="POST" enctype="multipart/form-data">
                <label for="profileImageUpload" id="labelProfileImage" class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-pen"></i>
                </label>
                <input hidden type="file" id="profileImageUpload" name="profileImage">
                <button hidden type="submit" name="updateProfileImage" id="updateProfileImageButton">updateProfileImage</button>
            </form>
            <!-- <button class="btn btn-primary">Update Image</button> -->
        </div>
        
    </section>
    
    <section class="profile-info mx-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Username</th>
                    <td><?=$loggedInUsername?></td>
                </tr>
                <tr>
                    <th scope="row">Gender</th>
                    <td><?=$loggedInGender?></td>
                </tr>
                <tr>
                    <th scope="row">Short Summary</th>
                    <td><?=$loggedInShortSummary?></td>
                    <!-- <form action="">
                        <label for="profileImageUpload" id="labelProfileImage" class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-pen"></i>
                        </label>
                        <input hidden type="file" id="profileImageUpload" name="profileImage">
                        <button hidden type="submit" name="updateProfileImage" id="updateProfileImageButton">updateProfileImage</button>
                    </form> -->
                </tr>
            </tbody>
        </table>
        <section class="delete-account">
            <form action="./includes/users/userAccountAction.inc.php" method="POST">
                <button type="submit" class="btn btn-danger" name="deleteAccount">Delete Account</button>
            </form>
        </section>
    </section>
    
</div>


<script>
    $("#profileImageUpload").change(function() {
        $("#updateProfileImageButton").click();
    })

</script>


<?php
    include "footer.php";
?>