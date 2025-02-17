<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Carts;
$userId = $_SESSION['user_id'];
$_cart = new Carts();
$carts = $_cart->getUserCartProducts($userId);
?>

<div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <h2 class="text-center">Shoping cart</h2>
        <table class="table table-bordered mt-3">

          <thead>
            <tr>
                    <th scope="col">Product</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                     <th scope="col">Total Price</th>
            </tr>

          </thead>
          <tbody>
            
          <?php
                    $grandTotal = 0;
                    foreach($carts as $cart):
                      $grandTotal += $cart['total_price'];

                      ?>
            <tr>
              <td><?=$cart['producttitle'];?></td>
              <td><img src="<?=$webroot?>uploads/<?= $cart['picture'] ?>" alt="Product Img" width="70" height="70"></td>
              <td><?=$cart['mrp'];?></td>
              <td><?=$cart['qty'];?></td>
              <td><?=$cart['total_price'];?></td>
  

              <td>

                <form action="delete-cart-product.php" method="post">
                <button type="submit" class="btn btn-sm btn-danger">
                <i class="fas fa-trash-can"></i>
              </button>

              <input type="hidden" name="cart_id" value="<?=$cart['id'];?>">
              </form>

            </td>
            
            </tr>
            <?php 
            endforeach;
            ?>
            <tr>
              <td>Grand Total: </td>
              <td colspan="3"></td>
              <td><?= $grandTotal ?></td>
              <td></td>
            </tr>
          </tbody>
        </table>

        

          <div class="d-flex justify-content-between mt-4">
                <a href="product.php">
                    <button type="button" class="btn btn-secondary">Continue Shopping</button>
                </a>
                <div>
                    <a href="../view/elements/checkout.php?total_price=<?= $grandTotal ?>" class="btn btn-primary">Proceed to Checkout</a>
                </div>
        </div>
      
      </div>
    
    </div>
  </div>
  <br><br>