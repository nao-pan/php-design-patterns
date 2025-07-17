<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\abstract_factory\CSVDaoFactory;
use App\abstract_factory\MockFactory;
use App\abstract_factory\MySqlDaoFactory;

if (isset($_POST['factory'])) {
  $factory = $_POST['factory'];

  switch ($factory) {
    case 1:
      $factory = new CSVDaoFactory();
      break;
    case 2:
      $factory = new MockFactory();
      break;
    case 3:
      $factory = new MySqlDaoFactory();
      break;
    default:
      throw new RuntimeException('invalid factory');
  }

  $item_id = 1;
  $item_dao = $factory->createItemDao();
  $item = $item_dao->findById($item_id);
  echo 'ID=' . $item_id . 'の商品は「' . $item->getName() . '」です<br>';

  $order_id = 3;
  $order_dao = $factory->createOrderDao();
  $order = $order_dao->findById($order_id);
  echo 'ID=' . $order_id . 'の注文情報は次の通りです。';
  echo '<ul>';
  foreach ($order->getItems() as $item) {
    echo '<li>' . $item['object']->getName();
  }
  echo '</ul>';
}
?>
<hr>
<form action="" method="post">
  <div>
    DaoFactoryの種類：
    <input type="radio" name="factory" value="1">DbFactory
    <input type="radio" name="factory" value="2">MockFactory
    <input type="radio" name="factory" value="3">MySqlFactory
  </div>
  <div>
    <input type="submit">
  </div>
</form>