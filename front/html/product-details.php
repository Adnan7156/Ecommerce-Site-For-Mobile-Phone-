<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");


use App\Banners;

$_banner=new Banners();
$banner= $_banner->show();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <script src="css/js/vendor/modernizr.js"></script>
    <script src="css/js/vendor/jquery.js"></script>
  <!-- xzoom plugin here -->
  <script type="text/javascript" src="css/dist/xzoom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/dist/xzoom.css" media="all" /> 
  <!-- hammer plugin -->
  <script type="text/javascript" src="css/hammer.js/1.0.5/jquery.hammer.min.js"></script>        
  </head>
    <link rel="stylesheet" href="css/style.css">

  

</head>

<body>
  
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
                  <a class="nav-link" href="#">
                    <i class="fa-solid fa-user"></i>
                    My Account
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa-solid fa-circle-info"></i>
                    Track Order
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="checkout.html">
                    <i class="fa-solid fa-circle-check"></i>
                    Checkout
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa-solid fa-heart"></i>
                    Wishlist
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.html">
                    <i class="fa-solid fa-lock"></i>
                    Login
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="signup.html">
                    <i class="fa-solid fa-pen"></i>
                    Register
                  </a>
                </li>
              </ul>
            </div>
          </div>
    
        </div>
      </div>
    
      <div class="middle-part">
        <div class="container">
          <div class="row">
            <div class="col-sm-2">
              <div class="logo">
                <a class="navbar-brand" href="#">
                  <img src="img/logo1.png" alt="Logo Icon" class="img-fluid"style="width: 3.25rem; height: 3.25rem;">
                </a>
              </div>
            </div>
            <div class="col-sm-8 offset-sm-2">
              <ul class="nav ms-5">
                <li class="nav-item">
                  <a class="nav-link about-us" href="about.html"> About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link about-us" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link about-us" href="#">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link about-us me-4" href="#">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="basic-addon">
                      <span class="input-group-text" id="basic-addon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                      </span>
                    </div>
    
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <button type="button" class="btn btn-danger">
                      <i class="fa-solid fa-cart-shopping"></i>
                      <span class="price">Cart / <span class="price_code">&#2547;</span>0.00</span>
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
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.html">Feture Phone</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product-2.html">Smart-Phone</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Shop</a>
              </li>
    
            </ul>
          </div>
        </div>
      </nav>
    
    </header>
   <!-- breadcrumb -->
   <div class="product-breadcrumb mt-4">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
        </ol>
      </nav>
    </div>
  </div>
  

  <section class="product-details mt-5">
    <div class="container">
      <div class="row">
        
<div class="col-sm-5">
  <div class="xzoom-container">
    <img class="xzoom2" src="img/gallery/preview/01_b_car.jpg" xoriginal="img/gallery/original/01_b_car.jpg" />
      <div class="xzoom-thumbs">
        <a href="img/gallery/original/01_b_car.jpg"><img class="xzoom-gallery2" width="80" src="img/gallery/thumbs/01_b_car.jpg"  xpreview="images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>
        <a href="img/gallery/original/02_o_car.jpg"><img class="xzoom-gallery2" width="80" src="img/gallery/preview/02_o_car.jpg" title="The description goes here"></a>
        <a href="img/gallery/original/03_r_car.jpg"><img class="xzoom-gallery2" width="80" src="img/gallery/preview/03_r_car.jpg" title="The description goes here"></a>
        <a href="img/gallery/original/04_g_car.jpg"><img class="xzoom-gallery2" width="80" src="img/gallery/preview/04_g_car.jpg" title="The description goes here"></a>
      </div>
  </div> 

</div>


<div class="col-sm-7">
  <div class="product-name">
    <h1 class=" product_title entry-title text-uppercase">Product title</h1>
  </div>
  <div>
    <p class="price"> $111 </p>

  </div>

  <div class="short-description">
    <h2 class="text-uppercase"> quick review:</h2>
    <p>Unlimited repairs for Drops, Spills, and Mechanical Breakdown
    Theft and Loss Coverage
    Same Day Replacement and Set Up
    Samsung Care+ expert 24/7 via phone or online for device setup, and connecting with other devices.</p>
  </div>

   <div class="add-cart mt-3">
    <button type="button" class="btn btn-danger">
    <i class="fa-solid fa-cart-shopping"></i>
    <span class="price">Add Cart</span>
  </button>

  </div>

</div>

      </div>


    </div>

  </section>
          
         
    
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="footer-col">
            <h6>About Shop</h6>
            <ul>
              <li><a href="about.html">About Us</a></li>
              <li><a href="#">Terms & Condition</a></li>
              <li><a href="privacypolicy.html">Privacy Policy</a></li>
              <li><a href="#">Refund & Returns</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="footer-col">
            <h6>Get help</h6>
            <ul>
              <li><a href="FAQ.html">FAQ</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="payment-method.html">Payment</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="footer-col contact-us">
            <h6>Contact Us</h6>
            <button onclick="location.href='contact-us.html';">Contact Us</button>
            <p class="address">Uttara secctor-4,road-4 Dhata-1230</p>
          </div>
        </div>
      </div>
    </div>

  </footer>
  

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="css/js/foundation.min.js"></script>
    <script src="css/js/setup.js"></script>

    
</body>

</html>