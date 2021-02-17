<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cursussen</title>
</head>
<style>
    * {
        margin: 10px;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>

    <?php

    $ingelogd = "Inloggen";

    if (isset($_GET['ingelogd'])) {
        $ingelogd = 'Uitloggen';
    }

    $cursussen = [
        [
            'Cursus' => 'Software Developer',
            'Omschrijving' => 'Apps ontwikkelen',
            'Prijs' => '€35,00',
        ],
        [
            'Cursus' => 'Databases',
            'Omschrijving' => 'Database aanmaken',
            'Prijs' => '€40,00',
        ],
        [
            'Cursus' => 'Website Developen (HTML)',
            'Omschrijving' => 'Websites bouwen',
            'Prijs' => '€45,00',
        ],
        [
            'Cursus' => 'Website Developen (CSS)',
            'Omschrijving' => 'Websites opmaken',
            'Prijs' => '€50,00',
        ],
    ];

    ?>
    <center>
        <h1>Cursus aanmeldformulier</h1>

        <a href="#">Home</A>
        <a href="Login.php"><?php echo $ingelogd;
                            ?></a> <br>

        <form method="post" action="?">
            <table border="3px" cellspacing="0" cellpadding="5">
                <tr>
                    <td><b>Cursus</b></td>
                    <td><b>Omschrijving</b></td>
                    <td><b>Prijs</b></td>
                    <?php
                    if (isset($_GET['ingelogd'])) {
                        echo "<td><b>Aanmelden</b></td>";
                    }
                    ?>
                </tr>

                <?php

                foreach ($cursussen as $cursus) {
                    echo "
        <tr>   
            <td>" . $cursus['Cursus'] . "</td>
            <td>" . $cursus['Omschrijving'] . "</td>
            <td>" . $cursus['Prijs'] . "</td>";
                    if (isset($_GET['ingelogd'])) {
                        echo "<td><a href='Index.php?ingelogd&cursus=" . $cursus['Cursus'] . "'>Aanmelden</a></td>";
                    }
                    echo "</tr>";
                }

                echo " 
        </table>
        </form>
    ";

                if (isset($_GET['cursus'])) {
                    echo "Je hebt je opgegeven voor de cursus: " . $_GET['cursus'];
                }

                ?>

    </center>
</body>

</html>