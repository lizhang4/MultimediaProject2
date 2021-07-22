<?php
    include_once "header.php";
    include "./includes/contentInfo.inc.php";
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
            <i class="fas fa-heart"></i>
        </div>
    </div>
    <div class="col-6 img ">
        <img src="./uploads/<?=$postImage?>" alt="">
    </div>


</section>




<?php
    include_once "footer.php";
?>