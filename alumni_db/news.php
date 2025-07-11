<?php include 'includes/header.php'; ?>
<main class="container my-5">
    <h2 class="text-center mb-4">News & Events</h2>

    <!-- News Section -->
    <h3 class="mb-3">Latest News</h3>
    <?php
    include 'db.php';
    $stmt = $conn->query("SELECT * FROM news WHERE type = 'news' ORDER BY posted_at DESC");
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='row g-0'>
                    <div class='col-md-4'>
                        <img src='{$row['image']}' class='img-fluid rounded-start' alt='{$row['title']}'>
                    </div>
                    <div class='col-md-8'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text'>{$row['content']}</p>
                            <small class='text-muted'>Posted on: {$row['posted_at']}</small>
                        </div>
                    </div>
                </div>
              </div>";
    }
    ?>

    <!-- Alumni Activities Section -->
    <h3 class="mb-3 mt-5">Alumni Activities</h3>
    <?php
    $stmt = $conn->query("SELECT * FROM news WHERE type = 'activity' ORDER BY posted_at DESC");
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='row g-0'>
                    <div class='col-md-4'>
                        <img src='{$row['image']}' class='img-fluid rounded-start' alt='{$row['title']}'>
                    </div>
                    <div class='col-md-8'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text'>{$row['content']}</p>
                            <small class='text-muted'>Posted on: {$row['posted_at']}</small>
                        </div>
                    </div>
                </div>
              </div>";
    }
    ?>

    <!-- Upcoming Events Section -->
    <h3 class="mb-3 mt-5">Upcoming Events</h3>
    <?php
    $stmt = $conn->query("SELECT * FROM news WHERE type = 'event' ORDER BY posted_at DESC");
    while ($row = $stmt->fetch()) {
        echo "<div class='card mb-3'>
                <div class='row g-0'>
                    <div class='col-md-4'>
                        <img src='{$row['image']}' class='img-fluid rounded-start' alt='{$row['title']}'>
                    </div>
                    <div class='col-md-8'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row['title']}</h5>
                            <p class='card-text'>{$row['content']}</p>
                            <small class='text-muted'>Posted on: {$row['posted_at']}</small>
                        </div>
                    </div>
                </div>
              </div>";
    }
    ?>
</main>
<?php include 'includes/footer.php'; ?>