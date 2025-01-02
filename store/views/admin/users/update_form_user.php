<h4>Edit user</h4>

<label>Login</label>
<input type="text" id="upname" value="<?php echo $mod['login']; ?>"> <br>

<label>Password</label>
<input type="text" id="uppassword" > <br>

<label>Role</label>
<input type="text" id="uprole" value="<?php echo $mod['role']; ?>"> <br>
<input type="hidden" id="upid" value="<?php echo $mod['id']; ?>"> <br>


<input type="submit" id="update_user_sub" value="Редактировать пользователя"> <br>
<p id="show_user_res"></p>
