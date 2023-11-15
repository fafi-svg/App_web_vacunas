<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    $text   = "\t\tThese are a few words :) ...  ";
    $binary = "\x09Example string\x0A";
    $hello  = "Hello World";
    var_dump($text, $binary, $hello);

    print "\n";
    echo "</br>";
    $trimmed = trim($text);
    var_dump($trimmed);
    echo "</br>";
    $trimmed = trim($text, " \t.");
    var_dump($trimmed);
    echo "</br>";
    $trimmed = trim($hello, "Hdle");
    var_dump($trimmed);
    echo "</br>";
    $trimmed = trim($hello, 'HdWr');
    var_dump($trimmed);
    echo "</br>";
    // Elimina los caracteres de control ASCII al inicio y final de $binary
    // (from 0 to 31 inclusive)
    $clean = trim($binary, "\x00..\x1F");
    var_dump($clean);

?>
</body>
</html>