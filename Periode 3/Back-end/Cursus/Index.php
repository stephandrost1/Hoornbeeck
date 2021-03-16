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
    <h1 class="home-header">Cursus Voor Websites</h1>
    <p class="home-text">Een goede, zo makkelijk mogelijke cursus om jou de techniek te leren, om zelf een website te gaan bouwen</br> waaronder mooie designs en databases!</p>

    <!--BUTTONS-->
    <a href="./Index.php"><button class="cursussen-btn cu-btn">Cursussen</button></a>
    <?php
    if (isset($_SESSION['ingelogd'])) {
        echo '<a href="Uitloggen.php"><button class="inlog-btn inloggen-btn">
                    Uitloggen
                </button></a>';
    } else {
        echo '<a href="Login.php"><button class="inlog-btn inloggen-btn">
                    Inloggen
                </button></a>';
    }
    ?>
    <!--IMAGE-->
    <img class="web-image" src="./Images/Screenshot_1.png" alt="Webdesign image">

</body>

</html>