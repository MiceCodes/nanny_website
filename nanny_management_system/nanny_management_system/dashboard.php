<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Parent Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1>Welcome <?php echo $_SESSION['user']['fullname']; ?></h1>
    <a href="search_nannies.php" class="btn btn-primary mt-3">Search Nannies</a>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</div>
</body>
</html>
