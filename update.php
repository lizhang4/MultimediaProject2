<?php
    include "./includes/update.inc.php";

?>

<?php
    include "header.php";
?>

<!-- Create Form -->
<div class="CRUD-container border">
    <h4 class="display-4 text-center">Update</h4><hr><br>
    <form  action="./includes/update.inc.php" method="POST" enctype="multipart/form-data">
        <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>

        <div class="mb-3">
            <label for="contentName" class="form-label">Name</label>
            <input class="form-control" id="contentName" name="name" value="<?=$row['name']?>">
        </div>
        <div class="mb-3">
            <label for="contentDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="contentDate" name="date" value="<?=$row['date']?>">
        </div>
        <div class="mb-3">
            <label for="contentInfo" class="form-label">Info</label>
            <textarea class="form-control" id="contentInfo" rows="7" name="info" value="<?=$row['info']?>"></textarea>
        </div>

        <div class="mb-3">
            <input type="file" name="image" >
        </div>
    

        <input type="text" name="id" value="<?=$row['id']?>" hidden>
    
        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <a href="./read.php" class="link-primary">View</a>
    </form>
</div>

<!-- End Create Form -->









<?php
    include "footer.php";
?>