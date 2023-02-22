<?php
include_once 'classes/dbh.php';
include_once 'classes/product.php';
include_once 'classes/productController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      padding-top: 50px;
    }
  </style>
  <title>Product List</title>
</head>

<body>

  <form action="includes/delete_product.php" method="post">
    <div class="d-flex justify-content-between mt-4">
      <div class="container">
        <div class="row">
          <div class="title col-md-6">
            <h1>Product List</h1>
          </div>
          <div class="button col-md-6 d-flex justify-content-end">
            <button class="btn btn-danger mx-2 my-2 text-uppercase" type="submit" name="mass_delete">MASS DELETE</button>
            <button class="btn btn-primary mx-2 my-2  add" onclick="location.href='create_product.php'" name="ADD" id="ADD"> ADD </button>
          </div>
          <hr class="border border-2 border-dark">
        </div>
      </div>
    </div>
    <section>
      <div class="container">
        <?php ?>
        <div class="row justify-content-around">
          <?php
          $product = new Product;
          $product->showProduct();
          ?>
        </div>
        <hr class="border border-2 border-dark">
      </div>
    </section>
  </form>
  <footer>
    <div class="container text-center">
      <p>Scandiweb Test assignment</p>
    </div>
  </footer>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>