<?php
$bilagan1 = $_POST['bil1'];
$bilangan2 = $_POST['bil2'];
?>
<html>
    <head>
        <title>Contoh Request POST</title>
    </head>
    <body>
        <h1>Input dua bilangan</h1>
        <?php
        echo "<P>Anda telah memasukkan bilangan pertama = ".$bilangan1. "</P>";
        echo "<P>Anda telah memasukkan bilangan kedua = ".$bilangan2. "</p>";
        ?>
    </body>
</html>