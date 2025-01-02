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
