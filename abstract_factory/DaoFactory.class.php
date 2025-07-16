<?php
namespace App\abstract_factory;
interface DaoFactory{
  public function createItemDao();
  public function createOrderDao();
}