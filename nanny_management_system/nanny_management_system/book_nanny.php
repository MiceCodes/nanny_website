<?php
session_start();
include 'db.php';

$nannyID = $_GET['id'];
$parentID = $_SESSION['user']['userid'];

if(isset($_POST['book'])){
    $date = $_POST['date'];

    $sql = "INSERT INTO bookings(parentid,nannyid,bookingdate,status) VALUES(?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$parentID,$nannyID,$date,'Pending']);

    $success = "Booking successful.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Nanny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Book Nanny</h2>

    <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <form method="POST">
        <label>Select Date</label>
        <input type="date" name="date" class="form-control mb-3" required>

        <button type="submit" name="book" class="btn btn-primary">Confirm Booking</button>
    </form>
</div>
</body>
</html>
