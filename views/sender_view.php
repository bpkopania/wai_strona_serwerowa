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
                    <label for="file">Plik:</label>
                    <input type="file" name="photo"/><br>
                    <label for="waterMark">Znak Wodny:</label>
                    <input type="text" name="waterMark"/><br>
                    <label for="title">Tytuł:</label>
                    <input type="text" name="title"/><br>
                    <?php
                        if(!isset($_SESSION['username']))
                        {
                            echo '<label for="author">Autor:</label>
                            <input type="text" name="author"/><br>';
                        }
                        else
                        {
                            echo ' <input type="hidden" name="author" value="'.$_SESSION['username'].'"/>';
                        }
                    ?>
                    <input type="submit" value="Prześlij"/><br>
                </form>
                <?php
                    if(isset($_SESSION['status']))
                    {
                        $status = $_SESSION['status'];
                        $status = $status%100;
                        if($status != 0)
                        {
                            if($status%10 != 0)
                            {
                                echo '<div class="error">Plik jest za duży. Maksymalny rozmiar pliku to 1MB.</div>';
                            }
                            $status=$status-$status%10;
                            if($status != 0)
                            {
                                echo '<div class="error">Niepoprawny format pliku. Plik musi być jpg lub png.</div>';
                            }
                        }
                    }
                ?>
            </div>

            <?php
            //errors for login is 10000
            //errors for registration is 100
                if(!isset($_SESSION['username']))
                {
                    echo "
                    <div class=\"login\">
                        <p>Zaloguj się</p>
                        <form action=\"login\" method=\"post\">
                            <label for=\"login\">Login:</label>
                            <input type=\"text\" id=\"loginLogin\" name=\"loginLogin\">
                            <br>
                            <label for=\"psw\">Hasło:</label>
                            <input type=\"password\" id=\"pswLogin\" name=\"pswLogin\">
                            <br>
                            <input type=\"submit\" value=\"Zaloguj się\">
                        </form>";
                    if(isset($_SESSION['status']))
                    {
                        $status = $_SESSION['status'];
                        $temp = $status%10000;
                        $status = $status - $temp;
                        if($status != 0)
                        {
                            echo '<div class="error">Niepoprawny login lub hasło</div>';
                        }
                    }    
                    
                    echo "
                        <br>
                        <p>Zarejestruj się</p>
                        <form action=\"register\" method=\"post\">
                            <label for=\"mail\">E-mail:</label>
                            <input type=\"text\" id=\"mail\" name=\"mail\">
                            <br>
                            <label for=\"login\">Login:</label>
                            <input type=\"text\" id=\"login\" name=\"login\">
                            <br>
                            <label for=\"psw\">Hasło:</label>
                            <input type=\"password\" id=\"psw\" name=\"psw\">
                            <br>
                            <label for=\"psw_r\">Powtórz Hasło:</label>
                            <input type=\"password\" id=\"psw_r\" name=\"psw_r\">
                            <br>
                            <input type=\"submit\" value=\"Zaloguj się\">
                        </form>";
                    if(isset($_SESSION['status']))
                    {
                        $status = $_SESSION['status'];
                        $temp = $status%100;
                        $status = $status - $temp;
                        $status = $status/100;
                        if($status%100 != 0)
                        {
                            echo '<div class="error">Ta nazwa użytkownika jest już zajęta</div>';
                        }
                    }  
                    echo"</div>";
                }
                else
                {
                    echo 
                    "<div>
                    <p>Witaj, ".
                    $_SESSION['username'].
                    "!</p>
                    <br>
                    <form action=\"logout\" method=\"post\">
                        <input type=\"submit\" value=\"Wyloguj się\">
                    </form>
                    </div>";
                }
            ?>

            
        </main>
        
        
        
        <?php include_once '../views/static/footer.php'?>
    </body>
</html>