<?php

class Furniture  extends Dbh implements GlobalProduct
{
  // function to store furniture  product into database
  public function save($sku, $name, $type, $price, $measurement)
  {
    $stmt = "INSERT INTO product (sku,name,type,price,dimensions) VALUES ('$sku','$name','$type',$price,'$measurement');";
    mysqli_query($this->connect(), $stmt);
    $stmt = null;
  }
  // function to show dvd  furniture from database
  public function show($sku)
  {
    $sql = "SELECT dimensions FROM product WHERE sku = '$sku';";
    $result = mysqli_query($this->connect(), $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {

        return 'Dimensions : ' . $row['dimensions'];
      }
    }
  }
  // function to check if (height,width,length) has value
  public function checkInput($inputs)
  {
    if ($inputs['height'] >= 1 && $inputs['width'] >= 1 && $inputs['length'] >= 1) {
      $dimensions = $inputs['height'] . 'x' . $inputs['width'] . 'x' . $inputs['length'];
      return $dimensions;
    }
  }
}
