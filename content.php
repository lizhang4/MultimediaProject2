<?php
    include_once "header.php";
    include "./includes/contentInfo.inc.php";
?>

<?php
    // $query = "SELECT * FROM contents_likes WHERE contents= '$postId' ";
    // $result = mysqli_query($conn, $query);
    // $likes = mysqli_num_rows($result);
    include "./includes/users/userInfo.inc.php";

    
    $query = "SELECT
                contents_likes.users
                FROM contents_likes
                WHERE contents = '$postId'";

    $result = mysqli_query($conn, $query);
    while($rows = $result->fetch_object()) {
        $likes[] = $rows;
    }

    function checkIfUserLiked($loggedInId,$likes) {
        foreach ($likes as $liked_user) {
            if ($liked_user->users == $loggedInId) {
                return "liked";

            }
        }
        return "";
        // if (in_array($loggedInId ,$likes)) {
        //     return "liked";
        // }
        // else {
        //     return "";
        // }
    }
    
    
?>

<section class="content-container row">
    <div class="col-12 col-lg-6  order-1 order-lg-0 info-container">
        <h1><?=$postName?></h1>
        <div class="sub-title-container d-flex justify-content-between">
            <h2 class="d-flex flex-column">Country<span>Malaysia</span></h2>
            <h2 class="d-flex flex-column">Region<span>Penang</span></h2>
            <h2 class="d-flex flex-column">Since<span><?=$postHistoricalDate?></span></h2>
        </div>
        <div class="info">
            <h2>Info</h2>
            <p><?=$postInfo?></p>
        </div>
        
        <div class="like-container d-flex justify-content-start align-items-center">
            
            <button class="fas fa-heart m-0 p-0 like <?=checkIfUserLiked($loggedInId, $likes)?>" value = "<?= $postId ?>" onclick="clickLike(<?= $postId ?>)"></button>
            <p class="m-0 p-0 mx-3"><?=!empty($likes) ? count($likes) : ""?></p>
          

        </div>
    </div>
    <div class="col-12 col-lg-6 order-0 order-lg-1 img d-flex justify-content-end">
        <img src="./uploads/<?=$postImage?>" alt="" class="px-lg-3">
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