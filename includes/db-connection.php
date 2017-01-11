<?php

$connection = mysqli_connect("localhost", "root", "", "userlogin");

if(!$connection){
    echo "could not connect to the database";
}

?>