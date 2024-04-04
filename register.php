<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form method="POST">
        <small>Name</small>
        <input type="text" name="name" />

        <small>Email</small>
        <input type="email" name="email" />

        <small>Password</small>
        <input type="password" name="password" />
    </form>
    <?php
    $email = $_POST["email"];
    $passwd = $_POST["password"];

    echo "$email $passwd";
    ?>
</body>

</html>