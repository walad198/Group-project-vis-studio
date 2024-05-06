<?php
session_start();

if (!isset($_SESSION['Staff_ID']) || !isset($_SESSION['Username'])) {
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
    <div class="container-card">
        <h1>Welcome to Your Dashboard, <?php echo $_SESSION['Firstname']; ?>!</h1>
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
            <h2>Quick Actions</h2>
            <ul>
                <li><a href="Account_settings.php"><button class="linksBtn">Account settings</button></a></li>
                <li><a href="Manage_stock.php"><button class="linksBtn">Manage Stock</button></a></li>
                <li><a href="Scan.php"><button class="linksBtn">Scan QR</button></a></li>
            </ul>
        </div>

        <div class="conatiner">
            <a href="logout.php"><button class="logoutBtn">Logout</button></a>
        </div>
    </div>

</body>

</html>