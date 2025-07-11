<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user is an alumni
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND role = 'alumni'");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['role'] = 'alumni'; // Set role to 'alumni'
        header('Location: dashboard.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password.</div>";
    }
}
?>

<?php include 'includes/header.php'; ?>
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Login</h2>
                    <form method="POST" action="login.php">
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <!-- Login Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <!-- Registration Link -->
                    <div class="text-center mt-3">
                        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>