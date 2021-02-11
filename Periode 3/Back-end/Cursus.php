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
        <form method="post" action="?">
            <label><b>Naam:</b></label>
            <input type="text" name="naam" autocomplete="off">
            <table border="3px" cellspacing="0" cellpadding="5">
                <tr>
                    <td><b>Cursus</b></td>
                    <td><b>Omschrijving</b></td>
                    <td><b>Prijs</b></td>
                    <td><b>Aanmelden</b></td>
                </tr>

                <?php

                foreach ($cursussen as $cursus) {
                    echo "
        <tr>   
            <td>" . $cursus['Cursus'] . "</td>
            <td>" . $cursus['Omschrijving'] . "</td>
            <td>" . $cursus['Prijs'] . "</td>
            <td><input type='submit' value='Aanmelden'></td>
        </tr>
        ";
                }

                echo " 
        </table>
        </form>
    ";

                if ($_POST) {
                    if ($_POST['naam']) {
                        echo $_POST['naam'] . ' heeft zich opgegeven voor een cursus!';
                    } else {
                        echo 'Iemand heeft zich opgegeven voor een cursus!';
                    }
                }


                ?>

    </center>
</body>

</html>