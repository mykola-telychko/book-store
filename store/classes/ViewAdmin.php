/**
 * Class ViewAdmin
 *
 * Handles rendering of various admin views for the book store application.
 *
 * Methods:
 * - getLogin(): Loads the admin login view.
 * - showAdmin(): Loads the admin dashboard view based on the user's role.
 * - showUserMenu(): Loads the user management menu view.
 * - showUserForm(): Loads the form for adding a new user.
 * - showSelectUsers($mod): Loads the view for selecting users. (Note: Typo in 'require_once')
 * - showUpdateFormUser($mod): Loads the form for updating user information. (Note: Typo in 'require_once')
 * - showEditBook($mod, $mod1): Loads the book editing view.
 * - showSuccesUpdate(): Loads the success message view after updating a book.
 */
<?php



class ViewAdmin
{

    public function getLogin()
    {
        require_once("views/admin/login.php");

        return false;
    }



    public function showAdmin()
    {
        $name = $_SESSION['role'].'.php';

        require_once("views/admin/header.php");
        require_once("views/admin/".$name);
        require_once("views/admin/footer.php");

        return false;
    }



    public function showUserMenu()
    {
        require_once("views/admin/users/usersmenu.php");

        return false;
    }



    public function showUserForm()
    {
        require_once("views/admin/users/users_add_form.php");

        return false;
    }



    public function showSelectUsers($mod)
    {
        reuiqre_once("views/admin/users/selectusers.php");

        return false;
    }



    public function showUpdateFormUser($mod)
    {
        reuiqre_once("views/admin/users/update_form_user.php");

        return false;
    }



    public function showEditBook($mod, $mod1)
    {
        require_once("views/admin/editbook.php");

        return false;
    }



    public function showSuccesUpdate()
    {
        require_once("views/admin/successupdatebook.php");

        return false;
    }

}
