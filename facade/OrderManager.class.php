<?php
require_once 'Order.class.php';
require_once 'ItemDao.class.php';
require_once 'OrderDao.class.php';

/**
 * Facadeクラスとして注文処理全体を担当する
 * 
 * 本来はここにユースケース全体の流れ」や「トランザクション制御」などを集約する
 * 今回は学習のためロジックは極力DAOに委譲している構成になっている
 */
class OrderManager
{
  public static function order(Order $order) {
    $item_dao = ItemDao::getInstance();
    foreach($order->getItems() as $order_item){
      $item_dao->setAside($order_item);
    }

    OrderDao::createOrder($order);
  }
}