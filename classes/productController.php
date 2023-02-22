<?php


class ProductController extends Product
{
  private $sku;
  private $name;
  private $price;
  private $type;
  private $measurement;

  public function __construct($sku, $name, $price, $type)
  {
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->type = $type;
  }
  public function setMeasurement($measurement)
  {
    $this->measurement = $measurement;
  }

  public function addProduct()
  {
    if ($this->emptyInput() == false) {
      header("location: ../create_product.php?error=emptyInput");
      exit();
    }
    if ($this->skuCheck() == false) {
      header("location: ../create_product.php?error=skuTaken");
      exit();
    }
    $this->insert(new $this->type, $this->sku, $this->name, $this->type, $this->price, $this->measurement);
  }
  private function emptyInput()
  {
    $result = null;

    if (empty($this->sku) || empty($this->name) || empty($this->price) || empty($this->type) || empty($this->measurement)) {
      $result = false;
    } else {
      $result = true;
    }

    return $result;
  }

  private function skuCheck()
  {
    $result = null;

    if (!$this->checkProductSku($this->sku)) {
      $result = false;
    } else {
      $result = true;
    }

    return $result;
  }
}

// echo (new ProductController)->show(new Book);
