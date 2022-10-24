<?php
class Menu {
  private $name;
  private $price;
  private $desk;
  private $image;
  private $orderCount = 0;
  
  public function __construct($name, $price, $desk, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->desk = $desk;
    $this->image = $image;
  }
  
  public function hello() {
    echo 'Saya adalah '.$this->name;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getImage() {
    return $this->image;
  }
  public function getDesk() {
    return $this->desk;
  }
  
  public function getOrderCount() {
    return $this->orderCount;
  }
  
  public function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }
  
  public function getTaxIncludedPrice() {
    return round($this->price * 1.0725, 2);
  }
  
  public function getTotalPrice() {
    return $this->getTaxIncludedPrice() * $this->orderCount;
  }
  
}
?>