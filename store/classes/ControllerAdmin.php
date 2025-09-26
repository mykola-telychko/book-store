/**
 * ControllerAdmin class handles administrative actions for the book store application.
 *
 * Methods:
 * - getAdmin(): Manages admin authentication and displays admin dashboard or login form.
 * - getExit(): Logs out the admin user and redirects to the main URL.
 * - insertUsers(): Handles user creation, editing, and updating through forms and model interactions.
 * - editBook(): Retrieves book and author data for editing and displays the edit book view.
 * - updateBook(): Updates book information and shows a success message.
 * - insertBook(): Adds a new book and shows a success message.
 * - deleteBook($id): Deletes a book by its ID and redirects to the edit book page.
 *
 * Dependencies:
 * - ModelAdmin: Handles data operations related to admin, users, and books.
 * - ViewAdmin: Manages rendering of admin-related views and forms.
 * - conf: Provides configuration constants (e.g., Url).
 *
 * Session and Request Handling:
 * - Utilizes $_SESSION for authentication and role management.
 * - Uses $_POST and $_GET for form submissions and user actions.
 */
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
