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
            if($photos==NULL)
            {
                echo '<div>Obecnie brak Waszych zdjęć, prześlij nam jakieś swoje widoki i wrażenia</div>';
            }
            else
            {
                echo '<form method="post">';

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
            ?>

                
                <div class="order">
                    <form method="get" action="previous">
                        <input type="submit" value="Poprzednia">
                        <input type="hidden" name="pagetmp" value="<?php echo $page;?>">
                    </form>
                    <?php 
                    echo $page;
                    ?>
                    <form method="get" action="next">
                        <input type="submit" value="Następna">
                        <input type="hidden" name="pagetmp" value="<?php echo $page;?>">
                    </form>
                </div>

                <?php
                //TODO
                //Extract it to new function in buiseness
                //add delter from favorite in new function
                if(isset($_POST['photo']))
                {
                    $myboxes = $_POST['photo'];
                    if(empty($myboxes))
                    {
                    //   echo("You didn't select any boxes.");
                    }
                    else
                    {
                      $i = count($myboxes);
                      echo("You selected $i box(es): <br>");
                      for($j = 0; $j < $i; $j++)
                      {
                        //TODO
                        //save photos to session
                        $myboxes[$j];
                        //set checked
                        echo $myboxes[$j] . "<br>";
                        if(!isset($_SESSION['favorite']))
                        {
                            $_SESSION['favorite']=[];
                        }
                      }
                    }
                }
            }

            ?>
        </main>
        
        <?php include_once '../views/static/footer.php'?>
    </body>
</html>