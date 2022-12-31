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

        <main>
            <?php
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
                foreach($photos as $photo)
                {
                    
                }
            }
            
            ?>
            <!-- <section class="animated-grid">
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
                <div class="card">aaa</div>
              </section> -->
              <?php

              ?>
        </main>
        
        <?php include_once '../views/static/footer.php'?>
    </body>
</html>