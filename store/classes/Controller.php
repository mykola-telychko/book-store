<?php

class Controller
{

    public function __construct()
    {
        if ( !isset($_SESSION['cart']) ) {

            $_SESSION['cart'] = array();

            $_SESSION['total_items'] = 0;

            $_SESSION['total_price'] = 0.00;

        }
    }



    public function getURL()
    {
        $url = !isset($_GET['url']) ? 'index' : $_GET['url'];

        $url = rtrim($url, '/');

        $url = explode('/', $url);

        return $url;
    }



    public function getIndex()
    {
        $model = new Model();

        $mod = $model->getMenu();

        $view = new View();

        $view->getIndex($mod);

        return false;
    }



    public function getError()
    {
        $model = new Model();

        $mod = $model->getMenu();

        $view = new View();

        $view->getError($mod);

        return false;
    }



    public function getBooks()
    {
        $model = new Model();

        $view = new View();

        $mod = $model->getMenu();

        $mod1 = $model->getContent();

        $mod2 = $model->getPage();

        if ( $mod2 == false ) return false;

        $view->getBooks($mod, $mod1, $mod2);

        return false;
    }



    public function getBook()
    {
        $model = new Model();

        $view = new View();

        $url = $this->getUrl();

        $mod = $model->getMenu($url[0]);

        $mod1 = $model->getBook($url[3]);

        if ( $mod1 == false ) {

            $view->getError($mod);

            return false;
        }

        $view->getBook($mod, $mod1);

        return false;
    }



    public function addToCart($id)
    {
        if ( isset($_SESSION['cart'][$id]) ) {

            $_SESSION['cart'][$id]++;

            return true;

        } else {

            $_SESSION['cart'][$id]= 1;

        }

        return false;

    }



    public function getCart($id)
    {
        $this->addToCart($id);

        $this->totalItems($_SESSION['cart']);

        $this->totalPrice($_SESSION['cart']);

        $view = new View();

        $view->getCart();
    }



    public function getBusket()
    {
        $model = new Model();

        $mod = $model->getMenu();

        $view = new View;

        if ( empty($_SESSION['cart']) ) {


            $view->emptyBusket($mod);

            return false;

        }

        $view->getBusket($mod);
    }



    # iteration array cart with foreach
    public function updateCart()
    {
        foreach ( $_SESSION['cart'] as $id => $qty ) {

            if ( $_POST[$id] == '0' || $_POST[$id] == '') {

                unset($_SESSION['cart'][$id]); //session_destroy();


            } else {

                $_SESSION['cart'][$id] = $_POST[$id];


            }
        }

        $this->totalItems($_SESSION['cart']);
        $this->totalPrice($_SESSION['cart']);

        header('Location: ' . conf::Url.'busket');
    }



    public function totalItems($cart)
    {
        $num_items = 0;

        foreach ( $cart as $id => $qty ) {

            $num_items += $qty;

        }

        $_SESSION['total_items'] = $num_items;
    }



    public function totalPrice($cart)
    {
        $mod = new Model();

        $price = 0.00;

        if ( is_array($cart) ) {

            foreach ( $cart as $id => $qty ) {

                $item_price = $mod->getPrice($id);

                $price += $item_price * $qty;

            }
        }

        $_SESSION['total_price'] = $price;

        return false;
    }



    public function insertBusket()
    {
        $model = new Model();

        $model->insertBusket();

        return false;
    }



    public function thankYou()
    {
        $model = new Model();

        $mod = $model->getMenu();

        $view = new View();

        $view->thankYou($mod);

        return false;
    }



    public function getSearch()
    {
        $model = new Model();

        $model->getSearch();

        return false;
    }



    public function getSearchProduct($id)
    {
        $model = new Model();

        $mod = $model->getBook($id);

        $view = new View();

        $view->getSearchBook($mod);

        return false;
    }



    public function searchProduct($id)
    {
        $model = new Model();

        $view = new View();

        $mod = $model->getMenu();//$url[0]

        $mod1 = $model->getBook($id);

        if ( $mod1 == false ) {

            $view->getError($mod);

            return false;
        }

        $view->getBook($mod, $mod1);

        return false;
    }







}
