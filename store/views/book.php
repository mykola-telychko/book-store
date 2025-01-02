<!-- content -->
<!-- content -->
<div id="content">

<div style="padding-left: 30px;">


    <h4> Name : <?php echo $mod1[1] ?> </h4>

    <h4> Author :  <?php echo $mod1[8] ?> </h4>

    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $mod1[3] ?> </p>

    <strong><p>Price :   <?php echo $mod1[4] ?>  UAH </p></strong>

    <p>


<?php  if ( isset($url[1]) && isset($url[2]) ) {  ?>

        <a class="more_btn" style="color: white; padding: 6px;"
        href="<?php  conf::NameSite ?>/books/<?php echo $url[1] ?>/<?php echo $url[2] ?>">return to list</a>

<?php } ?>


      <!-- add to cart button -->
      <a class="more_btn" style="color: white; padding: 6px;"
      id="cart" data-id="<?php echo $mod1[0];/*$url[3];*/?>">add to cart</a>
      <!-- add to cart button -->
    </p>


</div>

</div>
<!-- content without localhost -->
<!-- content <php echo conf::HOST >/ -->
