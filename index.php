

<?php
    include_once "./header.php";
?>

    <section class="hero-image border">
        <div class="title-container px-5 py-2 d-flex justify-content-between align-items-center border">
            <div class="title">
                <h1>Penang</h1>
                <h2>15 Historical Places Available</h2>
            </div>
            <div class="button d-flex align-items-center">
                <h3>Explore More</h3>
                <i class="fas fa-chevron-circle-right"></i>
            </div>
        </div>
    </section>

    <section class="posts my-5 border">
        <div class="upper-row row">
            <div class="col-4 my-5 category text-uppercase text-start">Category</div>
            <div class="col-4 my-5 title text-uppercase text-center">Newest Articles</div>
            <div class="col-4 my-5 search text-uppercase text-end">Search By Keywords</div>
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
                        COUNT(contents_likes.id) AS likes
                
                        FROM contents
                        
                        LEFT JOIN contents_likes
                        ON contents.id = contents_likes.contents
                        
                        LEFT JOIN users
                        ON contents_likes.users = users.id

                        GROUP BY contents.id
                ");

                

                $i=0;

                while($rows = $articlesQuery->fetch_object()) {
                    $articles[] = $rows;

                }
                
            ?>

            <?php foreach( array_reverse($articles) as $article) { ?>
            <div class="post">
                <div class="img">
                    <img src="./uploads/<?=$article->image_url?>" alt="">
                </div>
                <div class="content">
                   <h3 class="text-uppercase">Posted On: 17 July, 2021</h3> 
                   <h1 class="text-uppercase"><?=$article->name?></h1>
                   <p><?=$article->info?></p>
                </div>
                <div class="reaction d-flex justify-content-between">
                    
                        <button class="fas fa-heart" class="like" value = "<?= $article->id ?>" onclick="clickLike(<?= $article->id ?>)"></button>
                        <p><?=$article->likes?></p>
                   
                    <a href="./content.php?id=<?=$article->id?>" class="read-more d-flex justify-content-around align-items-start">
                        <i class="fas fa-align-left border"></i>
                        <h5 class="border">Read More</h5>
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
    </script>

<?php
    include_once "./footer.php";
?>