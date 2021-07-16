<?php
    include "./includes/read.inc.php";
?>

<?php
    include "header.php";
?>



<!-- Read Table -->
<div class="CRUD-container border">
    <div class="box">
        <h4 class="display-4 text-center">Read</h4><hr><br>
        <?php if(isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <?php if (mysqli_num_rows($result)) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Info</th>
                    <th scope="col">Image_Url</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    while($rows = mysqli_fetch_assoc($result)) {
                        $i++;
                ?>
                    
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$rows['name']?></td>
                    <td><?=$rows['date']?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#info<?=$i?>">
                            Read Info
                        </button>
                        <!-- Info Modal -->
                        <div class="modal fade" id="info<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p><?=$rows['info']?></p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </td>
  
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#img<?=$i?>">
                            View Image
                        </button>
                        <!-- test -->
                        <!-- IMG Modal -->
                        <div class="modal fade" id="img<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="./uploads/<?=$rows['image_url']?>" > 
                                </div>
                            </div>
                        </div>
                        </div>
                    </td>
                    
                    <td>
                        <a href="./update.php?id=<?=$rows['id']?>" class="btn btn-success">Update</a>
                        <a href="./includes/delete.inc.php?id=<?=$rows['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
        <?php } ?>
        <div class="link-right">
            <a href="./upload.php">Upload</a>
        </div>
    </div>
</div>

<!-- End Read Table -->









<?php
    include "footer.php";
?>