<?php
session_start();
require_once '../src/db.php';
require_once '../src/functions.php';
redirectIfNotLoggedIn();

// Fetch all posts
$posts=$mysqli->query("SELECT p.*, u.name FROM posts p JOIN users u ON p.user_id=u.id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Prayer & Testimony Board</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
<a href="logout.php">Logout</a> | <a href="submit_post.php">Submit Prayer/Testimony</a>
<hr>
<?php while($row=$posts->fetch_assoc()): ?>
<div class="post">
<h3><?php echo ucfirst($row['type']).": ".$row['title']; ?></h3>
<p><?php echo $row['content']; ?></p>
<p><small>By <?php echo $row['name']; ?> | Status: <span id="status-<?php echo $row['id']; ?>"><?php echo $row['status']; ?></span></small></p>
<?php if($row['type']=='prayer' && $row['status']=='pending'): ?>
<button class="mark-answered" data-id="<?php echo $row['id']; ?>">Mark as Answered</button>
<?php endif; ?>
<hr>
</div>
<?php endwhile; ?>
</div>
<script src="script.js"></script>
</body>
</html>
