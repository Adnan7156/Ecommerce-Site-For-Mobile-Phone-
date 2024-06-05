<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Products;

$_product = new Products();

$category_id = null;
if (array_key_exists('category_id', $_GET) && $_GET['category_id']) {
    $category_id = $_GET['category_id'];
}


$sortOrder = 'asc'; 
if (isset($_GET['sort']) && in_array($_GET['sort'], ['asc', 'desc'])) {
    $sortOrder = $_GET['sort'];
}
$products = $_product->getProducts($category_id, $sortOrder);

?>
<br><br>
<section class="products">
    <div class="container">
        <!-- Sort dropdown -->
        <form method="GET" action="">
            <?php if ($category_id): ?>
                <input type="hidden" name="category_id" value="<?=($category_id); ?>">
            <?php endif; ?>
            <label for="sort">Sort by price:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="asc" <?php if ($sortOrder == 'asc') echo 'selected'; ?>>Ascending</option>
                <option value="desc" <?php if ($sortOrder == 'desc') echo 'selected'; ?>>Descending</option>
            </select>
        </form><br>
        

        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php if (count($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="card h-100">
                            <a href="product-details.php?id=<?= $product['id']; ?>" title="<?= $product['title']; ?>">
                                <img src="../../../../ecommerce_project backup/uploads/<?= $product['picture']; ?>" class="card-img-top" alt="Best Seller Image">
                            </a>
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="product-details.php?id=<?= $product['id']; ?>"><?= $product['title']; ?></a></h5>
                                <p class="price">&#2547;<?= $product['mrp']; ?></p>
                                <p class="stock">Stock:<?= $product['stock']; ?></p>
                                <?php if ($product['stock'] > 0): ?>
                                    <p>
                                        <a href="../../../admin/carts/creat.php?id=<?= $product['id']; ?>" class="btn btn-danger">Add to cart</a>
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
            <?php else: ?>
                <p>No product is found under this category</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<br><br>
