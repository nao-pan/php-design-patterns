<?php
require_once 'Reader.class.php';

/**
 * CSVファイルの読み込みを行うクラスです
 */
class XMLFileReader implements Reader
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
    $this->handler = simplexml_load_file($this->filename, "r");
  }

  /**
   * 文字コードの変換を行います
   */
  private function convert($str)
  {
    return mb_convert_encoding($str, mb_internal_encoding(), "auto");
  }

  /**
   * 表示を行います
   */
  public function display()
  {
    foreach ($this->handler->artist as $artist) {
      echo "<b>" . $this->convert($artist['name']) . "</br>";
      echo "<ul>";
      foreach ($artist->music as $music) {
        echo "<li>";
        echo $this->convert($music['name']);
        echo "</li>";
      }
      echo "</ul>";
    }
  }
}
