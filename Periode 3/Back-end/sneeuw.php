<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sneeuw.css">
    <title>Sneeuw</title>
</head>

<body>
    <?php
    $checked = false;

    if ($_POST) {

        $checked = $_POST['sneeuw'];
    }
    ?>

    <h2>Kan ik naar school toe?</h2>

    <form action="" method="post">

        <input type="radio" id="ja" name="sneeuw" value="ja" <?php if ($_POST && $checked == 'ja') {
                                                                    echo 'checked';
                                                                } ?>>
        <label for="ja">Er ligt minder dan 10cm sneeuw</label><br>

        <input type="radio" id="nee" name="sneeuw" value="nee" <?php if ($_POST && $checked == 'nee') {
                                                                    echo 'checked';
                                                                } ?>>
        <label for="nee">Er ligt meer dan 10cm sneeuw</label><br>

        <input type="submit" value="Bepaal">
    </form>


    <?php

    if ($_POST) {
        if ($_POST['sneeuw'] == 'nee') {
            echo "De school is dicht!";
        } else {
            echo "De school is open!";
        }
    }

    ?>

</body>

</html>