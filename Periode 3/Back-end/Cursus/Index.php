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
        <form method="post" action="?" class="tabel-cursus">
            <table border="3px" cellspacing="0" cellpadding="5">
                <tr>
                    <td><b>Cursus</b></td>
                    <td><b>Omschrijving</b></td>
                    <td><b>Prijs</b></td>
                    <?php
                    if (isset($_SESSION['ingelogd'])) {
                        echo "<td><b>Aanmelden</b></td>";
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
                        echo "<td><a href='Index.php?cursus=" . $row['naam'] . "'>Aanmelden</a></td>";
                    }
                    echo "</tr>";
                }



                echo " 
        </table>
        </form>
    ";

                //ECHO NA SUBMIT
                if (isset($_GET['cursus'])) {
                    echo "Je hebt je opgegeven voor de cursus: " . $_GET['cursus'];
                }

                ?>
    </center>
</body>

</html>