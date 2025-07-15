<?php
require_once 'Employees.class.php';

class Employees implements IteratorAggregate
{
  private $employees;
  public function __construct()
  {
    $this->employees = new ArrayObject();
  }

  public function add(Employee $employee)
  {
    $this->employees[] = $employee;
  }
  public function getIterator(): Traversable
  {
    return $this->employees->getIterator();
  }
}
