<?php

if (isset($_POST['mass_delete'])) {
  $products_id = $_POST['delete_check'];
  $extract_id = implode(',', $products_id);
  // echo $extract_id;

  include "../classes/dbh.php";
  include "../classes/product.php";
  include "../classes/productController.php";

  $product = new Product;
  $product->deleteProducts($extract_id);
  header("location: ../index.php");
}
if (isset($_POST['add'])) {
  header("location: ../create_product.php");
}
