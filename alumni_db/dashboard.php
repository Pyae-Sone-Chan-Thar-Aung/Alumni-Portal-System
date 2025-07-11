<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<main class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Welcome, <?php echo $_SESSION['user_name']; ?></h1>
        <p class="lead">This is your alumni dashboard. Stay connected with your alma mater and fellow alumni.</p>
    </div>

    <!-- Quick Links Section -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Update Profile</h5>
                    <p class="card-text">Keep your profile information up to date.</p>
                    <a href="update_profile.php" class="btn btn-primary">Go to Profile</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">View Events</h5>
                    <p class="card-text">Check out upcoming events and RSVP.</p>
                    <a href="events.php" class="btn btn-primary">View Events</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Connect with Alumni</h5>
                    <p class="card-text">Network with fellow alumni.</p>
                    <a href="alumni_directory.php" class="btn btn-primary">Connect</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Events Section -->
    <h3 class="mb-4">Upcoming Events</h3>
    <div class="row">
        <?php
        include 'db.php';
        $stmt = $conn->query("SELECT * FROM news WHERE type = 'event' ORDER BY posted_at DESC LIMIT 3");
        while ($row = $stmt->fetch()) {
            echo "<div class='col-md-4 mb-4'>
                    <div class='card'>
                        <img src='{$row['image']}' class='card-img-top' alt='{$row['title']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text'>{$row['content']}</p>
                            <small class='text-muted'>Posted on: {$row['posted_at']}</small>
                        </div>
                    </div>
                  </div>";
        }
        ?>
    </div>
    <div class="text-center mt-4">
        <a href="events.php" class="btn btn-primary">View All Events</a>
    </div>

    <!-- Alumni Activities Section -->
    <h3 class="mb-4 mt-5">Recent Alumni Activities</h3>
    <div class="row">
        <?php
        $stmt = $conn->query("SELECT * FROM news WHERE type = 'activity' ORDER BY posted_at DESC LIMIT 3");
        while ($row = $stmt->fetch()) {
            echo "<div class='col-md-4 mb-4'>
                    <div class='card'>
                        <img src='{$row['image']}' class='card-img-top' alt='{$row['title']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text'>{$row['content']}</p>
                            <small class='text-muted'>Posted on: {$row['posted_at']}</small>
                        </div>
                    </div>
                  </div>";
        }
        ?>
    </div>
    <div class="text-center mt-4">
        <a href="activities.php" class="btn btn-primary">View All Activities</a>
    </div>

    <!-- Logout Button -->
    <div class="text-center mt-5">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</main>
<?php include 'includes/footer.php'; ?>