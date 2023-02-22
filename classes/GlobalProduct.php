<?php

interface GlobalProduct
{
  public function save($sku, $name, $type, $price, $measurement);
  public function checkType($sku);
}
class Dvd extends Dbh implements GlobalProduct
{

  public function save($sku, $name, $type, $price, $measurement)
  {
    $stmt = "INSERT INTO product (sku,name,type,price,size) VALUES ('$sku','$name','$type',$price,$measurement);";
    mysqli_query($this->connect(), $stmt);
    $stmt = null;
  }
  public function checkType($sku)
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
}
class Book  extends Dbh implements GlobalProduct
{
  public function save($sku, $name, $type, $price, $measurement)
  {
    $stmt = "INSERT INTO product (sku,name,type,price,weight) VALUES ('$sku','$name','$type',$price,$measurement);";
    mysqli_query($this->connect(), $stmt);
    $stmt = null;
  }
  public function checkType($sku)
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
}

class Furniture  extends Dbh implements GlobalProduct
{
  public function save($sku, $name, $type, $price, $measurement)
  {
    $stmt = "INSERT INTO product (sku,name,type,price,dimensions) VALUES ('$sku','$name','$type',$price,$measurement);";
    mysqli_query($this->connect(), $stmt);
    $stmt = null;
  }
  public function checkType($sku)
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
}
