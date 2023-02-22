<?php
include 'GlobalProduct.php';
include 'Dvd.php';
include 'Book.php';
include 'Furniture.php';
class Product extends  Dbh
{

  // function to delete the data from database
  public function deleteProducts($extract_id)
  {
    $stmt = "DELETE FROM product WHERE product_id IN($extract_id);";
    $dbResult = mysqli_query($this->connect(), $stmt);
    if ($dbResult) {
      header("location: ../index.php");
    }
  }
  // function to display the data from database
  public function showProduct()
  {
    $sql = "SELECT * FROM product;";
    $result = mysqli_query($this->connect(), $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card " style="width: 16rem; margin-top:10px;">' .
          '<div class="text-end">' .
          '<input type="checkbox" style="cursor:pointer" class="delete-checkbox" name="delete_check[]" value="' . $row['product_id'] . '" id="check">' . '</div>' .
          '<div class="card-body row justify-content-center  align-items-center">' .
          '<p class="text-center">' . $row['sku'] . '</p>' .
          '<p class="text-center">' . $row['name'] . '</p>' .
          '<p class="text-center">' . $row['price'] . ' $' . '</p>' .
          '<p class="text-center">' . $this->show(new $row['type'], $row['sku']) . '</p>' .
          '</div>' .
          '</div>';
      }
    }
  }
  // function to check if the sku exist in database
  protected function checkProductSku($sku)
  {
    $stmt = "SELECT * FROM product WHERE sku = '$sku';";
    $dbResult = mysqli_query($this->connect(), $stmt);
    $resultCheck = mysqli_num_rows($dbResult);
    $result = null;
    if ($resultCheck > 0) {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }
  // function to check which type of product that will be store

  public function insert(GlobalProduct $product, $sku, $name, $type, $price, $measurement)
  {
    $type = $product->save($sku, $name, $type, $price, $measurement);
    return $type;
  }
  // function to check which type of product that will be display
  public function show(GlobalProduct $product, $sku)
  {
    $type = $product->show($sku);
    return $type;
  }
  // function to check which type of product has  data 
  public function checkSelectOptions(GlobalProduct $product, $inputs)
  {
    $input = $product->checkInput($inputs);
    return $input;
  }
}
