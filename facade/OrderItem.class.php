<?php
require_once 'Item.class.php';

class OrderItem
{
  private $item;
  private $amount;
  public function __construct(Item $item, $amount)
  {
    $this->item = $item;
    $this->amount = (int)$amount;
  }

  public function getItem()
  {
    return $this->item;
  }

  public function getAmount()
  {
    return $this->amount;
  }
}