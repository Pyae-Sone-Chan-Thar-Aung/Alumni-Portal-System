<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin_dashboard.php');
    } elseif ($_SESSION['role'] === 'alumni') {
        header('Location: dashboard.php');
    }
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Select Login Type</h2>
                    <div class="text-center">
                        <!-- Alumni Login Button -->
                        <a href="login.php" class="btn btn-primary btn-lg mb-3">
    <i class="fas fa-user-graduate"></i> Alumni Login
</a>
                        <!-- Staff/Admin Login Button -->
                        <a href="admin/admin_login.php" class="btn btn-secondary btn-lg">
    <i class="fas fa-user-tie"></i> Staff/Admin Login
</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</main>
<?php include 'includes/footer.php'; ?>