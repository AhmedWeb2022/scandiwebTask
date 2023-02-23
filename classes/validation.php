<?php

class Validation
{
  private $data;
  private $errors = [];

  public function __construct($post_data)
  {
    $this->data = $post_data;
  }
  // the main validation form that called into product controller class
  public function validationForm()
  {
    $this->allInputValidation();
    $this->validateSKU();
    $this->validateName();
    $this->validatePrice();
    $this->validateType();
    $this->validateSize();
    $this->validateHeight();
    $this->validateWidth();
    $this->validateLength();
    $this->validateWeight();
    return $this->errors;
  }
  // function to validate if all inputs is empty
  private function allInputValidation()
  {
    $SKU = trim($this->data['SKU']);
    $name = trim($this->data['name']);
    $price = trim($this->data['price']);
    $type = trim($this->data['type']);
    $size = trim($this->data['size']);
    $height = trim($this->data['height']);
    $width = trim($this->data['width']);
    $length = trim($this->data['length']);
    $weight = trim($this->data['weight']);
    if (empty($SKU) && empty($name) && empty($price) && empty($type) && empty($size) && empty($height) && empty($width) && empty($length) && empty($weight)) {
      $this->addError("all", "Please fill up all fields");
    }
  }
  // function to validate if SKU input is empty

  private function validateSKU()
  {
    $val = trim($this->data['SKU']);
    if (empty($val)) {
      $this->addError("SKU", "SKU field cannot be empty");
    }
  }
  // function to validate if Name input is empty

  private function validateName()
  {
    $val = trim($this->data['name']);
    if (empty($val)) {
      $this->addError("name", "name field cannot be empty");
    }
  }
  // function to validate if Price input is empty

  private function validatePrice()
  {
    $val = trim($this->data['price']);
    if (empty($val)) {
      $this->addError("price", "price field cannot be empty");
    }
  }

  // function to validate if Type input is empty

  private function validateType()
  {
    $val = trim($this->data['type']);
    if (empty($val)) {
      $this->addError("type", "type field  cannot be empty");
    }
  }
  private function validateSize()
  {
    $type = trim($this->data['type']);
    $val = trim($this->data['size']);
    if (empty($val) && $type == "Dvd") {
      $this->addError("size", "size field  cannot be empty");
    }
  }

  // function to validate if height input is empty

  private function validateHeight()
  {
    $type = trim($this->data['type']);
    $val = trim($this->data['height']);
    if (empty($val) && $type == 'Furniture') {
      $this->addError("height", "height field  cannot be empty");
    }
  }

  // function to validate if width input is empty

  private function validateWidth()
  {
    $type = trim($this->data['type']);
    $val = trim($this->data['width']);
    if (empty($val) && $type == 'Furniture') {
      $this->addError("width", "width field  cannot be empty");
    }
  }

  // function to validate if length input is empty

  private function validateLength()
  {
    $type = trim($this->data['type']);
    $val = trim($this->data['length']);
    if (empty($val) && $type == 'Furniture') {
      $this->addError("length", "length field  cannot be empty");
    }
  }

  // function to validate if weight input is empty

  private function validateWeight()
  {
    $type = trim($this->data['type']);
    $val = trim($this->data['weight']);
    if (empty($val) && $type == 'Book') {
      $this->addError("weight", "weight field  cannot be empty");
    }
  }

  // function to generate  the error message

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
