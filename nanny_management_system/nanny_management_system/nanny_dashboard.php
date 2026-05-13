<?php
session_start();
include 'db.php';

$nannyID = $_SESSION['user']['userid'];

$stmt = $pdo->prepare("SELECT * FROM bookings WHERE nannyid=?");
$stmt->execute([$nannyID]);
$bookings = $stmt->fetchAll();

if(isset($_GET['accept'])){
    $id = $_GET['accept'];
    $pdo->query("UPDATE bookings SET status='Accepted' WHERE bookingid=$id");
    header("Location: nanny_dashboard.php");
}

if(isset($_GET['reject'])){
    $id = $_GET['reject'];
    $pdo->query("UPDATE bookings SET status='Rejected' WHERE bookingid=$id");
    header("Location: nanny_dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nanny Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Nanny Dashboard</h2>

    <table class="table table-bordered">
        <tr>
            <th>Booking ID</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php foreach($bookings as $booking): ?>
        <tr>
            <td><?php echo $booking['bookingid']; ?></td>
            <td><?php echo $booking['bookingdate']; ?></td>
            <td><?php echo $booking['status']; ?></td>
            <td>
                <a href="?accept=<?php echo $booking['bookingid']; ?>" class="btn btn-success btn-sm">Accept</a>
                <a href="?reject=<?php echo $booking['bookingid']; ?>" class="btn btn-danger btn-sm">Reject</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
