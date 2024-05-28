<?php
//$length is the maximum number of the user_id
function random_num($length){
    $text = "";
    if($length < 5){
        $length = 5;
    }

    $len = rand(4, $length);

    //This will ensure that our user_id is unique and/or will have different length.
    for($i=0; $i < $len; $i++){
        $text .= rand(0, 9);
    }

    return $text;
}

//This function will retrieve the user's username even if the user did not check the remember me checkbox
function get_user_name($con, $user_id) {
    $query = "SELECT user_name FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    return $user_data['user_name'];
}
