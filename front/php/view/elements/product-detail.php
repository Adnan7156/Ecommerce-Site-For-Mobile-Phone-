<div class="product-breadcrumb mt-4">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="product-details mt-5">
  <div class="container">
    <div class="row">
    <?php foreach($products as $product): ?>
      <div class="col-sm-5">
        <div class="xzoom-container">
          <img class="xzoom2" src="<?=$webroot;?>uploads/<?=$product['picture'];?>" style="max-width: 80%; height: auto;">
        </div> 
      </div>
      <?php 
      endforeach;
      ?>

  <?php foreach($products as $product): ?>
      <div class="col-sm-7">
        <div class="product-details">
          <div class="product-name">
            <h1 class="product_title entry-title text-uppercase"><?= $product['title']; ?></h1>
          </div>
          <div>
            <p class="price">&#2547; <?= $product['mrp']; ?></p> 
          </div>
          <div class="short-description">
            <h2 class="text-uppercase">Quick review:</h2>
            <p><?= $product['description']; ?></p> 
          </div>
        </div>
      </div>
      <?php endforeach?>
    </div>
  </div>
</section>

<div class="container mt-3">
  <div class="row justify-content-end">
    <div class="col-sm-4">
      <div class="add-cart text-right">
        <button type="button" class="btn btn-danger">
          <i class="fa-solid fa-cart-shopping"></i>
          <a href="../../../admin/carts/creat.php?id=<?= $product['id']; ?>" class="btn btn-danger">Add to cart</a>
        </button>
      </div>
    </div>
  </div>
</div>

<br><br>
          
<?php 
include_once("../view/elements/footer.php");
?>         
    


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="css/js/foundation.min.js"></script>
    <script src="css/js/setup.js"></script>