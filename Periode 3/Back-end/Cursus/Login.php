<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Inloggen</title>
</head>
<style>
    * {
        margin: 10px;
        font-family: sans-serif;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        text-align: center;
    }

    button {
        background-color: orange;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 30%;
        text-align: center;
    }

    button:hover {
        opacity: 0.8;
    }
</style>

<?php
$yesno = "";

$username = "Johan";
$password = "Welkom123";

if ($_POST) {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];


    if ($uname == $username && $psw == $password) {
        header("location: Index.php?ingelogd");
    } else {
        $yesno = "De inloggegevens zijn niet goed!";
    }
}


?>

<body>
    <center>
        <form action="" method="post">
            <div class="container">
                <label for="uname"><b>Gebruikersnaam</b></label><br>
                <input type="text" placeholder="Johan" name="uname" required><br>

                <label for="psw"><b>Wachtwoord</b></label><br>
                <input type="password" placeholder="Welkom123" name="psw" required> <br>

                <button type="submit">Login</button><br>
                <?php
                if ($yesno) {
                    echo '<div style="color: red;">' . $yesno . '</div>';
                }

                ?>
            </div>
        </form>
        <a href="Index.php">Home</A>
        <a href="#">Inloggen</a> <br>
        <center>
</body>

</html>