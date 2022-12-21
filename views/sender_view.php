<!Doctype html>
<html>
    <head>
        <title>wiatr w żagle</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Stylesheet" href="static/css/style.css">
        <link rel="Stylesheet" href="static/css/galery.css">

    </head>
    <body>
        <?php include_once '../views/static/header.php'?>

        <form method="post" enctype="multipart/form-data" action="send">
            <input type="file" name="photo"/>
            <input type="submit" value="Prześlij"/>
        </form>
        
        <?php include_once '../views/static/footer.php'?>
    </body>
</html>