<?php
    include "header.php";
?>


<section class="profile-image d-flex justify-content-center">
    <div class="img" >
        <img <?= empty($loggedInProfileImageUrl) ? 'src="./uploads/userProfilePic/IMG-60f2a53cf1b7e8.11118489.jpg"' : 'src="./uploads/userProfilePic/'.$loggedInProfileImageUrl.'"'; ?>>
        <form action="./includes/users/userAccountUpdate.inc.php" id="profileImageForm" method="POST" enctype="multipart/form-data">
            <input type="file" name="profileImage">
            <button type="submit" name="updateProfileImage">updateProfileImage</button>
        </form>
        <!-- <button class="btn btn-primary">Update Image</button> -->
    </div>
    
</section>

<section class="profile-info">
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
            </tr>
        </tbody>
    </table>
</section>

<section class="delete-account">
    <form action="./includes/users/userAccountAction.inc.php" method="POST">
        <button type="submit" class="btn btn-danger" name="deleteAccount">Delete Account</button>
    </form>
</section>





<?php
    include "footer.php";
?>