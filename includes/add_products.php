<?php

if (isset($_POST['save'])) {

  // assign inputs to variables

  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['productType'];
  $size = $_POST['size'];
  $height = $_POST['height'];
  $width = $_POST['width'];
  $length = $_POST['length'];
  $weight = $_POST['weight'];



  // include the required classes

  include "../classes/dbh.php";
  include "../classes/product.php";
  include "../classes/productController.php";

  // define a variable to handle error message

  $error_message = false;


  // make instance of class and passing the input values

  $product = new ProductController;
  $product->setSKU($sku);
  $product->setName($name);
  $product->setPrice($price);
  $product->setType($type);
  $product->setSize($size);
  $product->setHeight($height);
  $product->setWidth($width);
  $product->setLength($length);
  $product->setWeight($weight);

  // call the function to check if there is an empty inputs

  if ($product->emptyInput()) {
    echo "<div class='alert alert-danger alert-dismissible fade show col-md-4 text-center mx-auto my-4' role='alert'>" .
      "<div>" . $product->emptyInput() . "</div>" .
      "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
      "</div>";
    $error_message = true;
  }
  // call the function to check if the sku exist in database

  else if ($product->skuCheck()) {
    echo "<div class='alert alert-danger alert-dismissible fade show col-md-4 text-center mx-auto my-4' role='alert'>" .
      "<div>" . $product->skuCheck() . "</div>" .
      "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>" .
      "</div>";
    $error_message = true;
  } else {
    $error_message = false;
    // if there is no error message cll the insert function to store data in database
    $product->addProduct();
    // header("location: ../index.php");
  }
}

?>
<script>
  var errorMessage = "<?php echo $error_message; ?>";
  if (errorMessage == false) {
    location.assign("http://localhost/scandiwebTask/index.php");
  }
</script>