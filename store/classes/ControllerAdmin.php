<?php


class ControllerAdmin
{
    function getAdmin()
    {
        $view = new ViewAdmin();

        if ( isset($_SESSION['role']) &&
             isset($_SESSION['id']) ) {

            $view->showAdmin();

            return false;

        }

        if ( !isset($_POST['login']) ) {

        $view->getLogin();

        return false;

        } else {

        $model = new ModelAdmin();

        $mod = $model->getAdmin();

        if ( $mod == true ) {

            $view->showAdmin();

        } else {

            $view->getLogin();//if error

        }
      }

        return false;
    }



    public function getExit()
    {
        unset($_SESSION['role']);
        unset($_SESSION['id']);

        header("Location: " . conf::Url);
        return false;
    }



    function insertUsers()
    {
        if ( !empty($_POST['name']) &&
             !empty($_POST['password']) &&
             !empty($_POST['role']) ) {

        $model = new ModelAdmin();

        $mod = $model->insertUsers();

        }

        if ( isset($_GET['adduserform']) &&
              $_GET['adduserform'] = 'adduserform' ) {

              $view = new ViewAdmin();

              $view->showUserForm();
        }

        if ( isset($_GET['edituser']) && $_GET['edituser'] == 'edituser' ) {

              $model = new ModelAdmin();

              $mod = $model->selectUsers();

              $view = new ViewAdmin();

              $view->showSelectUsers($mod);

        }

        if ( isset($_GET['id_edit']) ) {

              $model = new ModelAdmin();

              $mod = $model->selectOneUser();

              $view = new ViewAdmin();

              $view->showUpdateFormUser();

        }

        if ( !empty($_POST['upname']) &&
             !empty($_POST['uppassword']) &&
             !empty($_POST['uprole']) ) {

             $model = new ModelAdmin();

             $model->updatetUser();
        }

        return false;
    }



    public function editBook()
    {
        $model = new ModelAdmin();

        $mod = $model->getBook();

        $mod1 = $model->getAuthor();

        $view = new ViewAdmin();

        $view->showEditBook($mod, $mod1);

        return false;

    }



    public function updateBook()
    {
        $model = new ModelAdmin();

        $mod = $model->changeBook($id);

        $view = new ViewAdmin();

        $view->showSuccesUpdate();

        return false;
    }



    public function insertBook()
    {
        $model = new ModelAdmin();

        $mod = $model->addBook();

        $view = new ViewAdmin();

        $view->showSuccesUpdate();

        return false;
    }



    public function deleteBook($id)
    {
        $model = new ModelAdmin();

        $mod = $model->delBook($id);

        header("Location: http://store/editbook");

        return false;
    }


}
