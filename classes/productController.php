<?php


class ProductController extends Product
{
  // set properties

  private $sku;
  private $name;
  private $price;
  private $type;
  private $size;
  private $height;
  private $width;
  private $length;
  private $weight;

  // make setter methods to the properties

  public function setSKU($sku)
  {
    $this->sku = $sku;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function setPrice($price)
  {
    $this->price = $price;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function setHeight($height)
  {
    $this->height = $height;
  }
  public function setWidth($width)
  {
    $this->width = $width;
  }
  public function setLength($length)
  {
    $this->length = $length;
  }
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }

  // function to add the product data into database
  public function addProduct()
  {
    // check if the values pf the options are exists or not (size,weight,length,width,height)
    $measurement = $this->checkSelectOptions(new $this->type, array('size' => $this->size, 'height' => $this->height, 'width' => $this->width, 'length' => $this->length, 'weight' => $this->weight));
    // insert the selected product type data into database
    $this->insert(new $this->type, $this->sku, $this->name, $this->type, $this->price, $measurement);
  }
  // function to check if there are empty inputs
  public function emptyInput()
  {
    $result = null;

    if (empty($this->sku) || empty($this->name) || empty($this->price) || empty($this->type)) {
      $result = 'Please fill up the empty fields';
    } else if ($this->type === 'Dvd' && empty($this->size)) {
      $result = 'Please provide the size of the DVD';
    } else if ($this->type === 'Book' && empty($this->weight)) {
      $result = 'Please provide the weight of the Book';
    } else if ($this->type === 'Furniture' && (empty($this->height) || empty($this->width) || empty($this->length))) {
      $result = 'Please provide the dimensions of the Furniture';
    }

    return $result;
  }
// function to check if the sku exist in database
  public function skuCheck()
  {
    $result = null;

    if (!$this->checkProductSku($this->sku)) {
      $result = 'The SKU already exists';
    }

    return $result;
  }
}
