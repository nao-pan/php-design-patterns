<?php
namespace App\abstract_factory;

class MySqlDaoFactory implements DaoFactory {
    public function createItemDao(): ItemDao {
        return new MySqlItemDao(DbConnection::getConnection());
    }

    public function createOrderDao(): OrderDao {
        return new MySqlOrderDao($this->createItemDao(), DbConnection::getConnection());
    }
}