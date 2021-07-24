

<?php
    include_once "./header.php";
?>

    <section class="hero-image border">
        <div class="title-container px-5 py-2 d-flex flex-column flex-md-row justify-content-between align-items-center border">
            <div class="title">
                <h1 class="d-flex justify-content-center justify-content-md-start">Penang</h1>
                <h2 class="d-flex justify-content-center justify-content-md-start">Historical Places</h2>
            </div>
            <div class="button d-flex align-items-center">
                <a href="./index.php#posts" class=" my-3 d-none d-md-flex justify-content-end align-items-center">
                    <h3 class="px-3">Explore More</h3>
                    <i class="fas fa-chevron-circle-right p-0" style="font-size: 3.2rem;"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="posts" id="posts">
        <div class="upper-row row d-flex align-items-center">
            <div class="col-9 my-5 title text-uppercase text-start">Newest Articles</div>
            <div class="col-3 my-5 search d-flex justify-content-end align-items-center">
                <form action="" class="d-flex justify-content-end">
                    <input id="searchInput" type="text" placeholder="Search By Keywords">
                    <button><i class="fas fa-search"></i></button>
                </form>
                <!-- <div class="text-uppercase text-end">Search By Keywords</div> -->

            </div>
        </div>
        <div class="lower-row">
            <?php
                include "./includes/db.inc.php";

                $articlesQuery = $conn->query(
                    "SELECT 
                        contents.id,
                        contents.image_url,
                        contents.name,
                        contents.date,
                        contents.info,
                        COUNT(contents_likes.id) AS likes,
                        GROUP_CONCAT(users.username SEPARATOR '|') AS liked_by
                
                        FROM contents
                        
                        LEFT JOIN contents_likes
                        ON contents.id = contents_likes.contents
                        
                        LEFT JOIN users
                        ON contents_likes.users = users.id

                        GROUP BY contents.id
                ");



                

                $i=0;

                function trimStrLength($originalString) {
                    $string = strip_tags($originalString);
                    if (strlen($string) > 200) {
                        $stringCut = substr($string, 0, 500);
                        $endPoint = strrpos($stringCut, ' ');

                        $string = $endPoint ? substr($stringCut, 0 , $endPoint) : substr($stringCut, 0);
                        $string .= '...';
                        return $string;
                    }
                }

                

                while($rows = $articlesQuery->fetch_object()) {
                    $rows->liked_by = $rows->liked_by ? explode('|', $rows->liked_by) : [];
                    $articles[] = $rows;

                }

                function checkIfUserLiked($liked_by) {
                    if (in_array( $_SESSION['username'],$liked_by)) {
                        return "liked";
                    }
                    else {
                        return "";
                    }
                }
                
            ?>

            <?php foreach( array_reverse($articles) as $article) { ?>
            <div class="post" search-filter="<?=$article->name?>">
                <div class="img">
                    <img src="./uploads/<?=$article->image_url?>" alt="">
                </div>
                <div class="content">
                   <h3 class="text-uppercase">Posted On: 17 July, 2021</h3> 
                   <h1 class="text-uppercase"><?=$article->name?></h1>
                   <p><?=trimStrLength($article->info)?></p>
                </div>
                <div class="reaction d-flex justify-content-between align-items-center ">
                    <div class="like-container d-flex justify-content-start align-items-center">
                        <button class="fas fa-heart m-0 p-0 like <?=checkIfUserLiked(($article->liked_by))?>" value = "<?= $article->id ?>" onclick="clickLike(<?= $article->id ?>)"></button>
                        <p class="m-0 p-0 mx-3"><?=!empty($article->likes) ? $article->likes : ""?></p>

                    </div>
                   
                    <a href="./content.php?id=<?=$article->id?>" class="read-more d-flex justify-content-around align-items-center">
                        <i class="fas fa-align-left m-0 p-0 px-2"></i>
                        <h5 class="m-0 p-0 ">Read More</h5>
                    </a>
                </div>
            </div>
            <?php } ?>
            
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

    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".post").filter(function() {
                $(this).toggle($(this).attr("search-filter").toLowerCase().indexOf(value) > -1);
            })
        })
    })
    </script>

<?php
    include_once "./footer.php";
?>