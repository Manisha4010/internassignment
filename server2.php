<?php    
 $name_error = '';  
 $email_error = ''; 
 $website_error= '';
 $categories_error= '';
 $Categories='';
 $Price='';
 $isbn_error= '';


 $date_error = "";



 if(isset($_POST["submit"]))  
 {  
  
     
      if(empty($_POST["name"]))  
      {  
           $name_error = "<p>Please Enter Name</p>";  
      }  
      else  
      {  
           if(!preg_match("/^[a-zA-Z ]*$/", $_POST["name"]))  
           {  
                $name_error = "<p>Only Letters and whitespace allowed</p>";  
           }  
      }  
      if(empty($_POST["email"]))  
      {  
        $email_error = "<p>Please Enter Email</p>";  
      }  
      else  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                $email_error = "<p>Invalid Email format</p>";  
           } 
        
      }  
      if(empty($_POST["website"])){
        $website_error="website is required";

      }else if(!filter_var($_POST["website"], FILTER_VALIDATE_URL)){
        $website_error="URL format is valid";
      }else{
        $website= validData($_POST["website"]);
      }
     // if(empty($_POST["date"]))  
     // {  
          // $date_error = "<p>Please Enter date</p>";  
     // }  
     // else  
      //{  
      //if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
    //{
     // $date_error="date is invalid";
    //}
  
if(empty($_POST['ISBN']))
{
  $isbn_error="isbn is empty";
}
else if(strlen($_POST['ISBN'])<13)
  {
    $isbn_error="isbn number should consist of 13 digits";

  }else if(!preg_match("/^[6,9]\d{9}$/", $_POST['ISBN']))
  {
    $isbn_error="invalid isbn number";
  }

  //$Price=$_POST['Price'];
  //$pattern = '/^\d+(\.\d{2})?$/';
  //if (preg_match($pattern, $Price) == '0') {
   //$Price= "please enter the Price";
   
//}
  function validatePrice($Price) {
    if (preg_match("/^[0-9]+(\.[0-9]{2})?$/", $Price)) {
        return true;  
    }else
    echo "price is empty" ;
}
}

 
//if(empty($_POST["Price"]))
//{
  //$price_error="price is empty";
//} 
//else if(!filter_var($_POST["Price"], FILTER_VALIDATE_FLOAT)){
        //$price_error="price is valid";
      //}else{
        //$Price= validData($_POST["Price"]);
      //}





     // if(!empty($_POST["isbn"]))
//{
  // Simple validation check that the length is 13 and that there are only numbers
 // if(strlen($_POST['isbn']) != 13 || !preg_match("/^[0-9]*$/", $_POST['isbn']))
   //echo "ISBN needs to be 13 digits in length";
  //else
    //echo "ISBN is valid";
//}


     

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Add Book</title>
    
  </head>
  <body>
    <div class="container">
        <div class="header">
          <h1>Add Book</h1>
        </div>
        <div class="main">
      <form method="post" action="server2.php"> 
        <div class="form-group">
          <label for="bookName">Book Name<span class="text-danger">*</span></label>   <input type="text" name="name"class="form-control" id="bookName" placeholder="Enter Book Name" />
          <span class="text-danger"><?php echo $name_error; ?></span> 
        </div>
        <div class="form-group">
          <label for="authorEmail"><span class="text-danger">*</span></label>Author Email</label>
          <input type="text" name="email"class="form-control" id="authorEmail" placeholder="Enter Author Email" />
          <span class="text-danger"><?php echo $email_error; ?></span> 
        </div>
        <div class="form-group">
          <label for="website"><span class="text-danger">*</span>Website</label>
          <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">https://www.</span>
          </div>
          <input type="text" name="website"class="form-control" id="website" placeholder=" Enter Website" />
          <span class="text-danger"><?php echo $website_error; ?></span>
        
        </div>
        <div class="form-group">
          <label style="display: block" class="my-1 mr-2" for="inlineFormCustomSelectPref">Cover Picture</label>
          <button type="button" class="btn btn-primary">Upload</button>
        </div>
        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Categories (Multi-select Dropdown)</label>
          <select name="Categories">
          <select class="selectpicker" multiple data-live-search="true">
           <label>Select category<span class="note">*</span>:</label> 
           <option value="1">Romance</option>
             <option value="2">Thriller</option>
             <option value="3">Suspense</option>
         
   </select>
  </div>
        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Date Of Publication</label>
          <input id="datepicker" width="100%" />
          <span class="text-danger"><?php echo $date_error; ?></span>
          

        </div>
        <div class="form-group"></div>
        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="isbn">ISBN Number</label>
              <input type="text" class="form-control" name="isbn" id="isbn"  placeholder="Enter ISBN Number" />
              <span class="text-danger"><?php echo $isbn_error; ?></span> 
                
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="Price"><span class="text-danger">*</span>Price</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">&#8377</span>
                </div>
                <input type="text" class="form-control" id="Price" aria-label="Amount (to the nearest dollar)" />
                <span class="text-danger"><?php echo $Price; ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Type</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            <option selected>Choose...</option>
            <option value="2">Magazine</option>
            <option value="1">Novel</option>
            <option value="3">Textbook</option>
          </select>
        </div>
        <div class="form-group ">
          <label style="display: block" class="my-1 mr-2" for="inlineFormCustomSelectPref">Format</label>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Paperback</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck2">
            <label class="custom-control-label" for="customCheck2">Hardback</label>
          </div>
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck3">
            <label class="custom-control-label" for="customCheck3">ebook</label>
          </div>
        </div>
        <div class="form-group ">
          <label style="display: block" class="my-1 mr-2" for="inlineFormCustomSelectPref">In Stock</label>
          <input type="checkbox" checked data-toggle="toggle" data-on="Available" data-off="Out Of Stock"
            data-onstyle="success" data-offstyle="danger" data-height="30">
        </div>
        <div class="form-group">
          <label style="display: block" class="my-1 mr-2" for="inlineFormCustomSelectPref">Rating</label>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">1</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">2</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline3">3</labl>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline4">4</labl>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline5" name="customRadioInline1" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline5">5</labl>
          </div>
        </div>
        <div class="form-group">
          <label for="comment">Review</label>
          <textarea class="form-control" rows="5" id="comment"></textarea>
        </div>
        <div class="form-group">
        <div class="center-align">
          <input type="submit" name="submit" value="submit" class="btn btn-primary"submit>
          <button type="button" class="btn btn-danger">Cancel</button>
        </div>
      </div>
      </form>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
      $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
  </body>
</html>