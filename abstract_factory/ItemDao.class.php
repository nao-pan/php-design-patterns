<?php
namespace App\abstract_factory;

interface ItemDao {
  public function findById($item_id);
}