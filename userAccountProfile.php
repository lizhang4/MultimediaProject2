<?php
    include "header.php";
?>

<!-- Profile Page Section -->
<div class="profile-section d-flex flex-column flex-lg-row justify-content-center align-items-center">

    <section class="profile-image d-flex justify-content-center mx-3">
        <div class="img" >
            <img <?= empty($loggedInProfileImageUrl) ? 'src="./imgs/AccountImage.png"' : 'src="./uploads/userProfilePic/'.$loggedInProfileImageUrl.'"'; ?>>
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
    
    <section class="profile-info mx-md-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Info</th>
                    <th scope="col"></th>
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
                    <td class="d-flex w-100">
                        <?=$loggedInShortSummary?>
                
                    </td>
                </tr>
            </tbody>
        </table>
        
        <section class="edit-account d-flex justify-content-between">
            
            <button type="submit" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal2">Delete Account</button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                            <div class="modal-body d-flex flex-column">
                                <h3 class="text-center">Are you sure to delete?</h3>
                                <form action="./includes/users/userAccountAction.inc.php" method="POST">
                                    <button type="submit" class="btn btn-danger" name="deleteAccount">Delete Account</button>
                                </form>
                            </div>
                    
                    </div>
                </div>
            </div>
            
            <!-- Button trigger modal -->
            <button type="button" class="d-flex align-items-center edit-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit Summary<i class="fas fa-pen py-1"></i>
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        
                        <form class="edit-summary" action="./includes/users/userAccountUpdate.inc.php" method="POST">
                            <div class="modal-body d-flex flex-column">
                                <h3 class="text-center">Update Summary</h3>
                                <textarea name="shortSummary" class="my-3" id="" cols="30" rows="20"><?=$loggedInShortSummary?></textarea>
                                <button type="submit" name="shortSummaryUpdate" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div>

        </section>
    </section>
    
</div>

<!-- End Profile Page Section -->


<script>
    // This script upload the image when image has been selected
    $("#profileImageUpload").change(function() {
        $("#updateProfileImageButton").click();
    })

</script>


<?php
    include "footer.php";
?>