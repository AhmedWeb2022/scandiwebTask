<?php

if (isset($_POST['mass_delete']) && !empty($_POST['delete_check'])) {
  $products_id = $_POST['delete_check'];
  $extract_id = implode(',', $products_id);
  // include required classes
  include "../classes/dbh.php";
  include "../classes/product.php";
  include "../classes/productController.php";

  $product = new Product;
  // call delete function to delete product  from database
  $product->deleteProducts($extract_id);
  header("location: ../index.php");
} else {
  header("location: ../index.php");
}
// redirect to create product page
if (isset($_POST['ADD'])) {
  header("location: ../create_product.php");
}
