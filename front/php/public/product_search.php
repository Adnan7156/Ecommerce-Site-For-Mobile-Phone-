<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");

use App\Products;

$serach_product=new Products();
$serach_product->productSearch();

?>

<!doctype html>
<html lang="en">
<?php
include_once ("../view/elements/head.php");
?>
<body>



<?php
include_once ("../view/elements/header.php");
include_once ("../view/elements/products_search_results.php");
include_once ("../view/elements/footer.php");
include_once ("../view/elements/script.php");
?>


</body>
</html>