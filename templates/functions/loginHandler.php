<?php

class loginHandle
{
    // Display the appropriate text fields for login / register
    public function display_login() 
    {
        $isLogin = isset($_GET['login']);
        $isRegister = isset($_GET['register']);

        if ($isLogin || $isRegister) 
        {
            echo $isLogin ? "<h3>Login</h3>" : "<h3>Register</h3>";
            echo "<small>Please fill in all the fields</small>";
            if ($isLogin) 
            {
                echo "<form action='login.php?login' method='post'>
                <label for='username'>Username:</label><input type='text' name='username' id='username'>
                <label for='password'>Password:</label><input type='password' name='password' id='password'>
                <div id='error-list'></div>
                <div id='submit-button'><button type='submit' name='button'>Log In</button></div>
                </form>";
            }
            else if ($isRegister) 
            {
                echo "<form action='login.php?register' method='post'>
                <label for='email'>Email:</label><input type='email' name='email' id='email'>
                <label for='name'>Name:</label><input type='text' name='name' id='name'>
                <label for='username'>Username:</label><input type='text' name='username' id='username'>
                <label for='password'>Password:</label><input type='password' name='password' id='password'>
                <div id='error-list'></div>
                <div id='submit-button'><button type='submit' name='button'>Sign Up</button></div>
                </form>";
            }
        } 
        else {
            // If not query string redirect to 404.php
            header("location: 404.php");
        }
    }

    // Display the second container below the first one
    public function display_second_container()
    {
        $isLogin = isset($_GET['login']);
        $isRegister = isset($_GET['register']);

        if ($isLogin)
        {
            echo "<div class='container'>
            <div class='third-container'>
            <small>Don't have an account? <a href='login.php?register'>Register</a></small>
            </div></div>";
        }
        else if ($isRegister) 
        {
            echo "<div class='container'>
            <div class='third-container'>
            <small>Have an account already? <a href='login.php?login'>Log In</a></small>
            </div></div>";
        }
    }
	
	// Check if email exists in the database
	public function isEmailExists($email)
	{
		global $pdo;
		try 
		{
			$query = $pdo->prepare('SELECT email FROM credentials WHERE email = :email');
			$query->bindParam(":email", $email);
			$query->execute();
			$res = $query->fetch();
			if ($res) {
				return true;
			}
			else {
				return false;
			}
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}
	}

    // Register handler with validation
    public function register_handler() 
    {
        global $pdo;
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['register']))
        {
            if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']))
            {
                // Server-Side Validation
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // Email validation
                    return "<p id='failed'>Invalid email address.</p>";
                }
                else if (ctype_alnum($_POST['username']) == false) { // Check if only numbers or characters
                    return "<p id='failed'>Your username must consist of letters or digits</p>";
                }
                else if (strlen($_POST['username']) < 2) { // Username min length 2
                    return "<p id='failed'>Your username must be at least 2 characters long</p>";
                }
                else if (strlen($_POST['password']) < 5) { // Password min length 5
                    return "<p id='failed'>Your password must be at least 5 characters long</p>";
                }
				
				$email = trim($_POST['email']);
				
				if ($this->isEmailExists($email) == true) {
					return "<p id='failed'>Email already used</p>";
				}
				
                try 
                {
                    $date = date('Y-m-d');
                    $name = trim($_POST['name']);
                    $username = trim($_POST['username']);
                    $password = trim($_POST['password']);
                    $query = $pdo->prepare('INSERT INTO credentials (email, name, username, password, date_registered) VALUES (:email, :name, :username, :password, :registerdate)');
                    $query->bindParam(":email", $email); //Sanitize userinput
                    $query->bindParam(":name", $name);
                    $query->bindParam(":username", $username);
                    $query->bindParam(":password", $password);
                    $query->bindParam(":registerdate", $date);
                    $res = $query->execute();
                    if ($res) {
                        return "<p id='success'>Your account has been created</p>";
                    }
                    else {
                        return "<p id='failed'>Cannot register at the moment</p>";
                    }
                }
                catch (PDOException $e)
                {
                    die($e->getMessage());
                }
            }
            else {
                return "<p id='failed'>You must fill all the fields</p>";
            }
        }
    }

    // Login handler with validation
    public function login_handler() {
        global $pdo;
        global $session;
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['login']))
        {
            if (isset($_POST['username']) && isset($_POST['password']))
            {
                // Server-Side Validation
                if (ctype_alnum($_POST['username']) == false) { // Check if only numbers or characters
                    return "<p id='failed'>Your username must consist of letters or digits</p>";
                }

                try {
                    $query = $pdo->prepare('SELECT * FROM credentials WHERE username = :username');
                    $query->bindParam(":username", $_POST['username']);
                    $query->execute();
                    $res = $query->fetch();
                    if ($res) {
                        if ($_POST['password'] == $res['password'])
                        {
                            $_SESSION["id"] = $res["ID"];
                            $_SESSION["email"] = $res["email"];
                            $_SESSION["name"] = $res["name"];
                            $_SESSION["username"] = $res["username"];
                            $_SESSION["date_registered"] = $res["date_registered"];
                            $_SESSION["loggedin"] = true;
                            $session = new sessionHandle();
                            $session->proceedToLogin();
                        }
                        else {
                            return "<p id='failed'>Your password is not valid</p>";
                        }
                    }
                    else {
                        return "<p id='failed'>User not found</p>";
                    }
                }
                catch (PDOException $e)
                {
                    die($e->getMessage());
                }
            }
            else {
                return "<p id='failed'>You must fill all the fields</p>";
            }
        }
    }

    // Get which validation file needed
    public function validate()
    {
        $isLogin = isset($_GET['login']);
        $isRegister = isset($_GET['register']);

        if ($isLogin) {
            echo "<script src='src/loginValidation.js'></script>";
        }
        else if ($isRegister) {
            echo "<script src='src/registerValidation.js'></script>";
        }
    }

    // Display the status of login/register and call the login/register function
    public function status()
    {
        global $login;
        $isLogin = isset($_GET['login']);
        $isRegister = isset($_GET['register']);

        if ($isLogin) {
            echo $login->login_handler();
        }
        else if ($isRegister) {
            echo $login->register_handler();
        }
    }

    // Display the title
    public function title()
    {
        $isLogin = isset($_GET['login']);
        $isRegister = isset($_GET['register']);

        if ($isLogin) {
            echo "Showoff - Login";
        }
        else if ($isRegister) {
            echo "Showoff - Register";
        }
    }

    // Logout
    public function logout()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            if (isset($_POST['logout']))
            {
                session_unset();
                session_destroy();
                header("location: ./login.php?login");
            }
        }
    }
}