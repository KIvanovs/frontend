<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat){
    //$result;
    if (empty($name) || empty ($email) || empty ($username) || empty ($pwd) || empty ($pwdrepeat)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    //$result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    //$result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    //$result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}




function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");
    exit();
}

function emtyInputLogin($username, $pwd){
    //$result;
    if (empty ($username) || empty ($pwd)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    elseif($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }

}



function emptyInputText($addedtext){
    //$result;
    if (empty ($addedtext)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createText($conn, $addedtext) {
    $sql = "INSERT INTO admintext (textInput) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../addtext.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $addedtext);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../addtext.php?error=none");
    exit();
}


function emtyInputComment($comment){
    //$result;
    if (empty ($comment)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createComment($conn, $username, $comment) {
    $sql = "INSERT INTO commenttb (usersUid, comment) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../addtext.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $comment);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../comment.php?error=none");
    exit();
}


function emtyInputPCname($PCname){
    //$result;
    if (empty ($PCname)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function emtyInputVersion($Version){
    //$result;
    if (empty ($Version)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createPatchnote($conn, $username, $PCname, $Version, $comment) {
    $sql = "INSERT INTO patchnotes (usersUid, PCname, Version, comment) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../addtext.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss",  $username, $PCname, $Version, $comment);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../patchnotes.php?error=none");
    exit();
}






function emtyInputForum($title, $text){
    //$result;
    if (empty ($title) || empty ($text)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createForum($conn, $username, $title, $text) {
    $sql = "INSERT INTO forumlist (useruid, title, text) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../addtext.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $username,  $title, $text);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../forumlist.php?error=none");
    exit();
}

function createFComment($conn, $username, $comment, $id) {
    $sql = "INSERT INTO `forumscomments` (`useruid`, `comment`, `forumId`) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../addtext.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $username, $comment, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../forum.php?error=none");
    exit();
}


//----------








// function emptyInputAdmin( $username, $pwd){
//     //$result;
//     if (empty ($username) || empty ($pwd)) {
//         $result = true;
//     }else{
//         $result = false;
//     }
//     return $result;
// }


// function uidExistsAdmin($conn, $username) {
//     $sql = "SELECT * FROM adminlogin WHERE aldomgiinnN = ?;";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)){
//         header("location: ../adminsign.php?error=stmtfailed");
//         exit();
//     }
//     mysqli_stmt_bind_param($stmt, "s", $username);
//     mysqli_stmt_execute($stmt);

//     $resultData = mysqli_stmt_get_result($stmt);

//     if ($row = mysqli_fetch_assoc($resultData)) {
//         return $row;
//     }else{
//         $result = false;
//         return $result;
//     }

//     mysqli_stmt_close($stmt);
// }

// function createAdmin($conn, $username, $pwd) {
//     $sql = "INSERT INTO adminlogin (aldomgiinnN, password) VALUES (?, ?);";
//     $stmt = mysqli_stmt_init($conn);
//     if(!mysqli_stmt_prepare($stmt, $sql)){
//         header("location: ../adminsign.php?error=stmtfailed");
//         exit();
//     }

//     $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

//     mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPwd);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);

//     header("location: ../adminsign.php?error=none");
//     exit();
// }