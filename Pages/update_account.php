<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Staff_ID']) || !isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}

// Include your database connection file
include ('db_conn.php');

// Retrieve form data
$account_name = $_POST['account_name'] ?? '';
$job_title = $_POST['job_title'] ?? '';
$email = $_POST['email'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$username = $_POST['username'] ?? '';

// Retrieve user's Staff_ID from session
$staff_id = $_SESSION['Staff_ID'];

// Update user information in the database
$query = "UPDATE staff SET ";
$bindParams = "";
$bindValues = [];

// Construct the SET clause and bind parameters dynamically
if (!empty($account_name)) {
    $query .= "Firstname = ?, ";
    $bindParams .= "s";
    $bindValues[] = &$account_name;
}
if (!empty($job_title)) {
    $query .= "Job_Desc = ?, ";
    $bindParams .= "s";
    $bindValues[] = &$job_title;
}
if (!empty($email)) {
    $query .= "E_Mail = ?, ";
    $bindParams .= "s";
    $bindValues[] = &$email;
}
if (!empty($new_password)) {
    $query .= "Pass_Word = ?, ";
    $bindParams .= "s";
    $bindValues[] = &$new_password;
}
if (!empty($username)) {
    $query .= "Username = ?, ";
    $bindParams .= "s";
    $bindValues[] = &$username;
}

// Remove the trailing comma and space
$query = rtrim($query, ", ");

// Add the WHERE clause to search by Staff_ID
$query .= " WHERE Staff_ID = ?";
$bindParams .= "i";
$bindValues[] = &$staff_id;

// Prepare and bind the parameters
$stmt = $conn->prepare($query);
$stmt->bind_param($bindParams, ...$bindValues);
$result = $stmt->execute();

// Check if update was successful
if ($result) {
    echo "<script>alert('User information updated successfully.');
    window.location.href='Account_settings.php';</script>";
    exit();
} else {
    // Handle error, maybe display an error message
    echo "<script>alert('Error updating user information.');</script>";
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>