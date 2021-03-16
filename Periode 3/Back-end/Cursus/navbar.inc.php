<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<header>
    <div class="menu-toggle" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <nav>
            <h1 class="brand"><a href="Home.php">Cur<span>s</span>us</a></h1>
            <ul>
                <li style="text-decoration: none;"><a href="Index.php">Home</a></li>
                <li><a href="Cursus.php">Cursussen</a></li>
                <?php
                if (isset($_SESSION['ingelogd'])) {
                    echo '<li><a href="Uitloggen.php">Uitloggen</a></li>';
                } else {
                    echo '<li><a href="Login.php">Inloggen</a></li>';
                }
                if (isset($_SESSION['ingelogd']['perms']) && $_SESSION['ingelogd']['perms'] != 'admin') {
                    echo '<li><a href="Account.php">Account</a></li>';
                }

                if (isset($_SESSION['ingelogd']['perms']) && $_SESSION['ingelogd']['perms'] == 'admin') {
                    echo '<li><a href="admin.php">Admin</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>