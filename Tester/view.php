<?php

// include_once('init.php');



// if(isset($_POST['submit'])) {

//     session_start();
//     $username = mysql_real_escape_string($_POST['username']);
//     $password = mysql_real_escape_string($_POST['password']);
//     $password2 = mysql_real_escape_string($_POST['password2']);


//     if($username && $password) {
//         if($password == $password2) {

//             //test hashing password
//             $password = md5($password);
//              // Save to db
//              $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
 
//              $result = $database->query($query);

//             $_SESSION['message'] = "Success!";
//             $_SESSION['username'] = $username;
//             header("location: main.php");
 
//         } else {
//             $_SESSION['message'] = "Password did not match";
//     }

// }