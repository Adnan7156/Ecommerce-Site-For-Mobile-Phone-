 <!-- Navigation -->
 <?php 
 include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php"); 
 ?>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <span class="nav-link">
              <i class="fas fa-user"></i> Welcome
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="fas fa-home"></i> Dashboard
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-shopping-cart"></i> MY-Orders
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

