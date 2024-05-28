<?php 
session_start();
    //include the php files needed
	include("connection.php");
	include("functions.php");

    //check if the user has clicked on the POST button
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        //then something was posted
        //we only take in user_name and password
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        // Check if username already exists in the database
        $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // If the username already exists, display an error message
            echo '<script>alert("Username already exists. Please choose another username.")</script>';
            header("Refresh:0; url=signup.php", true, 303);
        } else if((!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/ ',$user_name)) && (!empty($user_name) && !empty($password) && !is_numeric($user_name))){
            // If the username does not exist, insert the new user into the database
            // Call the random_num function to generate a unique user ID
            $user_id = random_num(20);

            // Insert the new user into the database
            $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";
            mysqli_query($con, $query);

            // Redirect the user to the login page
            header("Location: login.php");
            die;
            }
		else{
            //error handling if the information is invalid
            echo '<script>alert("Please enter some valid information!")</script>';
            header( "Refresh:0; url=signup.php", true, 303);
		}
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
        <div class="container" >
            <center>
            <img src="assets\img\MatiCareLogin.png" alt="" height="81.18px" width="340px">
            </center>
            <form  method="post" class="form" id="login">
                <h1 class="form__title">Create Account</h1>
                <div class="form__message form__message--error"></div>
                <div class="form__input-group">
                    <input type="text" class="form__input" autofocus placeholder="Username" name="user_name">
                    <div class="form__input-error-message"></div>
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" autofocus placeholder="Password" name="password">
                    <div class="form__input-error-message"></div>
                </div>
                <button class="form__button" type="submit" value="Signup">Continue</button>
                <p class="form__text">
                    <a class="form__link" href="login.php" id="linkLogin">Already have an account? Login</a>
                </p>
            </form>
        </div>
        <script src="LSjs.js"></script>
    </body>
</html> 