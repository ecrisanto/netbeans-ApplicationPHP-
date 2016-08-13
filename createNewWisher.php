<?php 
/**
 * Database conneection credentials
 */
$dbHost = "localhost"; 
$dbXeHost = "localHost/XE";
$dbUSername = "phpuser";
$dbPassword= "phpuserpw";

/**
 * Other variables
 */
$userNameIsUnique = true;
$passwordIsValid = true;
$userIsEmpty = false;
$passwordIsEmpty = false;
$password2IsEmpty = false;

/**
 * Check thaht the page was requested from itsel via the POST method
 */
if($_SERVER["REQUESTED_METHOD"] == "POST"){
    /**
     * Check wheter the user has filled in the wisher's name in the text field "user"
     */
    if($_POST["user"] == ""){
        $userIsEmpty = true;
    }
}




?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Welcome ! <br>
        <form action="createNewWisher" method="POST">
            Your name: <input type="text" name="user" value="" /><br>
            Password: <input type="password" name="password" value="" /><br>
            Plase confirm your password:<input type="text" name="password2" value="" /><br>
            <input type="submit" value="Register" />
            
        </form>
    </body>
</html>
