<?php

class Book extends Dbh implements GlobalProduct
{
  // function to store book  product into database
  public function save($sku, $name, $type, $price, $measurement)
  {
    $stmt = "INSERT INTO product (sku,name,type,price,weight) VALUES ('$sku','$name','$type',$price,$measurement);";
    mysqli_query($this->connect(), $stmt);
    $stmt = null;
  }
  // function to show book  product from database
  public function show($sku)
  {
    $sql = "SELECT weight FROM product WHERE sku = '$sku';";
    $result = mysqli_query($this->connect(), $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

        return 'Weight : ' . $row['weight'] . ' KG';
      }
    }
  }
  // function to check if weight has value
  public function checkInput($inputs)
  {
    if ($inputs['weight'] >= 1) {
      $weight = $inputs['weight'];
      return $weight;
    }
  }
}
