<?php

namespace App\abstract_factory;

use PDO;

class MySqlItemDao implements ItemDao
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findById($item_id)
    {
        $stmt = $this->pdo->prepare("select * from item where item_id = :itemid");
        $stmt->execute(['itemid' => $item_id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result !== false) {
            $item = new Item($result['item_id'], $result['item_name']);
            return $item;
        }
        return null;
    }
}
