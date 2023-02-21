<?php

if (isset($_POST['save'])) {
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['productType'];
  $size = $_POST['size'];
  $height = $_POST['height'];
  $width = $_POST['width'];
  $length = $_POST['length'];
  $weight = $_POST['weight'];




  include "../classes/dbh.php";
  include "../classes/product.php";
  include "../classes/productController.php";






  $product = new ProductController($sku, $name, $price, $type);
  if (!empty($size)) {
    $product->setNum($size);
  }
  if (!empty($height) && !empty($width) && !empty($length)) {
    $dimension = $height . 'x' . $width . 'x' . $length;
    $product->setNum($dimension);
  }
  if (!empty($weight)) {
    $product->setNum($weight);
  }
  $product->addProduct();
  
  // $product->addProduct();
  header("location: ../index.php?error-none");
}

if (isset($_POST['cancel'])) {
  header("location: ../index.php");
}
