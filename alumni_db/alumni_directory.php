<?php
include 'db.php';

$stmt = $conn->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>
<main>
    <h2>Alumni Directory</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Graduation Year</th>
            <th>Course</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['graduation_year']; ?></td>
            <td><?php echo $user['course']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php include 'includes/footer.php'; ?>