
 <?php 
 include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php"); 
 ?>
 <div class="container-fluid">
  <div class="row">
    <nav class="navbar navbar-expand-md navbar-light bg-secondary">
      <div class="container-fluid">
        <a class="navbar-brand justify content-center" href="#">MY-PHONE</a>
      </div>
    </nav>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <span class="nav-link">
              <i class="fas fa-user"></i> Welcome <?php if(isset($_SESSION['username'])){echo $_SESSION['username']; }?>
            </span>
          </li>
           
          <li class="nav-item">
            <a class="nav-link" href="<?=$webroot?>admin/banners/index.php">
              <i class="fas fa-flag"></i> Banner
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$webroot?>admin/products/index.php">
              <i class="fas fa-box-open"></i> Products
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?=$webroot?>admin/categories/index.php">
            <i class="fa-solid fa-list"></i>Categories
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?=$webroot?>admin/orders/index.php">
              <i class="fas fa-shopping-cart"></i> Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$webroot?>admin/users/index.php">
              <i class="fas fa-users"></i> Users
            </a>
          </li>
          <li class="nav-item">
        <a class="nav-link" href="<?=$webroot?>admin/contaact/index.php">
          <i class="fas fa-envelope"></i> Messages
        </a>
      </li>
      <li class="nav-item">
            <a class="nav-link active" href="<?=$webroot?>admin/report.php">
            <i class="fa-solid fa-book"></i> report
            </a>
          </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$webroot?>admin/element/logout.php">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
        </ul>
      </div>
    </nav>

    </div>
</div>
</div>
