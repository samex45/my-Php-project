<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h2>Register Student</h2>
    <form action="process.php" method="POST">
        <label>Full Name:</label><br>
        <input type="text" name="full_name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Department:</label><br>
        <input type="text" name="department" required><br><br>

        <label>Matric Number:</label><br>
        <input type="text" name="matric_number" required><br><br>

        <button type="submit">Register</button>
    </form>

    <p><a href="view.php">View Registered Students</a></p>
</body>
</html>