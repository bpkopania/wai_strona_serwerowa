<?php


use MongoDB\BSON\ObjectID;


function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function get_db_admin()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'admin',
            'password' => 'p@ssw0rd',
        ]);

    $db = $mongo->wai;

    return $db;
}

function favorite_add()
{
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
          //echo("You selected $i box(es): <br>");
          for($j = 0; $j < $i; $j++)
          {
            //TODO
            //save photos to session
            $myboxes[$j];
            //set checked
            //echo $myboxes[$j] . "<br>";
            if(!isset($_SESSION['favorite']))
            {
                $_SESSION['favorite']=[];
            }
          }
        }
    }
}
