<?php


if(isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["uid"];
    $passWord = $_POST["pwd"];
    $passwordRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $userName, $passWord, $passwordRepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($userName) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($passWord,$passwordRepeat) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(uidExists($conn, $userName, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $userName, $passWord);

}
else{
    header("location: ../signup.php");
    exit();
}