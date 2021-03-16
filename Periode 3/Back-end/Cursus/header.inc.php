<?php

session_start()

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cursussen</title>
    <link rel="stylesheet" href="style.css">
    <script src="Popup.js"></script>
</head>

<?php

function consoleLog($msg)
{
    echo '<script type="text/javascript">console.log('
        . str_replace('<', '\\x3C', json_encode($msg))
        . ');</script>';
}

?>