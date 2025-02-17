<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Creat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
 <section>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-9 ">

            <h1 class="text-center mb-5">Add New</h1>
            <form method="post" action="store.php"enctype="multipart/form-data">

            <div class="mb-3 row">
         <label for="inputID" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input
                type="hidden"
                class="form-control" 
                name="id"
                value=""
                id="inputID" >
            </div>
             </div>
             

             <div class="mb-3 row form-check">

                        <div class="col-sm-6">
                            <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="is_active"
                                    value="1"
                                    id="inputIsActive">
                        </div>
                        <label for="inputIsActive" class="col-sm-6 form-check-label">Is Active</label>
                    </div>
             
             
             <div class="mb-3 row">
         <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="title"
                value=" "
                id="inputTitle"
               >
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputLink" class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="link"
                value=" "
                id="inputlink"
               >
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputPromotional_message" class="col-sm-2 col-form-label">Promotional_message</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="promotional_message"
                value=" "
                id="inputPromotional_message"
               >
            </div>
             </div>
             
             <div class="mb-3 row">
         <label for="inputHtml_banner" class="col-sm-2 col-form-label">HTML_Banner</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control" 
                name="html_banner"
                value=" "
                id="inputHtml_banner"
               >
            </div>
             </div>

             <div class="mb-3 row">
         <label for="inputPicture" class="col-sm-2 col-form-label">Picture</label>
            <div class="col-sm-10">
              <input
                type="file"
                class="form-control" 
                name="picture"
                value=" "
                id="inputPicture"
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