<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['uname'])) {
        header("Location: index.php?error=User Name is required");
        exit();
    } elseif (empty($_POST['password'])) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
                $_SESSION["user_name"] = $row["user_name"];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect User Name or Password");
                exit();
            }
        } else {
            header("Location: index.php");
            exit();
        }
    }
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>