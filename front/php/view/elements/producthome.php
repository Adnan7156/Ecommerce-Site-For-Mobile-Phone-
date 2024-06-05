<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Products;

$_products = new Products();
$products = $_products->getActiveProducts();
$newproducts = $_products->newproducts();
?>

<section class="products">
    <div class="container">
        <h2 class="text-uppercase">Sellers <span>choise</span></h2>
        
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($products as $product): ?>
                <div class="col">
                    <form action="<?= $webroot ?>admin/carts/store.php" method="post" enctype="multipart/form-data">
                        <div class="card h-100">
                            <a href="product-details.php?id=<?= $product['id']; ?>" title="<?= $product['title']; ?>">
                                <img src="<?= $webroot; ?>uploads/<?= $product['picture']; ?>" class="card-img-top" alt="Best Seller Image">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    <a href="product-details.php?id=<?= $product['id']; ?>"><?= $product['title']; ?></a>
                                </h5>
                                <p class="price">&#2547;<?= $product['mrp']; ?></p>
                                <p class="stock">Stock: <?= $product['stock']; ?></p>
                                <?php if ($product['stock'] > 0): ?>
                                    <p>
                                        <a href="<?= $webroot ?>admin/carts/creat.php?id=<?= $product['id']; ?>" class="btn btn-danger">Add to cart</a>
                                    </p>
                                <?php else: ?>
                                    <p>
                                        <button class="btn btn-secondary" disabled>Out of Stock</button>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="products">
    <div class="container">
        <h2 class="text-uppercase">New <span>Products</span></h2>
        
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($newproducts as $newproduct): ?>
                <div class="col">
                    <div class="card h-100">
                        <a href="product-details.php?id=<?= $newproduct['id']; ?>" title="<?= $newproduct['title']; ?>">
                            <img src="<?= $webroot; ?>uploads/<?= $newproduct['picture']; ?>" class="card-img-top" alt="Product Image">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <a href="product-details.php?id=<?= $newproduct['id']; ?>"><?= $newproduct['title']; ?></a>
                            </h5>
                            <p class="price">&#2547;<?= $newproduct['mrp']; ?></p>
                            <p class="stock">Stock: <?= $newproduct['stock']; ?></p>
                            <?php if ($newproduct['stock'] > 0): ?>
                                <p>
                                    <a href="<?= $webroot ?>admin/carts/creat.php?id=<?= $newproduct['id']; ?>" class="btn btn-danger">Add to cart</a>
                                </p>
                            <?php else: ?>
                                <p>
                                    <button class="btn btn-secondary" disabled>Out of Stock</button>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<br><br>
