<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="data.php">Data</a></li>
            <li><a href="history.php">History</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?> (Grade <?php echo $_SESSION['grade_level']; ?>)</h1>
        <p>This is your dashboard.</p>
    </div>
</body>
</html>
