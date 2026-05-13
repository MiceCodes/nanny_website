<?php
session_start();
include 'db.php';

$stmt = $pdo->query("SELECT * FROM users WHERE role='Nanny'");
$nannies = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Nannies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Available Nannies</h2>

    <div class="row">
        <?php foreach($nannies as $nanny): ?>
        <div class="col-md-4">
            <div class="card p-3 mb-3">
                <h4><?php echo $nanny['fullname']; ?></h4>
                <p><?php echo $nanny['email']; ?></p>

                <a href="book_nanny.php?id=<?php echo $nanny['userid']; ?>" class="btn btn-success">Book Nanny</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
