<?php include 'header.inc.php' ?>

<head>
    <link rel="stylesheet" href="style.css">
    <script src="./Popup.js"></script>
</head>

<body>

    <!--NAVBAR-->
    <?php include 'navbar.inc.php'; ?>

    <h1 class="login-header">Login</h1>
    <form action="" method="post" class="login-form">
        <div class="container">
            <input type="text" placeholder="Gebruikersnaam" name="uname" class="username-login"><br>

            <input type="password" placeholder="Wachtwoord" name="psw" class="password-login"> <br>

            <button id="button" type="submit" class="submit-btn borderRadius" value="Login">Login</button><br>

            <!--REGISTREREN POPUP-->
            <p>Heb je nog geen account? <a onclick="openPopup('popup1')" style="cursor: pointer;"><u>Registreer</u></a></p>

            <?php
            if (isset($_POST['uname'])) {

                $con = mysqli_connect('localhost', 'root', '', 'cursussen');

                $username = $_POST['uname'];
                $password = $_POST['psw'];
                $error = "";

                if (empty($username) || empty($password)) {
                    $error = "Vul alle velden in!";
                } else {
                    $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
                    $results = mysqli_query($con, $sql);
                    $userdata = mysqli_fetch_assoc($results);
                    $array = mysqli_fetch_array($results, MYSQLI_ASSOC);
                    $amount = mysqli_num_rows($results);

                    if ($amount >= 1) {
                        $_SESSION['ingelogd'] = $userdata;
                        header('location: Index.php');
                    } else {
                        $error = "Je gebruikersnaam of wachtwoord is incorrect!";
                    }
                }

                if ($error) {

                    echo '<p class="error">' . $error . '</p>';
                }
            }
            ?>
        </div>
    </form>

    <div id="popup1" class="fadein">
        <form action="" method="post">
            <h1 class="reg-header">Registreren</h1>
            <input type="text" placeholder="Volledige naam" name="fullname" id="fullname" class="full-name-reg"><br>
            <input type="text" placeholder="Gebruikersnaam" name="username" id="username" class="username-reg"><br>

            <input type="password" placeholder="Wachtwoord" name="password" id="password" class="password-reg"> <br>
            <button id="button3" type="submit" class="reg-btn">Registeren</button><br>
            <input type="button" id="button2" onclick="closePopup('popup1')" class="close-btn closee-btn" value="Sluiten"></input><br>

            <?php
            if (isset($_POST['username'])) {

                $con = mysqli_connect('localhost', 'root', '', 'cursussen');

                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $error = "";
                $error1 = "";
                $message = '';


                if (empty($username) || empty($password) || empty($fullname)) {
                    echo '<style type="text/css">
                                .error3 {
                                    background-color= rgba(189, 8, 8, 0.8);
                                            }
                            </style>';
                    $error1 = "Vul alle velden in!";
                    echo '<style type="text/css">
                                #popup1 {
                                height: 390px;
                                            }
                            </style>';
                } else {

                    $sql = "SELECT * FROM users WHERE username='$username'";
                    $data = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($data, MYSQLI_ASSOC);
                    $rows = mysqli_num_rows($data);

                    if ($rows >= 1) {
                        $message = 'deze gebruikers naam bestaat al';
                        echo '<style type="text/css">
                        #popup1 {
                        height: 390px;
                                    }
                    </style>';
                    } else {
                        $sql = "INSERT INTO users (full_name, username, password) values('$fullname', '$username', '$password')";
                        if (mysqli_query($con, $sql)) {
                            $sql = "SELECT * FROM users WHERE full_name='$fullname' and password='$password'";
                            try {
                                $data = mysqli_query($con, $sql);
                                $userdata = mysqli_fetch_assoc($data);
                                $_SESSION['ingelogd'] = $userdata;
                                header('location: Index.php');
                            } catch (Exception $e) {
                                $error1 = 'Er is iets fout gegaan: ' . $e . '!';
                                echo '<style type="text/css">
                                        #popup1 {
                                        height: 390px;
                                                    }
                                    </style>';
                            }
                        } else {
                            $error1 = 'Er is iets fout gegaan!';
                            echo '<style type="text/css">
                                    #popup1 {
                                    height: 390px;
                                                }
                                </style>';
                        }
                    }
                }

                if ($error1) {
                    echo '<p class="error3">' . $error1 . '</p>';
                }

                if ($error) {
                    echo '<p class="error2">' . $error . '</p>';
                }

                if ($message) {
                    echo '<p class="error4">' . $message . '</p>';
                }
            }
            ?>
        </form>
    </div>

</body>

</html>