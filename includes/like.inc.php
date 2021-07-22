<?php
    include "./db.inc.php";
    session_start();
    include "./users/userInfo.inc.php";





    
        if(isset($_GET['id'])) {

            $postId = $_GET['id'];
            
            $sql = "SELECT * FROM contents_likes
                        WHERE users = $loggedInId
                        AND contents = $postId
                    ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $sql = "DELETE FROM contents_likes
                            WHERE users = $loggedInId 
                            AND contents = $postId
                        ";
            }
            else {
                $sql = "INSERT INTO contents_likes (users, contents)
                            SELECT {$loggedInId}, {$postId}
                            FROM contents
                            WHERE EXISTS (
                                SELECT id
                                FROM contents
                                WHERE id = {$postId})
                            AND NOT EXISTS (
                                SELECT id
                                FROM contents_likes
                                WHERE users = {$loggedInId}
                                AND contents = {$postId})
                            LIMIT 1
                            
                            ";
            }
            
            
            
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo 1; //success
            }
            else {
                echo 2; //failed
            }
        }
        else {
            echo 2; //failed
        }

        //TODO: Check if success
        // header("Location: ../index.php");