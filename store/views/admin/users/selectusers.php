<div id="selectusers">

    <table>
      <tr>

        <td><strong>Login</strong></td>
        <td><strong>Edit</strong></td>
        <td><strong>Delete</strong></td>

      </tr>

<?php foreach ( $mod as $value ): ?>

  <tr>

    <td><?php echo $value['login']; ?></td>
    <td><input data-edit="<?php echo $value['id']; ?>" type="button" value="Edit"></td>
    <td><input data-delete="<?php echo $value['id']; ?>" type="button" value="Delete"></td>

  </tr>

<?php endforeach; ?>

    </table>

</div>
