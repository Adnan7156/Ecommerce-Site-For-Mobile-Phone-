<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 ">

            <h1 class="text-center mb-5">Add New</h1>
            <form method="post" action="store.php">

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
             
             <div class="mb-3 row">
         <label for="inputProduct_ID" class="col-sm-2 col-form-label">product_id</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="product_id"
                value=" "
                id="inputProduct_ID"
              readonly >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputUser_ID" class="col-sm-2 col-form-label">	User_id</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="user_id"
                value=" "
                id="inputUser_ID"
               readonly>
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputTotal_price" class="col-sm-2 col-form-label">Total_price</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="total_price"
                value=" "
                id="inputTotal_price"
               readonly>
               
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputQty" class="col-sm-2 col-form-label">QTY</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="qty"
                value=" "
                id="inputQty"
               >
            </div>
             </div>

          

             <div class="mb-3 row">
         <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="address"
                value=" "
                id="inputAddress"
               >
            </div>
             </div>
             
            <button type="submit" class="btn btn-secondary mt-3">Submit</button>




            </form>


        </div>
    </div>
</div>

 </section>  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
  </body>
</html>