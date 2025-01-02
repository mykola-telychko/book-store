<!-- content -->
<!-- content -->
<div id="content">



<!-- product card -->
<!-- product card -->

    <?php foreach ( $mod1 as $val ): ?>

<div class="product_card" style="">


<!-- image book -->
<!-- image book -->
    <div class="img_size">
      <img src="/../public/img/images/<?php echo $val['image']?>">
    </div>
<!-- image book -->
<!-- image book -->



<!-- info book -->
<!-- info book -->
<div class="info_book">

    <h4>Name :  <?php echo $val['title']?> </h4>

    <h4>Author :  <?php echo $val['author']?> </h4>

    <p><b>Description : </b>  <?php echo $val['description']?></p>

    <p><b> Price : </b>  <?php echo $val['price']?> UAH</p>


    <div class="more_btn"><a style="color: white; padding: 6px;"
       href="http://<?php echo conf::NameSite ?>/book/<?php echo $url[1].'/'.
    $url[2].'/'.$val['id'] ?>">check more</a></div>

</div>
<!-- info book -->
<!-- info book -->


</div>

    <?php  endforeach; ?>

<!-- product card -->
<!-- product card -->




<!-- pagination -->
<!-- pagination -->
<!-- pagination -->
<div class="pagination">
<p>
<?php

  foreach ( $mod2 as $value ) {
      echo $value;
  }

?>
</p>
</div>
<!-- pagination -->
<!-- pagination -->
<!-- pagination -->



</div>
<!-- content -->
<!-- content -->
