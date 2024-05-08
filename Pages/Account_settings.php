<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Staff_ID']) || !isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}


include ('db_conn.php');

$staff_id = $_SESSION['Staff_ID'];
$query = "SELECT Firstname, Job_Desc, E_mail FROM staff WHERE Staff_ID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $staff_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Account Settings</title>
    <link rel="stylesheet" type="text/css" href="../Stylesheets/Settings.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poetsen+One&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Account Settings</h1>
        <div class="account-form">
            <form class="account" method="post" action="update_account.php">
                <div class="form-group">
                    <label for="account_name">Account Name:</label>
                    <input class="input" type="text" name="account_name" id="account_name"
                        value="<?php echo $user['Firstname']; ?>" required />
                </div>
                <div class="form-group">
                    <label for="job_title">Job Title/Role:</label>
                    <input class="input" type="text" name="job_title" id="job_title"
                        value="<?php echo $user['Job_Desc']; ?>" />
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input class="input" type="email" name="email" id="email" value="<?php echo $user['E_mail']; ?>"
                        required />
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input class="input" type="password" name="new_password" id="new_password" />
                </div>
                <div class="form-group">
                    <label class="confirm_password" for="confirm_password">Confirm Password:</label>
                    <input class="input" type="password" name="confirm_password" id="confirm_password" />
                </div>
                <div class="form-group">
                    <label for="2fa_question">2FA Question:</label>
                    <input class="input" type="text" name="2fa_question" id="2fa_question" />
                </div>
                <div class="form-group">
                    <label for="2fa_answer">2FA Answer:</label>
                    <input class="input" type="text" name="2fa_answer" id="2fa_answer" />
                </div>
                <button type="submit" class="btn">Save Settings</button>
            </form>
        </div>
    </div>
    <div class="top-links">
        <button class="dashboardBtn"> <a href="dashboard.php">Dashboard</a> </button>
        <button class="logoutBtn"><a href="logout.php">Logout</a></button>
    </div>
</body>

</html>