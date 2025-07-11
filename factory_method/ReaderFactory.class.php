<?php
require_once 'Reader.class.php';
require_once 'CSVFileReader.class.php';
require_once 'XMLFileReader.class.php';

/**
 * Readerクラスのインスタンス生成を行うクラスです
 */
class ReaderFactory
{
  /**
   * Readerクラスのインスタンスを生成します
   */
  public function create($filename)
  {
    $reader = $this->createReader($filename);
    return $reader;
  }

  /**
   * Readerクラスのサブクラスを条件判定し、生成します
   */
  private function createReader($filename)
  {
    $poscsv = stripos($filename, 'csv');
    $posxml = stripos($filename, '.xml');

    if ($poscsv !== false) {
      return new CSVFileReader($filename);
    } elseif ($posxml !== false) {
      return new XMLFileReader($filename);
    } else {
      die('This filename is not supported : ' . $filename);
    }
  }
}
