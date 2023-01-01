<!Doctype html>
<html>
    <head>
        <title>wiatr w żagle</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="Stylesheet" href="static/css/style.css">
        <!-- <link rel="Stylesheet" href="static/css/galery.css"> -->

    </head>
    <body>
        <?php include_once '../views/static/header.php'?>

        <main>
            <?php

            function add($a,$b)
            {
                return $a+$b;
            }
            // $db=get_db();
            // $users=$db->users->find();
            // foreach($users as $user)
            // {
            //     print_r($user);
            //     echo '<br>';
            // }
            if($photos==NULL)
            {
                echo '<div>Obecnie brak Waszych zdjęć, prześlij nam jakieś swoje widoki i wrażenia</div>';
            }
            else
            {
                echo '<form method="post">';
                if(isset($_POST['photo']))
                {
                    $myboxes = $_POST['photo'];
                    if(empty($myboxes))
                    {
                      echo("You didn't select any boxes.");
                    }
                    else
                    {
                      $i = count($myboxes);
                      echo("You selected $i box(es): <br>");
                      for($j = 0; $j < $i; $j++)
                      {
                        echo $myboxes[$j] . "<br>";
                      }
                    }
                }
                foreach($photos as $photo)
                {
                    echo '<div class=photo>
                        <a href="/images/mark_'.$photo["name"].'" target="blank">
                        <img src="/images/mini_'.$photo["name"].'" target="blank" alt="tu powinien byc obrazek">
                        </a>
                        <p>Tytuł: '.$photo["title"].", autor: ".$photo["author"].'</p>';
                        echo '<input type="checkbox" name= "photo[]" value="'.$photo["name"].'">';
                        echo '</div>';
                }
                echo '<input type="submit" value="Zapisz polubione">
                </form>';
            }

            
            ?>
        </main>
        
        <?php include_once '../views/static/footer.php'?>
    </body>
</html>