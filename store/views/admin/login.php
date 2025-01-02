<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo conf::Url;?>public/css/admin.css">
  </head>
  <body>

<h3>Go to admin dashboard</h3>

<div id="login">

<fieldset>



  <form class="" action="<?php echo conf::Url;?>admin/" method="post">

    <label>Login : </label><br>
      <input type="text" name="login"><br>

    <label>Password : </label><br>
      <input type="password" name="password"><br>

    <label>Role : </label><br>
      <input type="text" name="role"><br>

      <input type="submit" value="Please double click">

  </form>




</fieldset>

</div>



  </body>
</html>
