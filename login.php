<?php
    require_once "business.php";

    function register()
    {
        $password=$_POST["psw"];
        $password_repeat=$_POST["psw_r"];
        $login=$_POST["login"];
        $mail=$_POST["mail"];

        $db = get_db();

        if($password===$password_repeat)
        {
            if(check_user($login) == false)
            {
                //if user doesn't exist
                $hash_psw = password_hash($password,PASSWORD_DEFAULT);

                $db->users->insertOne([
                    'mail' => $mail,
                    'login' => $login,
                    'password' => $hash_psw
                ]);


                session_regenerate_id();
                //$_SESSION['user_id'] = $user['_id'];
                $_SESSION['username'] = $login;

                header('Location: sender');
                exit;
            }
            else
            {
                //USER ALREADY EXIST
                //TODO
            }
        }
    }

    function login()
    {
        $password=$_POST["pswLogin"];
        $login=$_POST["loginLogin"];

        $db = get_db();

        $user = $db->users->findOne(['login' => $login]);

        if($user!== null &&
        password_verify($password, $user['password']))
        {
            session_regenerate_id();
            //$_SESSION['user_id'] = $user['_id'];
            $_SESSION['username'] = $login;
            header('Location: sender');
            exit;
        }
        else
        {
            //TODO
            //WRONG PASSWORD
        }

    }

    function logout()
    {
        session_destroy();
    }

    function check_user($login)
    {
        $db = get_db();
        $user = $db->users->findOne(['login' => $login]);
        if($user!=NULL)
        {
            return true;
        }
        else
        {
            return false;
        }
        //TODO
    }

?>