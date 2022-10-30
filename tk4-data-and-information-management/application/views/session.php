<?php

//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['LOGIN_username']) || (trim($_SESSION['LOGIN_username']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['LOGIN_username'];
?>