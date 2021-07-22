

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

                $sql = "SELECT * FROM contents ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);

                $i=0;
                while($rows = mysqli_fetch_assoc($result)) {
                    $i++;
                
            ?>


            <div class="post">
                <div class="img">
                    <img src="./uploads/<?=$rows['image_url']?>" alt="">
                </div>
                <div class="content">
                   <h3 class="text-uppercase">Posted On: 17 July, 2021</h3> 
                   <h1 class="text-uppercase"><?=$rows['name']?></h1>
                   <p><?=$rows['info']?></p>
                </div>
                <div class="reaction d-flex justify-content-between">
                    <i class="fas fa-heart"></i>
                    <a href="./content.php?id=<?=$rows['id']?>" class="read-more d-flex justify-content-around align-items-start">
                        <i class="fas fa-align-left border"></i>
                        <h5 class="border">Read More</h5>
                    </a>
                </div>
            </div>
            

            <?php } ?>

        </div>
    </section>

<?php
    include_once "./footer.php";
?>