<?php

function emptyInputSignup($name, $email, $userName, $passWord, $passwordRepeat) {
    $result;
    if(empty($name) || empty($email) || empty($userName) || empty($passWord) || empty($passwordRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
};  

function invalidUid($userName) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};  

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
};  

function pwdMatch($passWord,$passwordRepeat) {
    $result;
    if($passWord !== $passwordRepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
};  

function uidExists($conn, $userName, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

};  

function createUser($conn, $name, $email, $userName, $passWord) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashPwd = password_hash($passWord, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $userName, $hashPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
};  

// Login

function emptyInputLogin($username, $password) {
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
};  

function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];

    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION['userid'] = $uidExists["usersID"];
        $_SESSION['useruid'] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }

}