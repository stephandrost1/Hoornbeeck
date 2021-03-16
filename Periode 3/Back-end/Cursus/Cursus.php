<?php include 'header.inc.php' ?>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php

    $conn =  mysqli_connect('localhost', 'root', '', 'cursussen');
    $sql = "SELECT * FROM cursussen";
    $result = mysqli_query($conn, $sql);

    $ingelogd = "Inloggen";

    if (isset($_SESSION['ingelogd'])) {
        $ingelogd = 'Uitloggen';
    }

    ?>


    <!--NAVBAR-->
    <?php include 'navbar.inc.php' ?>

    <br>

    <!--TABEL-->
    <center>
        <div class="container">
            <form method="post" action="?" class="tabel-cursus" autocomplete="on">
                <table cellspacing="0" cellpadding="5">
                    <tr id="header">
                        <th><b>Cursus</b></th>
                        <th><b>Omschrijving</b></th>
                        <th><b>Prijs</b></th>
                        <?php
                        if (isset($_SESSION['ingelogd'])) {
                            echo "<th><b>Aanmelden</b></th>";
                        }
                        ?>
                    </tr>

                    <?php

                    //TABEL
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                <tr>
                <td> " . $row['naam'] . "</td>
                <td> " . $row['beschrijving'] . "</td>
                <td> €" . $row['prijs'] . ",00</td>";
                        if (isset($_SESSION['ingelogd'])) {
                            echo "<td name='cursus' id='cursus'><a href='Cursus.php?cursus=" . $row['naam'] . "'><u>Aanmelden</u></a></td>";
                        }
                        echo "</tr>";
                    }



                    echo " 
        </table>
        </form></div>  
    ";
                    //ECHO NA SUBMIT
                    if (isset($_GET['cursus'])) {

                        $cursus = $_GET['cursus'];
                        $username = $_SESSION['ingelogd']['username'];

                        $conn = mysqli_connect('localhost', 'root', '', 'cursussen');

                        $sql = "INSERT INTO opgegeven (username, cursus) VALUES ('$username', '$cursus')";

                        if (mysqli_query($conn, $sql)) {
                            echo "<p class='opgegeven'>Je hebt je opgegeven voor de cursus: " . $_GET['cursus'] . '</p>';
                        }
                    }
                    ?>
    </center>
</body>

</html>