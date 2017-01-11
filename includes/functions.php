
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

        $error = "";

        if($firstName == ""){
            $error .= "You must enter your first name<br>"; 
        }

        if($lastName == ""){
            $error .= "You must enter your last name<br>"; 
        }

        if($username == ""){
            $error .= "You must enter a username<br>"; 
        }

        if($password == ""){
            $error .= "You must enter a password<br>"; 
        }
        
        if($confirmPassword == ""){
            $error .= "You must confirm your password<br>"; 
        }

        if($password != "" && $confirmPassword != ""){
            if($confirmPassword != $password){
                $error .= "Your passwords do not match<br>";
            } 
        }


        if ($error){
            echo $error;
        }else{
            $query = "INSERT INTO users(firstName, lastName, username, password) VALUES ('$firstName', '$lastName', '$username', '$password')";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die('Query Failed' . msqli_error($connection));
            }else{
                echo "<h3>User Created</h3>";
            }
        }
        

    }




}


?>