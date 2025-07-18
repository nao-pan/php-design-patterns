<?php
require_once 'OrderItem.class.php';

/**
 * 商品情報を管理するシングルトンDAOクラス
 * 
 * 学習用クラスのため
 * 本来ビジネスロジックはDAOではなくservice層に持たせる
 * ここでは簡略化するためsetAsideメソッドを含めている
 */
class ItemDao
{
  private static $instance;
  private $items;
  private function __construct()
  {
    $fp = fopen('item_data.txt', 'r');

    /**
     * ヘッダ行を抜く
     */
    $dummy = fgets($fp, 4096);

    $this->items = array();
    while($buffer = fgets($fp,4096)) {
      $item_id = trim(substr($buffer,0,10));
      $item_name = trim(substr($buffer,10,20));
      $item_price = trim(substr($buffer, 30));

      $item = new Item($item_id, $item_name, $item_price);
      $this->items[$item->getId()]= $item;
    }

    fclose($fp);
  }

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new ItemDao;
    }
    return self::$instance;
  }

  public function findById($item_id)
  {
    if(array_key_exists($item_id, $this->items)){
      return $this->items[$item_id];
    }else{
      return null;
    }
  }

  public function setAside(OrderItem $order_item)
  {
    echo $order_item->getItem()->getName(). 'の在庫引き当てを行いました。<br>';
  }

  public final function __clone()
  {
    throw new RuntimeException('Clone is not allowed against ' . get_class($this));
  }
}