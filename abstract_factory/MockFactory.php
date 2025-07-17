<?php

namespace App\abstract_factory;

class MockFactory implements DaoFactory
{
    public function createItemDao()
    {
        return new MockItemDao();
    }
    public function createOrderDao()
    {
        return new MockOrderDao();
    }
}
