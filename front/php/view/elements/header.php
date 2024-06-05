<?php

include_once ($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Categories;
use App\Carts;
use App\Products;



$_category = new Categories();
$categories = $_category->index();
session_start();

$_cart= new Carts;
$carts = $_cart->index();
$grandTotal = 0;
foreach($carts as $cart)
{
    $grandTotal = $grandTotal + $cart['total_price'];
}

?>
<header>
      <div class="top-header">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <p> Welcome To MY-PHONE</p>
            </div>
            <div class="col-sm-6 offset-sm-3">
              <ul class="nav">
               
                <li class="nav-item">
                <?php if (!isset($_SESSION['is_authenticated'])) {
                    ?>
                  <a class="nav-link" href="login.php">
                    
                    <i class="fa-solid fa-lock"></i>
                    Login
                  </a>

                  <li class="nav-item">
                  <a class="nav-link" href="signup.php">
                    <i class="fa-solid fa-pen"></i>
                    Register
                  </a>
                </li>

                  <?php } else { ?>
                    <li class="nav-item">
                  <a class="nav-link" href="orderlist.php">
                    <i class="fa-solid fa-user"></i>
                    My Order
                  </a>
                </li>


                    <a class="nav-link" href="logout.php">
                    
                    <i class="fa-solid fa-lock"></i>
                    Logout
                  </a>

                </li>

               

                <li class="nav-item">
                                <a class="nav-link">
                                    Logged By: <?php if(isset($_SESSION['username'])){echo $_SESSION['username']; }?>
                                </a>
                            </li>

                <?php } ?>

                
              </ul>
            </div>
          </div>
    
        </div>
      </div>
      
      <?php
      include_once("notice.php");
      ?>
    
      <div class="middle-part">
        <div class="container">
          <div class="row">
            <div class="col-sm-2">
              <div class="logo">
                <a class="navbar-brand" href="index.php">
                  <img src="img/logo1.png" alt="Logo Icon" class="img-fluid"style="width: 3.25rem; height: 3.25rem;">
                </a>
              </div>
            </div>
            <div class="col-sm-8 offset-sm-2">
              <ul class="nav ms-5">
                <li class="nav-item">
                  <a class="nav-link about-us" href="about.php"> About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link about-us" href="index.php">Home</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link about-us" href="../../../404.php">Blog</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link about-us me-4" href="product.php">Shop</a>
                </li>

                <li class="nav-item">
                            <a class="nav-link" href="#">
                                <div class="input-group mb-3">
                                    <form action="product_search.php" method="post">
                                        <input type="text" name="keywords" class="form-control" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="basic-addon">
                                        <!-- <button type="submit"><span class="input-group-text" id="basic-addon">
                                            
                                        </span></button> -->
                                    </form>
                                </div>

                            </a>
                        </li>


                <li class="nav-item">
                  <a class="nav-link" href="shopping_cart.php">
                    <button type="button" class="btn btn-danger">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span class="price">Cart / <span class="price_code">&#2547;</span><?php echo $grandTotal?></span>
                    </button>
                  </a>
                </li>
    
              </ul>
            </div>
          </div>
    
        </div>
    
      </div>
    
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <?php 
                    foreach ($categories as $category): ?>
                        <li class="nav-item">
                        <a class="nav-link" href="product.php?category_id=<?= $category['id'] ?>"><?= $category['name']?></a>
                        </li>
                  <?php  endforeach
                    
                    ?>
              <li class="nav-item">
                <a class="nav-link" href="product.php">Shop</a>
              </li>
    
            </ul>
          </div>
        </div>
      </nav>
    
    </header>