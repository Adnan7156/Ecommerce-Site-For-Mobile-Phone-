<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
 use App\Users;

 $user = new Users();

 $users = $user->edit();






?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="../element/style.css">
  </head>
  <body>
    

<?php 
include_once("../element/body.php");

?>

 <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">Edit</h1>

            <ul class="nav d-flex fs-4 fw-bold mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-success" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                    </li>
                </ul>

            <form method="post" action="update.php" >

            <div class="mb-3 row">
         <label for="inputID" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control" 
                name="id"
                value="<?= $users['id'];?>"
                id="inputID"
               >
            </div>
             </div>

              <div class="form-group">
                <label for="inputFirstName">First-Name</label>
                <input  
                type="text"
                      class="form-control"
                      id="inputFirstName"
                      name="first_name"
                      value="<?= $users['first_name'];?>" 
                      placeholder="First Name" required>

              </div><br>

              <div class="form-group">
                <label for="InputLastName">Last-Name</label>
                <input 
                  type="text"
                 class="form-control"
                  id="InputLastName" 
                  name="last_name"
                  value="<?= $users['last_name'];?>"
                  placeholder="Last Name" required>
              </div><br>

              <div class="form-group">
                <label for="InputUserName">User-Name</label>
                <input 
                  type="text"
                 class="form-control"
                  id="InputUserName" 
                  name="user_name"
                  value="<?= $users['user_name'];?>"
                  placeholder="User Name" required>
              </div><br>
              
              <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input
                type="email"
                class="form-control"
                id="inputEmail"
                name="email"
                value="<?= $users['email'];?>" 
                placeholder="Enter email" required>
              </div><br>

              <div class="form-group">
                <label for="inputPassword">Password</label>
                <input 
                     type="password"
                      class="form-control"
                      id="inputPassword"
                      name="password"
                      value="<?= $users['password'];?>" 
                     placeholder="Password" required>
              </div>

              <div class="form-group">
                <label for="inputNumber">Phone</label>
                <input
                      type="tel"
                      class="form-control"
                      id="inputNumber"
                      name="number"
                      value="<?= $users['number'];?>" 
                      placeholder="phone number" required>
              </div><br>

              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input
                      type="tel"
                      class="form-control"
                      id="inputAddress"
                      name="address"
                      value="<?= $users['address'];?>" 
                      placeholder="Address" required>
              </div>
            <button type="submit" class="btn btn-secondary mt-3">Submit</button>

            </form>


        </div>
    </div>
</div>

 </section>  <br><br><br><br>
 <?php 
include_once("../element/footer.php");

?>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>