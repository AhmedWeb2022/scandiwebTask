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
  <link rel="stylesheet" href="css/style.css">
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
            <button class="btn btn-primary mx-2 my-2  add" type="submit" name="add"> ADD </button>
            <button class="btn btn-danger mx-2 my-2 text-uppercase" type="submit" name="mass_delete">MASS DELETE</button>
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
          $sql = "SELECT * FROM product;";
          $connect = new Dbh;
          $result = mysqli_query($connect->connect(), $sql);
          $resultCheck = mysqli_num_rows($result);
          // print_r($resultCheck);
          if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="card " style="width: 16rem; margin-top:10px;">' .
                '<div class="text-end">' .
                '<input type="checkbox" style="cursor:pointer" class="delete-checkbox" name="delete_check[]" value="' . $row['product_id'] . '" id="check">' . '</div>' .
                '<div class="card-body row justify-content-center  align-items-center">' .
                '<p class="text-center">' . $row['sku'] . '</p>' .
                '<p class="text-center">' . $row['name'] . '</p>' .
                '<p class="text-center">' . $row['price'] . ' $' . '</p>' .
                '<p class="text-center">' . $product->show(new $row['type'], $row['sku']) . '</p>' .
                '</div>' .
                '</div>';
            }
          }
          ?>
          <!-- <div class="card" style="width: 18rem;">
          <img src="image/environment.jpg" class="card-img-top d-block w-100" alt="...">
          <input type="checkbox" name="check" id="check">
          <div class="card-body">
            <h5 class="card-title">Name</h5>
            <span>size|weight|dimensions</span>
            <span>price</span>
            <span>SKU</span>
          </div>
        </div> -->
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
  <script src="js/main.js"></script>
</body>

</html>