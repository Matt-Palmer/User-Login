<link rel="stylesheet" href="css/style.css">
<?php

include "includes/db-connection.php";

function createUser(){

    global $connection;

    if(isset($_POST['submit'])){

        $firstName = $_POST['first-name'];
        $lastName = $_POST['last-name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        $validateUser = validateUser($firstName, $lastName, $username, $password, $confirmPassword);

        if (!$validateUser){

            $hashFormat = "$2a$07$";
            $salt = "usesomesillystringforsalt";
            $hashAndSalt = $hashFormat . $salt;

            $hashedPassword = crypt($password, $hashAndSalt);

            $query = "INSERT INTO users(firstName, lastName, username, password) VALUES ('$firstName', '$lastName', '$username', '$hashedPassword')";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die('Query Failed' . msqli_error($connection));
            }else{
                echo "<h3>User Created</h3>";

                $_POST['first-name'] = "";
                $_POST['last-name'] = "";
                $_POST['username'] = "";
            }
            
        }else{
            echo "<div class='error-container'>" . $validateUser . "</div>";
        }
    }
}

function validateUser($firstName, $lastName, $username, $password, $confirmPassword){

        global $connection;

        $firstName = $firstName;
        $lastName = $lastName;
        $username = $username;
        $password = $password;
        $confirmPassword = $confirmPassword;
        
        $duplicateUsernameCheck = "SELECT username FROM users WHERE username = '$username'"; 
        $result = mysqli_query($connection, $duplicateUsernameCheck);

        $error = "";

        if($firstName == ""){
            $error .= "<span>You must enter your First name</span><br>"; 
        }

        if($lastName == ""){
            $error .= "<span>You must enter your Last name</span><br>"; 
        }

        if($username == ""){
            $error .= "<span>You must enter a Username</span><br>"; 
        }

        if($result){
            if(mysqli_num_rows($result) >= 1){
                $error .= "<span>Username has already been taken</span><br>";
            }
        }
            
        if($password == ""){
            $error .= "<span>You must enter a Password</span><br>"; 
        }
        
        if($confirmPassword == ""){
            $error .= "<span>You must confirm your password</span><br>"; 
        }

        if($password != "" && $confirmPassword != ""){
            if($confirmPassword != $password){
                $error .= "<span>Your passwords do not match</span><br>";
            } 
        }

        if($error){
            return $error;
        }else{
            return false;
        }
}


?>