<?php
    require_once "business.php";

    function register()
    {
        $password=$_POST["psw"];
        $password_repeat=$_POST["psw_r"];
        $login=$_POST["login"];
        $mail=$_POST["mail"];

        $status = 0;

        $db = get_db();

        if($password===$password_repeat && $password!='' && $login!='' && $mail!='')
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
                $_SESSION['username'] = $login;

                header('Location: sender');
                return $status;
                //exit;
            }
            else
            {
                //USER ALREADY EXIST
                $status = 1;
            }
        }
        return $status;
    }

    function login()
    {
        $password=$_POST["pswLogin"];
        $login=$_POST["loginLogin"];
        $status=0;

        $db = get_db();

        $user = $db->users->findOne(['login' => $login]);

        if($user!== null &&
        password_verify($password, $user['password']))
        {
            session_regenerate_id();
            //$_SESSION['user_id'] = $user['_id'];
            $_SESSION['username'] = $login;
            header('Location: sender');
            return $status;
            //exit;
        }
        else
        {
            $status=1;
            //WRONG PASSWORD
        }

        return $status;
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
    }

    function get_all_users()
    {
        $db = get_db();
        $photos = $db->photos->find();
        return $photos;
    }

    function delete_users()
    {
        $db = get_db_admin();
        $db->photos->drop();
    }
?>