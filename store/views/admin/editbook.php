<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>edit books table in db</title>
    <link rel="stylesheet" href="<?php echo conf::Url; ?>public/css/editbook.css">
  </head>
  <body>
<h2 class="h_padd">Edit book list</h2>

<table style="width:200px; border: 1px solid black; background-color: #D3D3D3; border-radius:  3px; float: right; margin-right: 80px;">


  <tr style="height: 10px;">

    <th class="category ">
      <h3 class="h1-position">Categories </h3>
      <h4>id for new book</h4>
    </th>

  <tr>
  <tr>
    <td>

<ol>

<li>PHP</li>
<li>C/C++</li>
<li>JAVA</li>
<li>JavaScript</li>
<li>C#</li>
<li>Python</li>
<li>SQL</li>
<li>Other</li>

</ol>

    </td>

  </tr>

</table>



<!-- add book form begin -->
<!-- add book form begin -->
<form class="" action="<?php echo conf::Url ?>addbook" method="post">
    <div class="edit_table add_book" style="margin-left: 100px;">

      <h3  class="h_padd">Add new book to db</h3>
        <table style="width:60%; ">

          <tr>
            <th>Name</th>
            <td><input class="field_" type="text" name="name" required></td>
          </tr>

          <tr>
            <th>Author</th>
            <td><input class="field_" type="text" name="author" required></td>

          </tr>

          <tr>
            <th>Body  </th>
            <td><textarea name="body" rows="5" cols="80" required></textarea></td>
          </tr>

          <tr>
            <th>Description  </th>
            <td><input class="field_" type="text" name="description" placeholder="Pattern: Page: 000; Lang: __; Year: 0000;" required></textarea></td>
          </tr>

          <tr>
            <th>Category  </th>
            <td><input type="numeric" name="category" placeholder="Numeric - 00" required></td>
          </tr>

          <tr>
            <th>Price  </th>
            <td><input type="numeric" name="price" placeholder="00.00" required></td>
          </tr>

          <tr>
            <th>Image  </th>
            <td><input type="text" name="image" placeholder="picture.jpg" required></td>
          </tr>

        </table>
        <input class="addnewbook" type="submit" name="" value="ADD NEW BOOK [+]">

    </div>
</form>
<!-- add book form end -->
<!-- add book form end -->



<!-- add book form begin -->
<!-- add book form begin -->

<?php

for ( $i = 0; $i <= count($mod); $i++ ) {

    $mod3 = $mod[$i] + $mod1[$i];

?>


<form  action="<?php echo conf::Url ?>updatebook" method="post">

<div class="edit_table add_book" style="margin-left: 100px;">

    <h3  class="h_padd">Edit book in db</h3>
    <table style="width:60%; ">


      <tr>

        <th>ID</th>
        <td><input class="field_" type="text"
        name="id" value="<?php echo $mod3['id'];?>" readonly="readonly" required>

        <a class="cutty" href="<?php echo conf::Url ?>deletebook/<?php echo $mod3['id']; ?>"><input class="deletetable " type="button" name="" value="DELETE TABLE [x]" required></td></a>

      </tr>


      <tr>
        <th>Name</th>
        <td><input class="field_" type="text"
        name="name" value="<?php echo $mod3['title'];?>" required></td>
      </tr>



      <tr>
        <th>Author</th>
        <td><input class="field_" type="text"
        name="author" value="<?php echo $mod3['author'];?>" required></td>
      </tr>



      <tr>
        <th>Description  </th>
        <td><input class="field_" type="text" name="description"
        placeholder="Pattern: Page: 000; Lang: __; Year: 0000;"
        value="<?php echo $mod3['description'];?>" required></td>
      </tr>

      <tr>
        <th>Body  </th>
        <td><textarea name="body" rows="5"
        cols="80" ><?php echo $mod3['body'];?></textarea></td>
      </tr>

      <tr>
        <th>Category  </th>
        <td><input type="text" name="category"
        value="<?php echo $mod3['id_cat'];?>" placeholder="" required></td>
      </tr>

      <tr>
        <th>Image  </th>
        <td><input type="text" name="image"
        value="<?php echo $mod3['image'];?>" placeholder="00.00" required></td>
      </tr>

      <tr>
        <th>Price  </th>
        <td><input type="text" name="price"
        value="<?php echo $mod3['price'];?>" required></td>
      </tr>

    </table>
    <input class="savebook" type="submit" name="" value="SAVE" >


</div>

</form>


<?php } ?>

<!-- add book form end -->
<!-- add book form end -->


  </body>
</html>
