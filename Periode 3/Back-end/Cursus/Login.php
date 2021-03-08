<?php include 'header.inc.php' ?>

<head>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <center>
        <?php include 'navbar.inc.php' ?>

        <br>

        <form action="" method="post" class="login-form">
            <div class="container">
                <label for="uname"><b>Gebruikersnaam</b></label><br>
                <input type="text" placeholder="Johan" name="uname"><br>

                <label for="psw"><b>Wachtwoord</b></label><br>
                <input type="password" placeholder="Welkom123" name="psw"> <br>

                <button type="submit" class="submit-btn">Login</button><br>
                <?php

                if ($_POST) {

                    $con = mysqli_connect('localhost', 'root', '', 'cursussen');

                    $username = $_POST['uname'];
                    $password = $_POST['psw'];
                    $error = "";

                    if (empty($username) || empty($password)) {
                        $error = "Vul alle velden in!";
                    } else {
                        $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
                        $results = mysqli_query($con, $sql);
                        $array = mysqli_fetch_array($results, MYSQLI_ASSOC);
                        $amount = mysqli_num_rows($results);

                        if ($amount == 1) {
                            $_SESSION['ingelogd'] = $_POST['uname'];
                            header('location: index.php');
                        } else {
                            $error = "Je gebruikersnaam of wachtwoord is incorrect!";
                        }
                    }

                    if ($error) {

                        echo '' . $error . '';
                    }
                }
                ?>
            </div>
        </form>
        <center>
</body>

</html>