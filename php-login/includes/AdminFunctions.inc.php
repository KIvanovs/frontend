<?php

function aidExists($conn, $usernameA) {
    $sql = "SELECT * FROM adminlogin WHERE aldomgiinnN = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../aldomgiinn.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $usernameA);
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
function emtpyInputaldomgiinn($usernameA, $pwdA){
    //$result;
    if (empty ($usernameA) || empty ($pwdA)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginaldomgiinn($conn, $usernameA, $pwdA){
    $uidExists = aidExists($conn, $usernameA);

    if ($uidExists === false) {
        header("location: ../aldomgiinn.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["aldomgiinnP"];
    $checkPwd = password_verify($pwdA, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../aldomgiinn.php?error=wrongpassword");
        exit();
    }
    elseif($checkPwd === true){
        session_start();
        $_SESSION["adminId"] = $uidExists["aldomgiinnId"];
        $_SESSION["adminN"] = $uidExists["aldomgiinnN"];
        header("location: ../index.php");
        exit();
    }

}
