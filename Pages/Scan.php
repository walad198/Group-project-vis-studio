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
    <title>business.io</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/dashboard_style.css" />
</head>

<body>
    <div class="container">
        <h1>business.io</h1>
        <p>Scan QR code:</p>
        <button onclick="addStock()">ADD STOCK</button>
        <button onclick="updateInfo()">UPDATE INFO</button>
    </div>

    <!-- You can add JavaScript functions for button actions if needed -->
    <script>
        function addStock() {
            // Add logic for adding stock
            // Example: window.location.href = 'add_stock.php';
        }

        function updateInfo() {
            // Add logic for updating info
            // Example: window.location.href = 'update_info.php';
        }
    </script>
</body>

</html>
