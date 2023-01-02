<?php
require_once 'business.php';
require_once 'photo.php';
require_once 'login.php';

function home()
{
    return 'index';
}

function licenses()
{
    return 'licenses';
}

function galery(&$model)
{
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }
    else
    {
        $page = 1;
    }
    
    $photos = get_paged_photos($page);
    //$photos = get_all_photos();
    $model['photos'] = $photos;
    $model['page'] = $page;
    return 'galery';
}

function nextPage()
{
    $page=$_GET['pagetmp'];
    $page++;
    return 'redirect: galery?page='.$page;
}

function previousPage()
{
    $page=$_GET['pagetmp'];
    if($page>1)
    {
        $page--;
    }
    return 'redirect: galery?page='.$page;
}

function sender()
{
    return 'sender_view';
}

function send_to_server()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $response = upload_photo();
        $_SESSION['status'] = $response;
        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}

function registration()
{
    $response = register();
    $_SESSION['status'] = $response*100;
    return 'redirect:' . $_SERVER['HTTP_REFERER'];
    // return 'sender_view';
}

function logining()
{
    $response = login();
    $_SESSION['status'] = $response*100*100;
    return 'redirect:' . $_SERVER['HTTP_REFERER'];
    // return 'sender_view';
}

function logingout()
{
    logout();
    return 'redirect:' . $_SERVER['HTTP_REFERER'];
}
