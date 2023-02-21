<?php


class ProductController extends Product
{
  private $sku;
  private $name;
  private $price;
  private $type;
  private $num;

  public function __construct($sku, $name, $price, $type)
  {
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->type = $type;
  }
  public function setNum($num)
  {
    $this->num = $num;
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
    $this->setProduct($this->sku, $this->name, $this->type, $this->price);
    $this->insert(new $this->type, $this->sku, $this->num);
  }
  private function emptyInput()
  {
    $result;

    if (empty($this->sku) || empty($this->name) || empty($this->price) || empty($this->type)) {
      $result = false;
    } else {
      $result = true;
    }

    return $result;
  }

  private function skuCheck()
  {
    $result;

    if (!$this->checkProductSku($this->sku)) {
      $result = false;
    } else {
      $result = true;
    }

    return $result;
  }
}

// echo (new ProductController)->show(new Book);
