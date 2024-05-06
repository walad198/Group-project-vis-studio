<?php
session_start();

if (isset($_SESSION['Staff_ID']) && isset($_SESSION['Username'])) {
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="Style.css" />
    </head>

    <body>
        <h1>Hello, <?php echo $_SESSION['Firstname']; ?> </h1>
        <form action="logout.php">
            <input class="logoutBtn" type="submit" value="Logout" />
        </form>
        <br /><br />

        <a href="dashboard.php"><button>Go to Dashboard</button></a>


        //Add shop metrics
        //Link to dashboard
        //Link to search for items



    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
