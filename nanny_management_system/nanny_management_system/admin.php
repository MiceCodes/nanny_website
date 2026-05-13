<?php
session_start();
include 'db.php';

$users = $pdo->query("SELECT * FROM users")->fetchAll();
$bookings = $pdo->query("SELECT * FROM bookings")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1>Admin Panel</h1>

    <h3 class="mt-4">Users</h3>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>

        <?php foreach($users as $user): ?>
        <tr>
            <td><?php echo $user['userid']; ?></td>
            <td><?php echo $user['fullname']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['role']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h3 class="mt-5">Bookings</h3>

    <table class="table table-bordered">
        <tr>
            <th>Booking ID</th>
            <th>Parent ID</th>
            <th>Nanny ID</th>
            <th>Date</th>
            <th>Status</th>
        </tr>

        <?php foreach($bookings as $booking): ?>
        <tr>
            <td><?php echo $booking['bookingid']; ?></td>
            <td><?php echo $booking['parentid']; ?></td>
            <td><?php echo $booking['nannyid']; ?></td>
            <td><?php echo $booking['bookingdate']; ?></td>
            <td><?php echo $booking['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
