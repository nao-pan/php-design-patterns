<?php
namespace App\abstract_factory;

interface OrderDao {
  public function findById($order_id);
}