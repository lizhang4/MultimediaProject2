<?php
    include "header.php";
    if (!empty($_SESSION['username'])) {
        if ($_SESSION['username'] != 'admin') {
            header("Location: http://localhost/multimediaproject2/index.php");
        }
    }
    include "./includes/read.inc.php";
?>


<!-- This is the page for admin to view uploaded content of the page -->
<!-- Read Table -->
<div class="CRUD-container px-5 d-flex flex-column justify-content-center align-items-center">
    <div class="box read">
        <h1 class="text-center">Read</h1>
        <?php if(isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
        <?php } ?>
        <?php if (mysqli_num_rows($result)) { ?>
        <div class="table-responsive mb-3">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Info</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
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
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="./uploads/contentImg/<?=$rows['image_url']?>" > 
                                    </div>
                                </div>
                            </div>
                            </div>
                        </td>
                        
                        <td>
                            <div class="actions d-flex flex-row">
    
                                <a href="./update.php?id=<?=$rows['id']?>" class="btn btn-success">Update</a>
                                <div class="delete mx-3">
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#del<?=$i?>">Delete</button>
        
                                    <div class="modal fade" id="del<?=$i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3>Are You Sure to Delete this?</h3>
                                                    <a href="./includes/delete.inc.php?id=<?=$rows['id']?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    <?php } ?>
    
                </tbody>
            </table>
        </div>
        <?php } ?>
        <div class="link-right mx-5">
            <a href="./upload.php" class="link-primary">Upload</a>
        </div>
    </div>
</div>

<!-- End Read Table -->


<?php
    include "footer.php";
?>