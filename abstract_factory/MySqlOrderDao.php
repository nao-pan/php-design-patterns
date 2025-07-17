<?php

namespace App\abstract_factory;

use PDO;

class MySqlOrderDao implements OrderDao
{
    private PDO $pdo;
    private ItemDao $item_dao;
    public function __construct(ItemDao $item_dao, PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->item_dao = $item_dao;
    }

    public function findById($order_id)
    {
        $stmt = $this->pdo->prepare("select * from customer_order where order_id = :order_id");
        $stmt->execute(['order_id' => $order_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== false) {
            $order = new Order($order_id);
            foreach ($result as $orderItem) {
                $item = $this->item_dao->findById($orderItem['item_id']);
                if ($item !== null) {
                    $order->addItem($item);
                }
            }
            return $order;
        }
        return null;
    }
}
