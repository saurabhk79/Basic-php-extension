<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="POST">

        <small>Email</small>
        <input type="email" name="email" />

        <small>Password</small>
        <input type="password" name="password" />
        <button type="submit">Submit</button>
    </form>

    <?php
    $email = $_POST["email"];
    $passwd = $_POST["password"];

    // function loginUser($femail, $fpasswd)
    // {
    //     try {
    //         $file = fopen("users.txt", "r");

    //         $data = file_get_contents("users.txt");
    //         $dataInArr = explode("\n", $data);

    //         foreach ($dataInArr as $user) {
    //             echo $user;

    //             $userArr = explode("-", $user);
    //             if ($femail == $userArr[1]) {
    //                 if ($fpasswd == $userArr[2]) echo $user;
    //             }
    //         }
    //         fclose($file);
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    // if ($email != "" || $passwd != "") loginUser($email, $passwd);

    function loginUser($femail, $fpasswd)
{
    try {
        $file = fopen("users.txt", "r");

        while (!feof($file)) {
            $line = trim(fgets($file));

            if (!empty($line)) {
                $userArr = explode("-", $line);
                if ($femail == $userArr[1] && $fpasswd == $userArr[2]) {
                    fclose($file);
                    return true; 
                }
            }
        }
        fclose($file);
        return false;
    } catch (\Throwable $th) {
        throw $th;
    }
}

if ($email != "" && $passwd != "") {
    if (loginUser($email, $passwd)) echo "Login successful!";
    else echo "Invalid email or password.";
}
    ?>

</body>

</html>