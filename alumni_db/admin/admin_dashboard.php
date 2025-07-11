<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<main class="container my-5">
    <h2>Welcome, <?php echo $_SESSION['admin_name']; ?></h2>
    <p>This is the admin dashboard.</p>

    <!-- Post News Section -->
    <div class="mb-5">
        <h3>Post News & Events</h3>
        <form method="POST" action="post_news.php">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>

    <!-- Pending Alumni Registrations Section -->
    <div>
        <h3>Pending Alumni Registrations</h3>
        <?php
        include '../db.php';
        $stmt = $conn->query("SELECT * FROM users WHERE status = 'pending'");
        while ($row = $stmt->fetch()) {
            echo "<div class='card mb-3'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$row['name']}</h5>
                        <p class='card-text'>{$row['email']}</p>
                        <p class='card-text'>Graduation Year: {$row['graduation_year']}</p>
                        <p class='card-text'>Course: {$row['course']}</p>
                        <a href='approve_user.php?id={$row['id']}' class='btn btn-success'>Approve</a>
                        <a href='reject_user.php?id={$row['id']}' class='btn btn-danger'>Reject</a>
                    </div>
                  </div>";
        }
        ?>
    </div>
</main>
<?php include '../includes/footer.php'; ?>