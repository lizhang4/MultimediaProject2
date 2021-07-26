<?php
    include "header.php";
    if (!empty($_SESSION['username'])) {
        if ($_SESSION['username'] != 'admin') {
            header("Location: http://localhost/multimediaproject2/index.php");
        }
    }

?>

<!-- Create Form -->
<div class="CRUD-container px-5 d-flex flex-column justify-content-center align-items-center">
    <div class="box d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-center mb-3">Create</h1>
        <form  action="./includes/create.inc.php" method="POST" enctype="multipart/form-data">
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>
    
            <div class="mb-3">
                <input class="form-control" id="contentName" name="name" placeholder="Name">
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" id="contentDate" name="date" placeholder="Year">
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="contentInfo" rows="7" name="info" placeholder="Info"></textarea>
            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="image" class="form-label">Upload Image</label>
                <input hidden type="file" name="image" id="image" >
            </div>
            <div class="buttons d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary px-3" name="create">Create</button>
                <a href="./read.php" class="link-primary mx-3">View</a>
            </div>
        </form>
    </div>
</div>

<!-- End Create Form -->

<script>
    $("#image").change(function() {
        let fileName = $('#image')[0].files[0].name;
        $(this).prev('label').text(fileName);
    });


</script>







<?php
    include "footer.php";
?>