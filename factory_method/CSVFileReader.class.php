<?php
require_once 'Reader.class.php';

/**
 * CSVファイルの読み込みを行うクラスです
 */
class CSVFileReader implements Reader
{
  /**
   * 内容を表示するファイル名
   * 
   * @access private
   */
  private $filename;

  /**
   * データを扱うハンドラ名
   * 
   * @access private
   */
  private $handler;

  /**
   * コンストラクタ
   * 
   * @param string ファイル名
   * @throws Exception
   */
  public function __construct($filename)
  {
    if (!is_readable($filename)) {
      throw new Exception('file "' . $filename . '" is not readable !');
    }
    $this->filename = $filename;
  }

  /**
   * 読み込みを行います
   */
  public function read()
  {
    $this->handler = fopen($this->filename, "r");
  }

  /**
   * 表示を行います
   */
  public function display()
  {
    $column = 0;
    $tmp = "";
    while ($data = fgetcsv($this->handler, 1000, ",")) {
      $num = count($data);
      for ($c = 0; $c < $num; $c++) {
        if ($c == 0) {
          if ($column != 0 && $data[$c] != $tmp) {
            echo "</ul>";
          }
          if ($data[$c] != $tmp) {
            echo "<b>" . $data[$c] . "</br>";
            echo "<ul>";
            $tmp = $data[$c];
          }
        } else {
          echo "<li>";
          echo $data[$c];
          echo "</li>";
        }
      }
      $column++;
    }
    echo "</ul>";
    fclose($this->handler);
  }
}
