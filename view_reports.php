<?php 
include("./db/db.php");
session_start();

// Check if user is logged in
if (!isset($_SESSION['phone'])) {
    header("Location: login.php"); 
    exit;
}

$user_phone = $_SESSION['phone'];

// Fetch user's reports from the database
$sql = "SELECT * FROM reports WHERE user_phone = '$user_phone' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Reports</title>
</head>
<body>

<h2>Your Reports</h2>

<?php if ($result->num_rows > 0): ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Location</th>
            <th>Category</th>
            <th>Description</th>
            <th>User Phone</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['location'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['user_phone'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No reports found.</p>
<?php endif; ?>

<a href="dasboard.php">Submit Another Report</a>
<a href="logout.php">Logout</a>

</body>
</html>
