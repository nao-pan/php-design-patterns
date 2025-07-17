<?php

namespace App\abstract_factory;

class CSVDaoFactory implements DaoFactory
{
  public function createItemDao()
  {
    return new CSVItemDao();
  }

  public function createOrderDao()
  {
    return new CSVOrderDao($this->createItemDao());
  }
}
