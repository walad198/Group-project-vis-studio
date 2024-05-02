<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Settings</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="container">
        <h1>Account Settings</h1>
        <div class="account-form">
            <form method="post" action="update_account.php">
                <div class="form-group">
                    <label for="account_name">Account Name:</label>
                    <input type="text" name="account_name" id="account_name" required />
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title/Role:</label>
                    <input type="text" name="job_title" id="job_title" />
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" id="email" required />
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" id="new_password" />
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" />
                </div>
                <div class="form-group">
                    <label for="2fa_question">2FA Question:</label>
                    <input type="text" name="2fa_question" id="2fa_question" />
                </div>
                <div class="form-group">
                    <label for="2fa_answer">2FA Answer:</label>
                    <input type="text" name="2fa_answer" id="2fa_answer" />
                </div>
                <button type="submit" class="btn">Save Settings</button>
            </form>
        </div>
    </div>
    <div class="top-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="account_settings.php">Account Settings</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>