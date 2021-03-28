<?php

class profileHandle
{
    // Get User's ID
    public function get_ID() {
        echo $_SESSION['id'];
    }

    // Get User's Email
    public function get_Email() {
        echo $_SESSION['email'];
    }

    // Get User's Name
    public function get_Name() {
        echo $_SESSION['name'];
    }

    // Get User's Username
    public function get_Username() {
        echo $_SESSION['username'];
    }

    // Get User's Registered Date
    public function get_DateRegistered() {
        echo $_SESSION['date_registered'];
    }

    // Display profile of a user
    public function get_profile() {
        global $pdo;

        if($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            if (isset($_GET['profile'])) 
            {
                try 
                {
                    $query = $pdo->prepare("SELECT * FROM credentials WHERE ID = :id");
                    $query->bindParam(":id", $_GET['profile'], PDO::PARAM_INT);
                    $query->execute();
                    $res = $query->fetch();
                    
                    if ($res) 
                    {
                        echo "<div class='container'>
                        <div class='container-wrapper'>
                        <div id='profile-info-other'>
                        <h1>".$res['name']."</h1>
                        <p>".$res['username']."</p>
                        <p>".$res['email']."</p>
                        </div><h2>Songs</h2><hr>";

                        $query2 = $pdo->prepare("SELECT * FROM posts WHERE user_id = :id");
                        $query2->execute(['id' => $_GET['profile']]);
                        $data = $query2->fetchAll();

                        foreach ($data as $row) {
                            echo "<h4>".$row['title']."</h4><p>".$row['content']."</p>";
                        }
                        echo "</div></div>";
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