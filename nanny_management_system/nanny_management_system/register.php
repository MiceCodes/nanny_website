<?php
session_start();
include 'db.php';

if(isset($_POST['register'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users(fullname,email,password,role) VALUES(?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$fullname,$email,$password,$role]);

    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="fullname" class="form-control mb-3" placeholder="Full Name" required>
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

        <select name="role" class="form-control mb-3">
            <option value="Parent">Parent</option>
            <option value="Nanny">Nanny</option>
        </select>

        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
</div>
</body>
</html>
