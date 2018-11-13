<?php 
    session_start();
    $conn = new mysqli("localhost","root","BbilkB414148","db_edu");
    $conn->set_charset("utf8");
    if ($conn->connect_errno) {
        die("Connect Error".$conn->connect_error);
    }
?>