<html>

<head>
    <title>Users</title>
</head>

<body>

    <h1>Overzicht users</h1>

    <?php

    $conn =  mysqli_connect('localhost', 'root', '', 'cursussen');
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
    }
    ?>

</body>

</html>