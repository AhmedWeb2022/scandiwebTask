<?php

if (isset($_POST['mass_delete']) && !empty($_POST['delete_check'])) {
  $products_id = $_POST['delete_check'];
  $extract_id = implode(',', $products_id);

  include "../classes/dbh.php";
  include "../classes/product.php";
  include "../classes/productController.php";

  $product = new Product;
  $product->deleteProducts($extract_id);
  header("location: ../index.php");
} else {
  header("location: ../index.php");
}
if (isset($_POST['ADD'])) {
  header("location: ../create_product.php");
}
