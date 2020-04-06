<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="webroot/css/style.css">
    <title>PiePHP</title>
</head>
<body>
    <pre>
        <?php 
            define ('BASE_URI', str_replace ('\\', '/', substr ( __DIR__ , strlen($_SERVER['DOCUMENT_ROOT']) ) ) ) ;
            require_once ( implode ( DIRECTORY_SEPARATOR , ['Core','autoload.php']) ) ;

            $app = new Core\Core() ;
            $app -> run();

            // echo "Contenu de POST : ";
            // print_r($_POST);
            // echo "Contenu de GET : ";
            // print_r($_GET);
            // echo "Contenu de SERVER : ";
            // print_r($_SERVER);
        ?>
    </pre>
</body>
</html>