<?php
require('db.php');

// ---------------------------------------------------------------------------------
// Similar to the login procedure - tests if the user exists in the database.
// If the search in db returns more than 0, then the username is already being used:
// ---------------------------------------------------------------------------------

if (isset($_POST['username']))
{
	
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($db_con,$username); 
    $email = stripslashes($_POST['email']);
    $email = mysqli_real_escape_string($db_con,$email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($db_con,$password);

    $username_query = "SELECT * FROM users WHERE username = '$username'";
    $checkusername = mysqli_query($db_con,$username_query);

    if (mysqli_num_rows($checkusername)>0)
    {        
        ?>  <link rel="stylesheet" href="css/style.css"/>
            <body class=login_reg_body>
                <div class="login_reg_form">
                    <h1>The username is already in use.</h1>
                    <br>
                    <p><a href='registration.php'>Click here</a> to try again or go to the <a href='login.php'>login-page</a>.</p>
                </div>
            </body>
        <?php 
    }
    else
    
    // ----------------------------------------------------------------------------
    // If the return value is 0, the username is available. So the user credentials
    // gets stored in the database and the user is redirected to the main page:
    // ----------------------------------------------------------------------------
    
    {
    	$hashed_pw = password_hash($password, PASSWORD_DEFAULT);
    	
    	$insert_db_query = "INSERT INTO `users`(`username`,`password`,`email`) VALUES ('$username','$hashed_pw','$email')";
        $store_in_db = mysqli_query($db_con,$insert_db_query);
        
        if($store_in_db)
        {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        }
	}
}

if (!isset($_POST['username']))
{
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Create user</title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body class="body_style">
        <div class="login_reg_form">
            <h1 class="login_reg_h1">Create user</h1>
            <form name="registration" method="post">
                <input type="text" name="username" placeholder="Username" required maxlength="20"/>
                <input type="email" name="email" placeholder="E-mail" required/>
                <input type="password" name="password" placeholder="Password" required minlength="6"/>
                <input type="submit" name="submit" value="Submit"/>
            </form>
            <br>
            <p class="login_reg_p"><a href='login.php'>Back to login.</a></p>
        </div>
    </body>
    </html>
    <?php 
} 
?>