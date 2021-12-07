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
        <p class="sign" align="center">Sign up</p>
        <form class="form1" action="proses.php" method="post">
            <input type="hidden" value="tambah_user" name="fungsi">
            <input required name="username" class="un " type="text" align="center" placeholder="Username">
            <input required name="email" class="pass" type="email" align="center" placeholder="Email">
            <input required name="password" class="pass" type="password" align="center" placeholder="Password">
            <button class="submit" align="center" type="submit">Sign up</button>
        </form>
    </div>
</body>
</html>