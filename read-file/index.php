<html>
<head>
    <title>Utilisation des tableaux-6</title>
</head>
<body>
<ul>
    <?php
    // 1 : on ouvre le fichier
    $monfichier = fopen('tableau-06.txt', 'r+');
    // 2 : on lit la première ligne du fichier

    $ligne = fgets($monfichier);
    while ($ligne != false) {
        echo "<li><a HREF=\ " . $ligne . ">" . $ligne . "</a></li>";
        $ligne = fgets($monfichier);
    }

    // 3 : quand on a fini de l'utiliser, on ferme le fichier
    fclose($monfichier);
    ?>
</ul>
</body>
</html>