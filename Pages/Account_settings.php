<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}
//include "db_conn.php";
// Include any necessary files and database connections

// Process form submission (saving settings)
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $account_name = $_POST["account_name"];
    $job_title = $_POST["job_title"];
    $email = $_POST["email"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    $2fa_question = $_POST["2fa_question"];
    $2fa_answer = $_POST["2fa_answer"];*/

// Validate form data (ensure required fields are not empty, passwords match, etc.)

// Process saving settings to the database
// Example:
// $success = saveSettings($account_name, $job_title, $email, $new_password, $2fa_question, $2fa_answer);

// Redirect to appropriate page based on success or failure
// Example:
// if ($success) {
//     header("Location: account_settings.php?success=1");
//     exit();
// } else {
//     $error_message = "Failed to save settings. Please try again.";
// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Account Settings</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/dashboard_style.css" />
</head>

<body>
    <div class="container">
        <h1>Account Settings</h1>
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="account_name">Account Name:</label>
                <input type="text" name="account_name" id="account_name" value="" required />
            </div>
            <div class="form-group">
                <label for="job_title">Job Title/Role:</label>
                <input type="text" name="job_title" id="job_title" value="" />
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" value="" required />
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" id="new_password" value="" />
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" value="" />
            </div>
            <div class="form-group">
                <label for="2fa_question">2FA Question:</label>
                <input type="text" name="2fa_question" id="2fa_question" value="" />
            </div>
            <div class="form-group">
                <label for="2fa_answer">2FA Answer:</label>
                <input type="text" name="2fa_answer" id="2fa_answer" value="" />
            </div>
            <button type="submit" class="btn">Save Settings</button>
        </form>
        <div class="profile-section">
            <img src="profile_picture.jpg" alt="Profile Picture" />
            <a href="update_profile_picture.php">Update Profile Picture</a>
        </div>
    </div>
    <div class="icons">
        <a href="dashboard.php"><img src="bell_icon.png" alt="Bell Icon" /></a>
        <a href="Account_settings.php"><img src="gear_icon.png" alt="Gear Icon" /></a>
        <a href="logout.php"><img src="head_icon.png" alt="Head Icon" /></a>
    </div>
</body>

</html>