<?php

class Dvd extends Dbh implements GlobalProduct
{
  // function to store dvd  product into database
  public function save($sku, $name, $type, $price, $measurement)
  {
    $stmt = "INSERT INTO product (sku,name,type,price,size) VALUES ('$sku','$name','$type',$price,$measurement);";
    mysqli_query($this->connect(), $stmt);
    $stmt = null;
  }
  // function to show dvd  product from database
  public function show($sku)
  {
    $sql = "SELECT size FROM product WHERE sku = '$sku';";
    $result = mysqli_query($this->connect(), $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

        return 'Size : ' . $row['size'] . 'MB';
      }
    }
  }
  // function to check if size has value
  public function checkInput($inputs)
  {
    if ($inputs['size'] >= 1) {
      $size = $inputs['size'];
      return $size;
    }
  }
}
