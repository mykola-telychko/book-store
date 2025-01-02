<div id="content">

  <div style="padding-left: 30px;">


  <div id="busket">


<h2>cart</h2>


<!-- busket content -->
<!-- busket content -->
<!-- busket content -->
<form id="form" method="post" action="<?php echo conf::Url ?>updateCart/" >

  <table>

    <thead>

      <tr>

        <th>Book : </th>
        <th>Author : </th>
        <th>Price : </th>
        <th>Quantity: </th>
        <th>Amount: </th>

      </tr>

    </thead>



    <tbody>

<?php

    $view = new View();

    $view->showBusket($_SESSION['cart']);
?>

</tbody>
</table>



<!-- button refresh -->
<!-- button refresh -->
<p><input type="submit"  value="refresh cart" ></p>
<!-- button refresh -->
<!-- button refresh -->

</form>

</div>


<h3 id="order" class="order_btn"><span>+ TO ORDER</span></h3>
<h3 id="order2" class="order_btn" style="display: none;"> - HIDE</h3>

<!-- order -->
<!-- order -->
<div id="order1" style="display: none;  width: 100px;">




  <fieldset class="fildset-order form-order">


<form  method="post" action="<?php echo conf::Url ?>order/">

<!-- SEND MAIL -->
<!-- SEND MAIL -->


<!-- SEND MAIL -->
<!-- SEND MAIL -->


    <p>important fields *</p>

    <input type="hidden" name="project_name" value="<?php echo conf::NameSite; ?>">
    <input type="hidden" name="admin_email" value="<?php echo conf::ADMIN_MAIL; ?>"><!-- мейл админа -->
    <input type="hidden" name="form_subject" value="Form Subject"><!-- //тема письма -->


    <label for="">* Name : </label> <br>
    <input id="validateName" type="text" name="name" value=""> <span></span> <br>


    <label for="">* Email : </label> <br>
    <input id="validateEmail" type="text" name="email" value=""> <span></span> <br>


    <label for="">* Phone : </label> <br>
    <input id="validatePhone" type="text" name="phone" value=""> <span></span> <br>


    <label for=""> Address: </label> <br>
    <input type="text" name="address" value=""> <br>


    <label for=""> Wishes : </label> <br>
    <textarea name="wishes" rows="4" cols="45"></textarea> <br>

    <p>Your order :</p>
      <table>
        <thead>
          <tr>
            <th>Book : </th>
            <th>Author : </th>
            <th>Price : </th>
            <th>Quantity: </th>
            <th>Amount: </th>
          </tr>
        </thead>
        <tbody>
<?php

    $view = new View();
    $view->showBusket($_SESSION['cart']);
    $method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;

 if ( $method === 'GET' ) {

	$form_subject = trim($_POST['email']);
  $cart = $_SESSION['cart'];


	foreach ( $cart as $key => $value ) {

    $model = new Model();

    $book = $model->getBook($key);

		if ( !empty($value) &&
         $key != "project_name" &&
         $key != "admin_email" &&
         $key != "form_subject" ) {

			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
				<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>". $key . "</b></td>
				<td style='padding: 10px; border: #e9e9e9 1px solid;'>". $value . "</td>
			</tr>
		 <table>
          <thead>
            <tr>
              <th>Book : </th>
              <th>Author : </th>
              <th>Price : </th>
              <th>Quantity: </th>
              <th>Amount: </th>
            </tr>
          </thead>
          <tbody>" . "<tr>
       <td> ". $book[1] ." </td>;
       <td> ". $book[8] ." </td>;
       <td> ".  $book[4]  ."  UAH </td>;
       <td><input type='text' name=' ". $id ." 'size='2' value=' ". $value ." 'maxlength='2'></td>;

      '<td>' ". $book[4] * $value ." ' UAH </td>'" ;





		}
	}
}






$message .= "<table style='width: 100%;'>".$message."</table>";


function getPost($post){
  foreach ( $post as $k => $v ) {

     $msg = $v . "<br>";
  }
  return $msg;
}

getPost($_POST);

$message .= $msg;

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}


$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.'store' . PHP_EOL .
'Reply-To:'. $_POST['email'] .    PHP_EOL;






mail( conf::ADMIN_MAIL , adopt($form_subject), $message , $headers );




?>
    </tbody>
    </table>




    <input type="submit" id="validateButton"  value="Отправить заказ">


</form>


<hr>

<form id="formtwo" class="form-order" method="post" action="<?php echo conf::Url ?>updateCart/" >


</form>
  </fieldset>

</div>
<!-- order -->
<!-- order -->

  </div>

</div>
<!-- busket content -->
<!-- busket content -->
<!-- busket content -->

<!-- js for send mail -->
<!-- js for send mail -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo conf::Url; ?>public/js/mail.js"></script>
<!-- js for send mail -->
<!-- js for send mail -->


<?php




?>
