<?php
session_start();
require_once '../src/db.php';
require_once '../src/functions.php';
redirectIfNotLoggedIn();

$error='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $type=$_POST['type'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $user_id=$_SESSION['user_id'];

    $stmt=$mysqli->prepare("INSERT INTO posts(user_id,type,title,content) VALUES(?,?,?,?)");
    $stmt->bind_param("isss",$user_id,$type,$title,$content);
    $stmt->execute();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Submit Post</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Submit Prayer/Testimony</h2>
<form method="POST">
<select name="type" required>
<option value="prayer">Prayer Request</option>
<option value="testimony">Testimony</option>
</select>
<input type="text" name="title" placeholder="Title" required>
<textarea name="content" placeholder="Content" required></textarea>
<button type="submit">Submit</button>
</form>
<a href="index.php">Back to Dashboard</a>
</div>
</body>
</html>
