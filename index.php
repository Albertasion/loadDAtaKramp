<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
function format ($expre) {
    echo "<pre>";
    print_r($expre);
    echo "</pre>";
  }

function connect_db () {
  $servername = "localhost";
$username = "strument_usr"; 
$password = "Mqky4Crd";
$dbname = "kramp_product";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
return $conn;
}


include_once('phpQuery.php');
$product = [];
$key = 0;

$dir_files_pages = 'data\all_products_garden';
$files_in_directory = scandir($dir_files_pages);

// foreach ($files_in_directory as $key=>$files) {
//   if ($files[0]!=='.' && $files[1]!=='.') {
  $doc = file_get_contents($dir_files_pages.'/'.'page_10179.html');


// $doc = file_get_contents($dir_files_pages.'/'.$files);
$document = phpQuery::newDocument($doc);


// полный h1 c названием и артикулом
$h1 = $document->find('h1');

//назва без артикулу
$product_name = pq('$h1 span:eq(1)')->text();
$product[$key]['product_name']= $product_name;
/////////////////////////////////////////////

// внутрішній артикул
$sku = pq('$h1 span:eq(0)')->text();
$product[$key]['sku']= $sku;
////////////////////////////////////////////////////// внутрішній артикул


// посилання на сторінку
$url = $document->find('link[rel="canonical"]');
$url = pq($url);
$url = $url->attr('href');
$product[$key]['url'] = $url;
///////////////////////////////////////////////посилання на сторінку


// бренд
$brand_block = $document->find('a.kh-1aous46');
$brand_block =pq($brand_block);
if ($brand_block->count()>0) {
$brand = $brand_block->find('meta')->attr('content');
$product[$key]['brand']= $brand;
}
else {
  $product[$key]['brand']= "ПУСТО";
}
///////////////////////бренд


$images_block_simple = $document->find('img');






//картинки
$images_block = $document->find('.kh-1vrm80b img');
$images_arr = [];
foreach($images_block as $key=>$value){
  $pq = pq($value);
  $img = $pq->attr('src');
  $img = str_replace('?profile=thumb', '', $img);
  $images_arr[] = $img;
}


//пустышки картинки logo-  





$images_str = implode(';', $images_arr);



$product[$key]['images'] = $images_arr;



// оригінальний артикул
$original_sku = $document->find('#taOriginalNumber_');
$original_sku = $original_sku->find('.kh-pkx4zo');
$original_sku = pq($original_sku);
if ($original_sku->count()>0){
  $original_sku = $original_sku->text();
$original_sku = str_replace(' ', '', $original_sku);
$originals_sku_arr = explode(',', $original_sku);
$originals_sku_arr_str = implode(';', $originals_sku_arr);
$product[$key]['originals_sku_arr'] = $originals_sku_arr;
}
else {
  $originals_sku_arr_str = 'Оригинала нима';
  $product[$key]['originals_sku_arr'] =  'Оригинала нима';
}

$description_row = [];
$description_row_value = [];
//опис 
$descrition= $document->find('.kh-1xzm1su');
$row_name = $descrition->find('.kh-10oizfy');
foreach ($row_name as $key=>$value) {
  $tr = pq($value)->text();
  if ($tr =='EAN') continue;
      echo $tr.'<br>';
      $description_row[$key] = $tr;
}
format($description_row);
// echo $descrition;
$row_value = $descrition->find('.kh-pkx4zo');
foreach ($row_value as $key=>$value) {
  $tr_value = pq($value)->text();
      echo $tr_value.'<br>';
      $description_row_value[$key] = $tr_value;
}
format($description_row_value);


// $combine_description = array_combine($description_row, $description_row_value);
// format($combine_description);

// foreach ($trs as $tr) {
//     // Делайте что-то с каждым найденным <tr>
//     $tr = pq($tr);
//     echo $tr.'<br>';
//     $description_row[] = $tr;
// }
$conn = connect_db();
$sql_show_columns = "SHOW COLUMNS FROM products";
$result = $conn->query($sql_show_columns);
while($row = $result->fetch_assoc()) {
echo $row['Field'].'<br>';
      // $existing_columns[] = $row['Field'];
    }

// if ($result->num_rows > 0) {
//   // Преобразование результатов в массив
//   $existing_columns = array();
//   while($row = $result->fetch_assoc()) {
//     $existing_columns[] = $row['Field'];
//   }

//   // Проверка и добавление новых значений
//   foreach ($combine_description as $column => $value) {
//     if (!in_array($column, $existing_columns)) {
//       // Колонка существует, добавляем значение под ней
//       $sql = "UPDATE products SET $column = '$value'";
//       if ($conn->query($sql) === TRUE) {
//         echo "Value '$value' added under column $column successfully<br>";
//       } else {
//         echo "Error adding value under column $column: " . $conn->error . "<br>";
//       }
//     } else {
//       echo "Column $column does not exist<br>";
//     }
//   }
// } else {
//   echo "No columns found in the table";
// }

$conn->close();








// $con = connect_db();
// $sql = "INSERT INTO products (name, sku, brand, image, origsku, url)
// VALUES ('$product_name', '$sku', '$brand', '$images_str', '$originals_sku_arr_str', '$url')";
// $con->query($sql);  
$document->unloadDocument();
//   } 
// }
format($product);







    
