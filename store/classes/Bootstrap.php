/**
 * Class Bootstrap
 *
 * The Bootstrap class is responsible for initializing the application session and routing
 * incoming requests to the appropriate controller methods based on the URL structure.
 * It creates instances of Controller and ControllerAdmin, parses the URL, and dispatches
 * actions such as displaying books, handling cart operations, processing orders, searching,
 * and managing admin functionalities.
 *
 * Routing is handled via a switch statement on the first URL segment, with additional
 * validation and parameter checks for each case. Error handling is performed by invoking
 * the getError() method on invalid requests.
 *
 * Usage:
 *   Instantiate this class at the entry point of the application to start session and route requests.
 */
<?php

class Bootstrap
{

    public function __construct()
    {
        session_start();

        $controller = new Controller();

        $controllerAdmin = new ControllerAdmin();

        $url = $controller->getURL();


        switch ($url[0]) {



            case 'index':

                $controller->getIndex();

            break;




            case 'books':

                if ( isset($url[3]) ) {
                    $controller->getError();
                    return false;
                }

                if ( isset($url[1] ) &&
                is_numeric($url[2]) &&
                is_numeric($url[1]) &&
                is_numeric($url[2])) {
                $controller->getBooks();
              } else {
                $controller->getError();
              }

            break;




            case 'book':

                if ( isset($url[3] ) &&
                is_numeric($url[3])) {
                $controller->getBook();
              } else {
                $controller->getError();
              }

            break;




            case 'cart':

                if ( isset($url[1] ) &&
                is_numeric($url[1])) {
                $controller->getCart($url[1]);
                }

            break;




            case 'busket':

                $controller->getBusket();

            break;




            case 'updateCart':

                $controller->updateCart();

            break;




            case 'order':

                if ( isset($_POST['name']) ) {
                $controller->insertBusket();
              //   require_once 'Model.php';
              //   $model = new Model();
              // print_r($model->sendMail()) ;

              } else {
                $controller->getError();
              }

            break;



            case 'search':

                if ( isset($url[1]) && $url[1] == 1 ) {
                    if ( isset($_POST['id']) ) {
                        sleep(0.5);
                      $controller->getSearchProduct($_POST['id']);
                    } else {$controller->getError();}
                } else {

                if ( isset($_POST['search']) ) {
                        sleep(0.5);
                        $controller->getSearch();
                        echo $search = $_POST['search'];
                }}

            break;



            case 'searchproduct':

                if ( isset($url[1]) && is_numeric($url[1]) ) {
                    $controller->searchProduct($url[1]);
                } else {
                    $controller->getError();
                }

            break;



            case 'admin':

                    $controllerAdmin->getAdmin();

            break;



            case 'exit':

                if ( isset($url[0]) && is_string($url[0]) ) {
                    $controllerAdmin->getExit();
                }

            break;



            case 'editbook':

                $controllerAdmin->editBook();

            break;



            case 'updatebook':

                $controllerAdmin->updateBook();

            break;



            case 'deletebook':

                $controllerAdmin->deleteBook($url[1]);

            break;



            case 'addbook':

                $controllerAdmin->insertBook();

            break;



            default:

                $controller->getError();

            break;
        }
    }
}
