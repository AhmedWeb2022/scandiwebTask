<?php

class Product extends Dbh
{

  protected function setProduct($sku, $name, $type, $price)
  {
    $stmt = "INSERT INTO product (sku,name,type,price) VALUES ('$sku','$name','$type',$price);";
    // $stmt = $this->connect()->prepare('INSERT INTO product (sku,name,price) VALUES (?,?,?);');
    // if (!$stmt->execute(array($sku, $name, $price))) {
    //   $stmt = null;
    //   header("location: ../index.php?error=stmtFailed");
    //   exit();
    // }
    mysqli_query($this->connect(), $stmt);
    $stmt = null;
  }
  public function deleteProducts($extract_id)
  {
    $stmt = "DELETE FROM product WHERE product_id IN($extract_id);";
    $dbResult = mysqli_query($this->connect(), $stmt);
    if ($dbResult) {
      header("location: ../index.php");
    }
  }

  protected function checkProductSku($sku)
  {
    $stmt = "SELECT * FROM product WHERE sku = '$sku';";
    // $stmt = $this->connect()->prepare('SELECT * FROM product WHERE sku = ?;');
    // if (!$stmt->execute(array($sku))) {
    //   $stmt = null;
    //   header("location: ../index.php?error=stmtFailed");
    //   exit();
    // }
    $dbResult = mysqli_query($this->connect(), $stmt);
    $resultCheck = mysqli_num_rows($dbResult);
    $result;
    if ($resultCheck > 0) {
      $result = false;
    } else {
      $result = true;
    }
    return $result;
  }

  public function insert(GlobalProduct $product, $sku, $num)
  {
    $type = $product->save($sku, $num);
    return $type;
  }
  public function show(GlobalProduct $product, $sku)
  {
    $type = $product->checkType($sku);
    return $type;
  }
}

interface GlobalProduct
{
  public function save($sku, $num);
  public function checkType($sku);
}
class Dvd extends Dbh implements GlobalProduct
{

  public function save($sku, $size)
  {
    $stmt = "UPDATE  product SET size = $size  WHERE sku = '$sku';";
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
  public function save($sku, $weight)
  {
    $stmt = "UPDATE  product SET weight = $weight  WHERE sku = '$sku';";

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
  public function save($sku, $dimensions)
  {
    $stmt = "UPDATE  product SET dimensions = '$dimensions'  WHERE sku = '$sku';";
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
