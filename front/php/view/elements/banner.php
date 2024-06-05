<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");



use App\Banners;

$_banner= new Banners();
$banners= $_banner->getActiveBanners();

?>


<section class="banner">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

        <?php
        $_active="active"; 
        foreach($banners as $banner):

        ?>
          <div class="carousel-item <?=$_active;?>">
            <img src="<?=$webroot;?>uploads/<?=$banner['picture'];?>" class="d-block w-100" alt="Banner">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>

          <?php
          $_active=" ";
          endforeach;
          ?>



      </div>
    </section>