<?php
class Item
{
  private int $id;
  private string $name;
  private int $price;

  public function __construct($id, $name, $price)
  {
    $this->id = (int)$id;
    $this->name = (string)$name;
    $this->price = (int)mb_convert_kana(trim($price), 'n');
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }
}
