<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $graduation_year = $_POST['graduation_year'];
    $course = $_POST['course'];

    // Insert into users table with role 'alumni'
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, graduation_year, course, role) VALUES (?, ?, ?, ?, ?, 'alumni')");
    $stmt->execute([$name, $email, $password, $graduation_year, $course]);

    header('Location: login.php');
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Register</h2>
                    <form method="POST" action="register.php">
                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
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
                        <!-- Graduation Year Field -->
                        <div class="mb-3">
                            <label for="graduation_year" class="form-label">Graduation Year</label>
                            <input type="number" class="form-control" name="graduation_year" required>
                        </div>
                        <!-- Course Field -->
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" class="form-control" name="course" required>
                        </div>
                        <!-- Register Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <!-- Login Link -->
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>