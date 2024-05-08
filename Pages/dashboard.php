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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poetsen+One&display=swap"
        rel="stylesheet">
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