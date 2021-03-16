<?php include 'header.inc.php' ?>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&display=swap" rel="stylesheet">
</head>

<body>

    <!--NAVBAR-->
    <?php include 'navbar.inc.php' ?>

    <!--TEXT-->
    <table class="tabel" cellspacing="0" cellpadding="5">
        <tr id="header">
            <th><b>Volledige naam</b></th>
            <th><b>Gebruikersnaam</b></th>
            <th><b>Wachtwoord</b></th>
            <th><b>Aanpassen</b></th>
            <th><b>Verwijderen</b></th>
        </tr>

        <?php
        $conn =  mysqli_connect('localhost', 'root', '', 'cursussen');
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        //TABEL
        echo "
                    <tr>
                    <td> " . $_SESSION['ingelogd']['full_name'] . "</td>
                    <td> " . $_SESSION['ingelogd']['username'] . "</td>
                    <td>" . $_SESSION['ingelogd']['password'] . "</td>
                    <td><u><a href='Account.php?changeuser=" . $_SESSION['ingelogd']['id'] . "'>Aanpassen</a></u></td>
                    <td ><a onclick='openPopup(popup4)' href='Account.php?deleteuser=" . $_SESSION['ingelogd']['id'] . "'><u class='delete-user'>Verwijderen</u></a></td>
                    ";
        echo "</tr>";

        echo " </table></form></div>";

        if (isset($_GET['changeuser'])) {

            $id = $_GET['changeuser'];
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $results = mysqli_query($conn, $sql);
            $userData = mysqli_fetch_assoc($results);
            mysqli_fetch_array($results, MYSQLI_ASSOC);

            echo '<style type="text/css">
            .tabel {
                display: none;
            }
            </style>';

            echo '
                
            <div id="popup2">
                <form action="" method="post">
                    <h1 class="aanpassen-header">Aanpassen</h1>
                    <p class="aanpassen-user">Gebruiker: ' . $_SESSION['ingelogd']['username'] . '</p>
                    <p class="current-fulln">Volledige Naam: ' . $_SESSION['ingelogd']['full_name'] . '</p>
                    <input type="text" placeholder=" Nieuwe Volledige naam" name="full_name" id="full_name" class="full-name-aan"><br>
                    <p class="current-usern">Gebruikersnaam: ' . $_SESSION['ingelogd']['username'] . '</p>
                    <input type="text" placeholder="Nieuwe Gebruikersnaam" name="username" id="username" class="username-aan"><br>

                    <p class="current-pass">Wachtwoord: ' . $_SESSION['ingelogd']['password'] . '</p>
                    <input type="password" placeholder="Nieuw Wachtwoord" name="password" id="password" class="password-aan"> <br>

                    <button type="submit" class="opslaan-btn" value="update" name="update">Opslaan</button><br>
                    <a href="account.php"><button type="button" class="annuleren-btn annulerren-btn">Sluiten</button><br></a>';
            echo '
                </form>
            </div>
                ';
        }

        function consoleLog($msg)
        {
            echo '<script type="text/javascript">console.log('
                . str_replace('<', '\\x3C', json_encode($msg))
                . ');</script>';
        }
        consoleLog($_POST);

        if (isset($_POST['update']) && $_POST['update'] == 'update') {
            $con = mysqli_connect('localhost', 'root', '', 'cursussen');

            $fullname = $_POST['full_name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "UPDATE users SET full_name ='$fullname', username ='$username', password ='$password' WHERE id = " . $_GET['changeuser'] . "";

            if (mysqli_query($con, $sql)) {
                $sql = "SELECT * FROM users WHERE id='" . $_GET['changeuser'] . "'";
                $data = mysqli_query($con, $sql);
                $userdata = mysqli_fetch_assoc($data);
                $_SESSION['ingelogd'] = $userdata;
                header("location: Account.php?changeuser=" . $_SESSION['ingelogd']['id'] . " ");
            }
        };
        ?>
        <?php
        if (isset($_GET['deleteuser'])) {
            echo '<style type="text/css">
            #popup4 {
                display: block;
            }
            </style>';
        }
        ?>
        <div id='popup4'>
            <h1 class="popup3_text">Weet je zeker dat je de gebruiker: <div style="color: red;"><?php echo $_SESSION['ingelogd']['username']; ?></div> wilt verwijderen?</h1>
            <form action="" method="POST">

                <button onclick="window.location.href='/account.php'" name="delete" value="delete" type="submit" class="verwijder-btn">Verwijderen</button>
                <a href="account.php"><button type="button" class="annuleer-btn">Annuleren</button></a>

                <?php

                if ($_POST && isset($_POST['delete']) && $_POST['delete'] == 'delete') {
                    $deleteuser = $_SESSION['ingelogd']['username'];

                    $con = mysqli_connect('localhost', 'root', '', 'cursussen');

                    $sql = "DELETE FROM users WHERE username = '$deleteuser'";

                    if (mysqli_query($con, $sql)) {
                        header('location: Uitloggen.php');
                    } else {
                        echo 'Het is niet goed gegaan!';
                    }
                }

                ?>



            </form>
        </div>





</body>

</html>