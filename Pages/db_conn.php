<?php

$sname = "localhost";
$unmae = "root";
$password = "password";

$db_name = "groupdatabase";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn) {
    echo "Connection Failed";
}
