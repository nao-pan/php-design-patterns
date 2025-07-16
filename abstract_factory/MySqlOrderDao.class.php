<?php
namespace App\abstract_factory;
use PDO;

class MySqlOrderDao implements OrderDao
{
    private $orders;
    public function __construct(ItemDao $item_dao, PDO $pdo)
    {
        
    }

    public function findById($order_id)
    {
        if (array_key_exists($order_id, $this->orders)) {
            return $this->orders[$order_id];
        } else {
            return null;
        }
    }
}