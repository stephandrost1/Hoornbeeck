<?php include 'header.inc.php' ?>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&display=swap" rel="stylesheet">
</head>

<body>
    <!--NAVBAR-->
    <?php include 'navbar.inc.php';

    if (!isset($_SESSION['error_msg'])) {
        $_SESSION['error_msg'] = NULL;
    }

    if (!isset($_SESSION['error_message'])) {
        $_SESSION['error_message'] = NULL;
    } else {
        echo '<p>' . $_SESSION['error_message'] . '</p>';
        $_SESSION['error_message'] = NULL;
    }

    if (isset($_GET['username'])) {
        echo '<style type="text/css">
                    #popup3 {
                        display: block;
                    }
                </style>';
    } else {
        echo '<style type="text/css">
                        #popup3 {
                            display: none;
                        }
                        </style>';
    }

    ?>
    <!--TEXT-->
    <div id='popup3'>
        <h1 class="popup3_text">Weet je zeker dat je de gebruiker: <div style="color: red;"><?php echo $_GET['username']; ?></div> wilt verwijderen?</h1>
        <form action="" method="POST">

            <button onclick="window.location.href='/admin.php'" name="waar" value="true" type="submit" class="verwijder-btn">Verwijderen</button>
            <a href="admin.php"><button type="button" class="annuleer-btn">Annuleren</button></a>

            <?php

            if ($_POST && isset($_POST['waar']) && $_POST['waar'] == 'true') {
                $deleteuser = $_GET['username'];

                $con = mysqli_connect('localhost', 'root', '', 'cursussen');

                $sql = "DELETE FROM users WHERE username = '$deleteuser'";

                if (mysqli_query($con, $sql)) {
                    $_SESSION['error_message'] = 'Account succesvol verwijderd!';
                    header('location: admin.php');
                } else {
                    $_SESSION['error_message'] = '<p style="background-color= rgba(189, 8, 8, 0.8)">Account verwijderen gefaald!<p>';
                }
            }

            ?>



        </form>
    </div>
    <table class="tabel" cellspacing="0" cellpadding="5">
        <tr id="header">
            <th><b>ID</b></th>
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
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                    <tr>
                    <td> " . $row['id'] . "</td>
                    <td> " . $row['full_name'] . "</td>
                    <td> " . $row['username'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td><u><a href='admin.php?user=" . $row['id'] . "'>Aanpassen</a></u></td>
                    <td ><a href='admin.php?username=" . $row['username'] . "'><u class='delete-user'>Verwijderen</u></a></td>";
            echo "</tr>";
        }

        echo " </table></form></div>";

        if (isset($_GET['user'])) {

            $id = $_GET['user'];
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
                    <p class="aanpassen-user">Gebruiker: ' . $userData['username'] . '</p>
                    <p class="current-fulln">Volledige Naam: ' . $userData['full_name'] . '</p>
                    <input type="text" placeholder=" Nieuwe Volledige naam" name="full_name" id="full_name" class="full-name-aan"><br>
                    <p class="current-usern">Gebruikersnaam: ' . $userData['username'] . '</p>
                    <input type="text" placeholder="Nieuwe Gebruikersnaam" name="username" id="username" class="username-aan"><br>

                    <p class="current-pass">Wachtwoord: ' . $userData['password'] . '</p>
                    <input type="password" placeholder="Nieuw Wachtwoord" name="password" id="password" class="password-aan"> <br>

                    <button type="submit" class="opslaan-btn" value="true" name="yes">Opslaan</button><br>
                    <a href="admin.php"><button type="button" class="annuleren-btn annulerren-btn">Sluiten</button><br></a>';

            if (isset($_SESSION['error_msg'])) {
                echo '<style type="text/css">
                                #popup2 {
                                height: 420px;
                                            }
                            </style>';
                echo '<p class="error_msg">' . $_SESSION['error_msg'] . '</p>';
                $_SESSION['error_msg'] = NULL;
            }
            echo '
                </form>
            </div>
                ';
        }

        if ($_POST && isset($_POST['yes']) && $_POST['yes'] == 'true') {
            $array = array('full_name', 'username', 'password');
            $con = mysqli_connect('localhost', 'root', '', 'cursussen');

            foreach ($array as $arr) {

                if (isset($_POST[$arr]) && !empty($_POST[$arr])) {
                    $char = $_POST[$arr];
                    $sql = "update users set $arr = '$char' where id = '" . $userData['id'] . "'";
                    if (mysqli_query($con, $sql)) {
                        $_SESSION['error_msg'] = 'Account succesvol geupdate!';
                    } else {
                        $_SESSION['error_msg'] = '<p style="background-color= rgba(189, 8, 8, 0.8)">Account update gefaald!<p>';
                    };
                }
            }
            echo ("<meta http-equiv='refresh' content='1'>");
        }

        if (isset($_SESSION['error_message'])) {
            echo '<p class="error_message">' .  $_SESSION['error_message'] . '</p>';
            $_SESSION['error_message'] = NULL;
        }

        ?>
</body>

</html>