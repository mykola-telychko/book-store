<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Books Store</title>


    <link rel="stylesheet" href="<?php  conf::NameSite ?>/public/css/default.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  </head>
  <body>


    <div id="tier2">Не найдено &nbsp;</div>

    <div id="wrapper">



<!-- header start -->
<!-- header start -->
  <div id="header">

    <h1>BOOKS  STORE</h1>


<!-- search start-->
<div id="tier">

  <div id="search">

    <form id="" action="" method="post">

      <span for="">Search</span> <br>
      <input type="text" name="" value="">

    </form>

  </div>

<div id="tier1">Search :</div>

</div>
<!-- search end-->


  </div>
<!-- header -->
<!-- header -->




<!-- mainmenu end -->
<!-- mainmenu end -->
<div id="mainmenu">

    <a href="http://<?php echo

    conf::NameSite ?>">Main Page</a>

    &nbsp;&nbsp;&nbsp;

    <a href="http://<?php echo conf::NameSite ?>/books/1/0/">Books</a>

</div>
<!-- mainmenu -->
<!-- mainmenu -->



<!-- cart section -->
<!-- cart section -->
<div id="cart_res" >

<strong>

<a href="<?php echo conf::Url ?>busket/">
Cart : <br> &nbsp;&nbsp;&nbsp;


Quantity :
<span>
  <?php echo $_SESSION['total_items'] ?>
</span> &nbsp;&nbsp;&nbsp;


Total price :
<span>
  <?php echo $_SESSION['total_price'] ?> UAH.
</span>
</a>

</strong>

</div>
<!-- cart section -->
<!-- cart section -->
