<?php
    include_once "header.php";
    include "./includes/contentInfo.inc.php";
?>

<?php
    $query = "SELECT * FROM contents_likes WHERE contents= '$postId' ";
    $result = mysqli_query($conn, $query);
    $likes = mysqli_num_rows($result)
    
?>

<section class="content-container row">
    <div class="col-6 info-container">
        <h1><?=$postName?></h1>
        <div class="sub-title-container d-flex ">
            <h2 class="d-flex flex-column">Country<span>Malaysia</span></h2>
            <h2 class="d-flex flex-column">Region<span>Penang</span></h2>
            <h2 class="d-flex flex-column">Since<span><?=$postHistoricalDate?></span></h2>
        </div>
        <div class="info">
            <h2>Info</h2>
            <p><?=$postInfo?></p>
        </div>
        <div class="likes">
            <button class="fas fa-heart" class="like" value = "<?= $postId ?>" onclick="clickLike(<?= $postId ?>)"></button>
            <p><?=$likes?></p>

        </div>
    </div>
    <div class="col-6 img ">
        <img src="./uploads/<?=$postImage?>" alt="">
    </div>


</section>


<script>

    function clickLike(id) {
                
        $.ajax({
            type: "GET",
            url: "./includes/like.inc.php",
            data: jQuery.param({id: id}),
            success: function(response) {
                if(response == 1) {
                    location.reload();
                }
            }

        });
    }
</script>

<?php
    include_once "footer.php";
?>