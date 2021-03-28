<?php

class postHandle 
{
    // Add post to database
    public function post_handler() {
        global $pdo;
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (isset($_POST['title']) && isset($_POST['content'])) 
            {
                // Validation
                if (strlen($_POST['title']) < 2 || strlen($_POST['title']) > 30) {
                    return "<p id='failed'>Title must have between 2 and 30 characters</p>";
                }
                else if (strlen($_POST['content']) < 5 || strlen($_POST['content']) > 255) {
                    return "<p id='failed'>Content must have between 5 and 255 characters</p>";
                }

                try 
                {
                    $zero = 0;
                    $date = date('Y-m-d');
                    $title = trim($_POST['title']); //Sanitize userinput
                    $content = trim($_POST['content']);
                    $query = $pdo->prepare('INSERT INTO posts (title, content, date_posted, user_id, user_name, likes) VALUES (:title, :content, :dateposted, :userid, :username, :likes)');
                    $query->bindParam(":title", $title);
                    $query->bindParam(":content", $content);
                    $query->bindParam(":dateposted", $date);
                    $query->bindParam(":userid", $_SESSION["id"]);
                    $query->bindParam(":username", $_SESSION["username"]);
                    $query->bindParam(":likes", $zero);
                    $res = $query->execute();
                    if ($res) {
                        header("Refresh:0");
                    }
                    else {
                        return "<p id='failed'>Cannot post at the moment</p>";
                    }
                }
                catch (PDOException $e)
                {
                    die($e->getMessage());
                }
            }
        }
    }

    public function displayPosts() {
        global $postContainer;
        global $RECENT_POST_LIMIT;

        // Limit to posts
        $limit = 1;
        foreach ($postContainer as $res)
        {
            echo "<div class='container'>
            <div class='container-wrapper container-color'>
            <div class='post-grid'>
            <div>
            <h1 class='container-title'>".$res["title"]."</h1>
            <p class='post-author'>Posted by: <a href='index.php?profile=".$res["user_id"]."'>".$res["user_name"]."</a></p>
            <p class='post-author'>Date: ".$res["date_posted"]."</p>
            </div>
            <div><p class='post-id'>Post ID: ".$res["PID"]."</p></div>
            <div>".formatPost($res["content"])."</div>
            </div>
            </div>
            <div class='post-interact'>
            <div class='fire-button'>
            <form action='index.php' method='post' name='like'>
            <input type='hidden' name='pid' value='".$res["PID"]."'>
            <button type='submit' name='like' class='fire-button-btn'>🔥Fire - ".$res["likes"]."</button>
            </form></div></div></div>";
            if ($limit++ == $RECENT_POST_LIMIT) {
                break;
            }
        }
    }

    // Get all the posts
    public function get_posts() {
        global $pdo;
        global $postContainer;

        try 
        {
            $query = "SELECT * FROM posts ORDER BY PID DESC";
            $res = $pdo->query($query);

            while ($row = $res->fetch()) {
                array_push($postContainer, $row);
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    // Get all the posts
    public function get_posts_most_likes() {
        global $pdo;
        global $postMostLikesContainer;
        $userlist = [];
        try 
        {
            $query = "SELECT * FROM posts ORDER BY likes DESC";
            $res = $pdo->query($query);
                
            while ($row = $res->fetch()) {
                if(!in_array($row["user_name"], $userlist, true)){
                    array_push($userlist, $row["user_name"]);
                    array_push($postMostLikesContainer, $row);
                }
            }
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function displayTop10Artist() {
        global $postMostLikesContainer;
        global $TOP_ARTIST_LIMIT;

        // Limit to artists displayed
        $limit = 1;
        $badge = "images/user.png";
        $alt = "user icon";

        echo "<div class='container'>
        <div class='container-wrapper'>
        <h1 class='container-title'>Top ".$TOP_ARTIST_LIMIT." Artists</h1>
        <div class='container-grid'>";
        foreach ($postMostLikesContainer as $res)
        {
            if ($limit == 1) {
                $badge = "images/top1.png";
                $alt = "top 1 artist crown icon";
            } else if ($limit == 2) {
                $badge = "images/top2.png";
                $alt = "top 2 artist crown icon";
            } else if ($limit == 3) {
                $badge = "images/top3.png";
                $alt = "top 3 artist chain icon";
            } else {
                $badge = "images/user.png";
                $alt = "user icon";
            }
            $height = rand(10, 15); //Just for the sake of masonry layout
            echo "<div class='container-grid-column' style='height: ".$height."em;'>
            <a href='index.php?profile=".$res["user_id"]."'><div class='top-artist-sub-container'>
            <img src='".$badge."' alt='".$alt."'>
            <p>".$res["user_name"]."</p>
            <p>has garnered ".$res["likes"]." fires in one post</p>
            </div></a>
            </div>";
            if ($limit++ == $TOP_ARTIST_LIMIT) {
                break;
            }
        }
        echo "</div></div></div>";
    }

    // Add likes
    function addLikes() {
        global $pdo;
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (isset($_POST['like']) && isset($_POST['pid'])) 
            {
                try 
                {
                    $query = $pdo->prepare("UPDATE posts SET likes = likes + 1 WHERE PID = :pid");
                    $query->bindParam(":pid", $_POST['pid'], PDO::PARAM_INT);
                    $res = $query->execute();
                    if ($res) {
                        header("Refresh:0");
                    }
                }
                catch (PDOException $e)
                {
                    die($e->getMessage());
                }
            }
        }
    }
}