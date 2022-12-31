<?php
require_once 'business.php';
require_once 'controller_utils.php';
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
    return 'galery';
}

function sender(&$model)
{
    return 'sender_view';
}

function send_to_server(&$model)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $response = upload_photo();
        $model['status'] = $response;
        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}

function registration(&$model)
{
    $response = register();
    $model['status'] = $response*100;
    return 'redirect:' . $_SERVER['HTTP_REFERER'];
    // return 'sender_view';
}

function logining(&$model)
{
    $response = login();
    $model['status'] = $response*100*100;
    return 'redirect:' . $_SERVER['HTTP_REFERER'];
    // return 'sender_view';
}

function logingout()
{
    logout();
    return 'redirect:' . $_SERVER['HTTP_REFERER'];
}

function products(&$model)
{
    $products = get_products();
    $model['products'] = $products;

    return 'products_view';
}

function product(&$model)
{
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        if ($product = get_product($id)) {
            $model['product'] = $product;
            return 'product_view';
        }
    }

    http_response_code(404);
    exit;
}

function edit(&$model)
{
    $product = [
        'name' => null,
        'price' => null,
        'description' => null,
        '_id' => null
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['name']) &&
            !empty($_POST['price']) /* && ...*/
        ) {
            $id = isset($_POST['id']) ? $_POST['id'] : null;

            $product = [
                'name' => $_POST['name'],
                'price' => (int)$_POST['price'],
                'description' => $_POST['description']
            ];

            if (save_product($id, $product)) {
                return 'redirect:products';
            }
        }
    } elseif (!empty($_GET['id'])) {
        $product = get_product($_GET['id']);
    }

    $model['product'] = $product;

    return 'edit_view';
}

function delete(&$model)
{
    if (!empty($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            delete_product($id);
            return 'redirect:products';

        } else {
            if ($product = get_product($id)) {
                $model['product'] = $product;
                return 'delete_view';
            }
        }
    }

    http_response_code(404);
    exit;
}

function cart(&$model)
{
    $model['cart'] = get_cart();
    return 'partial/cart_view';
}

function add_to_cart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $product = get_product($id);

        $cart = &get_cart();
        $amount = isset($cart[$id]) ? $cart[$id]['amount'] + 1 : 1;

        $cart[$id] = ['name' => $product['name'], 'amount' => $amount];

        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}

function clear_cart()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['cart'] = [];
        return 'redirect:' . $_SERVER['HTTP_REFERER'];
    }
}
