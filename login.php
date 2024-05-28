<?php
session_start();
// include the files needed 
include("connection.php");
include("functions.php");

//If the user is trying to login to MatiCare
if(isset($_POST['login'])){
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    
    if(!empty($user_name) && !empty($password)) {
        //select user data from the database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result)>0) {
            // get user data from the database
            $user_data = mysqli_fetch_assoc($result);

            // check if the password matches with the user's password in the database
            if($user_data['password'] === $password) {
                // set cookies and session data if remember me is checked
                if(isset($_POST['remember_me'])){
                    setcookie('user_name',$user_name,time()+(86400 * 30)); //The userrname cookies will be stored for only 30 days
                    setcookie('password',$password,time()+(86400 * 30)); //The password cookies will be stored for only 30 days
                }

                // set session data and redirect to index page
                $user_id = $user_data['user_id'];
                $_SESSION['user_id'] = $user_id;
                header('location:index.php');
                die();
            }
        }
        // if the username or password is incorrect
        else if(($user_data['user_name'] === $user_name && $user_data['password'] != $password) || ($user_data['user_name'] != $user_name && $user_data['password'] === $password)){
            // display an error message and redirect to login page
            echo '<script>alert("Incorrect Username or Password!")</script>';
            header("Refresh:0; url=login.php", true, 303);
        }
    }
    else {
        // if the user did not enter valid information
        echo '<script>alert("Please Enter Valid Information!")</script>';
        header("Refresh: 0; url=login.php", true, 303);
        exit();
    }
}

//Check if cookies are set and retrieve username and password
//The username to the username_cookie variable
//The password to the password_cookie variable
//Lastly, the "status" or "value" of the remember me checkbox to the set_remember variable

$username_cookie = '';
$password_cookie = '';
$set_remember = "";
if(isset($_COOKIE['user_name']) && isset($_COOKIE['password'])){
    $username_cookie = $_COOKIE['user_name'];
    $password_cookie = $_COOKIE['password'];
    $set_remember = "checked = 'checked'";
}
?>


<!DOCTYPE html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Login / Sign Up Form</title>
        <link href="assets/img/favicon.png" rel="icon">
        <link rel="shortcut icon" href="/assets/favicon.ico">
        <link rel="stylesheet" href="LSstyles.css">
    </head>
    <body>
        <div class="container">
            <center>
                <img src="assets\img\MatiCareLogin.png" alt="" height="81.18px" width="340px">
            </center>
            <form method="POST" class="form" id="login">
            <h1 class="form__title">Login</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="Username" name="user_name"
                value = "<?php echo $username_cookie?>">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" placeholder="Password" autofocus name="password" 
                value = "<?php echo $password_cookie?>"/>
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit" name="login" value="Login">Continue</button>
            <br>
            <center>
                <div style="margin-top: 10px;">
                    <input type="checkbox" name="remember_me" id="remember_me" <?php echo $set_remember?>>
                    <label for="remember_me">Remember me</label>
                </div>
            </center>
            <p class="form__text">
                <a class="form__link" href="signup.php">
                    Don't have an account? Create an account
                </a>
            </p>
            </form>                
        </div>
        <script src="LSjs.js"></script>
    </body>
</html>