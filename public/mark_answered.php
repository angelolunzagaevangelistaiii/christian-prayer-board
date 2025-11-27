<?php
session_start();
require_once '../src/db.php';
require_once '../src/functions.php';
redirectIfNotLoggedIn();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=intval($_POST['id']);
    $mysqli->query("UPDATE posts SET status='answered' WHERE id=$id");
    echo "answered";
}
?>