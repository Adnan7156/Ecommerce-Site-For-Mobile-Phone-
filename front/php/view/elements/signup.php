
<?php
$webroot="http://localhost/ecommerce_project backup/";
?>

<div>&nbsp;</div>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

        
            <form method="post" action="<?=$webroot?>admin/users/sign_up.php">

            <div class="mb-3 row">
         <label for="inputID" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control" 
                name="id"
                value=""
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
                      value="" 
                      placeholder="First Name" required>

              </div><br>

              <div class="form-group">
                <label for="InputLastName">Last-Name</label>
                <input 
                  type="text"
                 class="form-control"
                  id="InputLastName" 
                  name="last_name"
                  value=""
                  placeholder="Last Name" required>
              </div><br>

              <div class="form-group">
                <label for="InputUserName">User-Name</label>
                <input 
                  type="text"
                 class="form-control"
                  id="InputUserName" 
                  name="user_name"
                  value=""
                  placeholder="User Name" required>
              </div><br>
              
              <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input
                type="email"
                class="form-control"
                id="inputEmail"
                name="email"
                value="" 
                placeholder="Enter email" required>
              </div><br>

              <div class="form-group">
                <label for="inputPassword">Password</label>
                <input 
                     type="password"
                      class="form-control"
                      id="inputPassword"
                      name="password"
                      value="" 
                     placeholder="Password" required>
              </div>

              <div class="form-group">
                <label for="inputNumber">Phone</label>
                <input
                      type="tel"
                      class="form-control"
                      id="inputNumber"
                      name="number"
                      value="" 
                      placeholder="phone number" required>
              </div><br>

              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input
                      type="tel"
                      class="form-control"
                      id="inputAddress"
                      name="address"
                      value="" 
                      placeholder="Address" required>
              </div><br>
              <div>&nbsp;</div>

              <button type="submit" class="btn btn-primary btn-block">submit</button> 
         
            </form>

          </div>
        </div>
      </div>
    </div>
    <div>&nbsp;</div>