<?php

interface GlobalProduct
{
  public function save($sku, $name, $type, $price, $measurement);
  public function show($sku);
  public function checkInput($inputs);
}
