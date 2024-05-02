<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/dashboard_style.css" />
</head>

<body>
    <div class="container">
        <h1>Welcome to Your Dashboard, <?php echo $_SESSION['user_name']; ?>!</h1>
        <div class="card">
            <h2>Shop Statistics</h2>
            <p>Ammount of products: 0</p>
            <p>Total Orders: 0</p>
            <p>Total Revenue: $0</p>
        </div>
        <div class="card">
            <h2>Recent Activity</h2>
            <ul>
                <li>User mac was inputted</li>
                <li>User mac logged in</li>
            </ul>
        </div>
        <div class="card">
            <h2>Links</h2>
            <ul>
                <li><a href="Account_settings.php">Account settings</a></li>
                <li><a href="Manage_stock.php">Manage stock</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <a href="logout.php">Logout</a>
    </div>
</body>

</html>