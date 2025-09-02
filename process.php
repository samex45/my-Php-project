<?php
$host = "localhost";
$user = "root"; // default MySQL user in XAMPP
$pass = "";     // default password is empty
$dbname = "school_db";

// connect to database
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// process form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $matric_number = trim($_POST['matric_number']);

    // validation
    if (empty($full_name) || empty($email) || empty($department) || empty($matric_number)) {
        die("All fields are required.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // save into database
    $stmt = $conn->prepare("INSERT INTO student_records (full_name, email, department, matric_number) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $email, $department, $matric_number);

    if ($stmt->execute()) {
        echo "Student registered successfully.<br>";
        echo "<a href='view.php'>View Students</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>