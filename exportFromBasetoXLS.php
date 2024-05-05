<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
function format ($expre) {
    echo "<pre>";
    print_r($expre);
    echo "</pre>";
  }
function data_connect () {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli =new mysqli('localhost', 'strument_usr', 'Mqky4Crd', 'kramp_full_import_garden');
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
  }
    return $mysqli;
  }
$columns = [];

  $sql = 'SHOW COLUMNS FROM products';
  $mysqli = data_connect();
  $result = $mysqli->query($sql);
  while ($row= $result->fetch_assoc()) {
    $columns[] = $row['Field'];
  }
  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $column = 'A';
  foreach ($columns as $header) {
    $sheet->setCellValue($column.'1', $header);
    $column++;
    echo $column.'<br>';
  }

$row = 2;
$sql_data = 'SELECT * FROM products';
$result_data = $mysqli->query($sql_data);
while ($row_data = $result_data->fetch_assoc())
{
$column = 'A';
foreach ($row_data as $cell_data) {
    $sheet->setCellValue($column.$row, $cell_data);
    $column++;
}
$row++;
}

 
$writer = new Xlsx($spreadsheet);
$writer->save('output.xlsx');
$mysqli->close();