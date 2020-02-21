<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <div id="global">
        <header>
            <a href="index.php"><h1 id="titreBlog">Mon blog</h1></a>
            <p>Bienvenue sur ce petit blog.</p>
        </header>
        <div id="contenu">
            <?= $contenu ?>
        </div>
        <footer id="piedBlog">
                Blog réalisé avec PHP; HTML5 et CSS.
        </footer>
    </div> <!-- #global -->
</body>
</html>