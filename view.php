<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "school_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// delete record if requested
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM student_records WHERE id=$id");
    header("Location: view.php");
    exit;
}

// fetch all students
$result = $conn->query("SELECT * FROM student_records");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
</head>
<body>
    <h2>Registered Students</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Matric Number</th>
            <th>Action</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['full_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['department']) ?></td>
            <td><?= htmlspecialchars($row['matric_number']) ?></td>
            <td><a href="view.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this record?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <p><a href="index.php">Register New Student</a></p>
</body>
</html>

<?php $conn->close(); ?>