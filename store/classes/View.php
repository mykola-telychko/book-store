<?php

class View
{

    public function getIndex($mod)
    {
        require_once 'views/header.php';
        require_once 'views/leftmenu.php';
        require_once 'views/index.php';
        require_once 'views/footer.php';
    }



    public function getError($mod)
    {
        require_once 'views/header.php';
        require_once 'views/leftmenu.php';
        require_once 'views/error.php';
        require_once 'views/footer.php';
    }



    public function getBooks($mod, $mod1, $mod2)
    {
        $controller = new Controller();

        $url = $controller->getUrl();

        require_once 'views/header.php';
        require_once 'views/leftmenu.php';
        require_once 'views/books.php';
        require_once 'views/footer.php';

        return false;
    }



    public function getBook($mod, $mod1)
    {
        $controller = new Controller();

        $url = $controller->getUrl();

        require_once 'views/header.php';
        require_once 'views/leftmenu.php';
        require_once 'views/book.php';
        require_once 'views/footer.php';

        return false;
    }



    public function getCart()
    {
        echo '<strong><a href="'. conf::Url .'busket/">Cart : <br>

        &nbsp;&nbsp;&nbsp;

        Quantity : <span> '.$_SESSION['total_items'].' </span>

        &nbsp;&nbsp;&nbsp;

        Total price : <span>'.$_SESSION['total_price'].'</span></a> UAH</strong>';
    }



    public function getBusket($mod)// for render menu
    {
        require_once 'views/header.php';
        require_once 'views/leftmenu.php';
        require_once 'views/busket.php';
        require_once 'views/footer.php';

        return false;
    }



    public function emptyBusket($mod)
    {
        require_once 'views/header.php';
        require_once 'views/leftmenu.php';
        require_once 'views/emptybusket.php';
        require_once 'views/footer.php';

        return false;
    }



    public function showBusket($cart)
    {
        foreach ( $cart as $id => $qty ):

          $model = new Model();

          $book = $model->getBook($id);

          $str = '<tr>';
          $str .= '<td>' . $book[1] . '</td>';
          $str .= '<td>' . $book[8] . '</td>';
          $str .= '<td>' .  number_format($book[4], 2)  . ' UAH </td>';
          $str .= '<td><input type="text" name="' . $id . '"size="2" value="' . $qty . '"maxlength="2"></td>';

          $str .= '<td>' . $book[4] * $qty . ' UAH </td>';

          echo $str;

        endforeach;

        return false;
    }



    public function thankYou($mod)
    {
        require_once 'views/header.php';
        require_once 'views/leftmenu.php';
        require_once 'views/thankyou.php';
        require_once 'views/footer.php';

        return false;
    }


    public function getSearchBook($mod)
    {
        require_once 'views/searchbook.php';
    }
}
