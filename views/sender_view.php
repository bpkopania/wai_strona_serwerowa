<!Doctype html>
<html>
    <head>
        <title>wiatr w żagle</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Stylesheet" href="static/css/style.css">
        <link rel="Stylesheet" href="static/css/sender.css">

    </head>
    <body>
        <?php include_once '../views/static/header.php'?>

        <main>
            <div class="form">
                <form method="post" enctype="multipart/form-data" action="send">
                    <input type="file" name="photo"/><br>
                    <input type="text" name="waterMark"/><br>
                    <input type="hidden" name="login"/><br>
                    <input type="submit" value="Prześlij"/><br>
                </form>
            </div>

            <div class="login">
            <p>Zaloguj się</p>
                <form action="login.php" method="post">
                    <label for="login">Login:</label>
                    <input type="text" id="loginLogin" name="loginLogin">
                    <br>
                    <label for="psw">Hasło:</label>
                    <input type="password" id="pswLogin" name="pswLogin">
                    <br>
                    <input type="submit" value="Zaloguj się">
                </form>
                <br>
                <p>Zarejestruj się</p>
                <form action="register.php" method="post">
                    <label for="login">Login:</label>
                    <input type="text" id="login" name="login">
                    <br>
                    <label for="psw">Hasło:</label>
                    <input type="password" id="psw" name="psw">
                    <br>
                    <label for="psw_r">Powtórz Hasło:</label>
                    <input type="password" id="psw_r" name="psw_r">
                    <br>
                    <input type="submit" value="Zaloguj się">
                    <input type="reset" value="Od nowa">
                </form>
            </div>
        </main>
        
        
        
        <?php include_once '../views/static/footer.php'?>
    </body>
</html>