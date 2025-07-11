<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("UPDATE users SET status = 'approved' WHERE id = ?");
$stmt->execute([$id]);

header('Location: admin_dashboard.php');
exit;
?>