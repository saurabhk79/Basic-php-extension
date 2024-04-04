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
        <input type="text" name="name" required />

        <small>Email</small>
        <input type="email" name="email" required />

        <small>Password</small>
        <input type="password" name="password" required />

        <button type="submit">Submit</button>
    </form>
    <?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $passwd = $_POST["password"];

    function setUser($fname, $femail, $fpasswd)
    {
        try {
            $file = fopen("users.txt", "a");

            $data = file_get_contents("users.txt");
            $dataInArr = explode("\n", $data);

            foreach ($dataInArr as $user) {
                echo $user;

                $userArr = explode("-", $user);
                if ($femail == $userArr[1]) {
                    echo "Already exists!";
                    return null;
                }
            }
            fwrite($file, "$fname-$femail-$fpasswd\n");
            fclose($file);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    if ($name != "" || $email != "" || $passwd != "") setUser($name, $email, $passwd);
    ?>
</body>

</html>