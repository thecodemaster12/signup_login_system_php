<?php
require_once "./includes/config_session.php";
 require_once "./includes/signup_view.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./CSS/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form action="./includes/login.php" method="post">
        <input type="text" name="username" placeholder="Name">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <h1>Signup</h1>
    <form action="./includes/signup.php" method="post">
        <input type="text" name="username" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit">Signup</button>
    </form>

    <?php
        check_signup_errors();
    ?>
</body>
</html>