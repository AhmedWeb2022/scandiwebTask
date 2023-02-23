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
  $errors = $product->emptyInput();
  // call the function to check if the sku exists
  $skuCheck = $product->skuCheck();


  // handel the validation response to send it to create-product form
  $response = array(
    'status' => 0,
    'message' => []
  );
  $check = false;
  if (!empty($errors)) {
    $response['message'] = $errors;
    $response['status'] = 0;
  } else if ($skuCheck) {
    $response['message'] = $skuCheck;
    $response['status'] = 2;
  } else {
    $product->addProduct();
    $response['status'] = 1;
  }



  echo json_encode($response);
}
