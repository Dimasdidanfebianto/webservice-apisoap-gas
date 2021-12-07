<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<html>
<head>
    <link rel="stylesheet" href="vendor/css//login.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="vendor/fontawesome/css/all.css">
    <title>Sign in</title>
</head>

<body>
    <div class="main">
        <p class="sign" align="center">Sign in</p>
        <form class="form1" action="proses.php" method="post">
            <input type="hidden" value="user_login" name="fungsi">
            <input required name="username" class="un " type="text" align="center" placeholder="Username">
            <input required name="password" class="pass" type="password" align="center" placeholder="Password">
            <button class="submit" align="center" type="submit">Sign in</button><br><br>
            <p align="center"><a style="color: blue;" href="register.php">Register?</p>
        </form>
    </div>
</body>
</html>