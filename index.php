<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('max_execution_time', 0);
ini_set('default_charset', 'UTF-8');
function format ($expre) {
    echo "<pre>";
    print_r($expre);
    echo "</pre>";
  }

function connect_db () {
  $servername = "localhost";
$username = "strument_usr"; 
$password = "Mqky4Crd";
$dbname = "kramp_full_import_garden";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
return $conn;
}
//преобразовувует первый символ в заглавный
function mb_ucfirst($str, $encoding = 'UTF-8') {
  $firstChar = mb_substr($str, 0, 1, $encoding);
  $rest = mb_substr($str, 1, mb_strlen($str, $encoding) - 1, $encoding);
  return mb_strtoupper($firstChar, $encoding) . $rest;
}


include_once('phpQuery.php');
$product = [];
$key = 0;

$dir_files_pages = 'data\all_products_garden';
$files_in_directory = scandir($dir_files_pages);

$flag = 0;
foreach ($files_in_directory as $key=>$files) {
  // if ($flag>2000) break;
 
  if ($files[0]!=='.' && $files[1]!=='.') {
  // $doc = file_get_contents($dir_files_pages.'/'.'page_10179.html');


$doc = file_get_contents($dir_files_pages.'/'.$files);
$document = phpQuery::newDocument($doc);


// полный h1 c названием и артикулом
$h1 = $document->find('h1');

//назва без артикулу
$product_name = pq('$h1 span:eq(1)')->text();
$product[$key]['product_name']= $product_name;
/////////////////////////////////////////////


//перекладач
$product_name = str_ireplace('ZUGFEDER', 'пружина', $product_name);
$product_name = str_ireplace('EXTENSION SPRING Reel', 'пружина', $product_name);
$product_name = str_ireplace('Recoil Starter', 'стартер', $product_name);
$product_name = str_ireplace('BOWDENZUG', 'трос Боудена', $product_name);
$product_name = str_ireplace('Choke cable', 'кабель дроселя', $product_name);
$product_name = str_ireplace('Clutch cable', 'трос зчеплення', $product_name);
$product_name = str_ireplace('Weeding wire', 'прополювальний дріт', $product_name);
$product_name = str_ireplace('Nylon line', 'нейлонова волосінь', $product_name);
$product_name = str_ireplace('Леска для триммера', 'ліска для тримера', $product_name);
$product_name = str_ireplace('Trimmer head semi-automatic', 'тримерна полуавтоматична головка', $product_name);
$product_name = str_ireplace('Леска для триммера', 'ліска для тримера', $product_name);
$product_name = str_ireplace('Knob LH thread', 'ручка з лівою різьбою', $product_name);
$product_name = str_ireplace('Нож триммера', 'ніж тримера', $product_name);
$product_name = str_ireplace('Knob LH thread', 'ручка з лівою різьбою', $product_name);
$product_name = str_ireplace('Brushes kit', 'щітки', $product_name);
$product_name = str_ireplace('Лезвие для мотокосы', 'лезо мотокоси', $product_name); 
$product_name = str_ireplace('Cutter', 'різак', $product_name); 
$product_name = str_ireplace('Recoil pulley', 'шків стартера', $product_name); 
$product_name = str_ireplace('Compression spring', 'пружина стиснення', $product_name); 
$product_name = str_ireplace('DREHFEDER', 'пружина', $product_name); 
$product_name = str_ireplace('Piston', 'поршень', $product_name); 
$product_name = str_ireplace('Spring-Torsion', 'пружина', $product_name); 
$product_name = str_ireplace('Piston ring set', 'поршневі кільця', $product_name); 
$product_name = str_ireplace('Spring-Torsion', 'пружина', $product_name); 
$product_name = str_ireplace('Spring', 'пружина', $product_name); 
$product_name = str_ireplace('Coil Assy', 'котушка', $product_name); 
$product_name = str_ireplace('Flywheel Assy', 'маховик', $product_name); 
$product_name = str_ireplace('Brush set', 'щітки', $product_name); 
$product_name = str_ireplace('Oil filter', 'масляний фільтр', $product_name); 
$product_name = str_ireplace('Fan', 'вентилятор', $product_name); 
$product_name = str_ireplace('Cap', 'головка', $product_name); 
$product_name = str_ireplace('O-Ring', 'о кільце', $product_name); 
$product_name = str_ireplace('Tube', 'труба', $product_name); 
$product_name = str_ireplace('Spark plug', 'свічка запалювання', $product_name); 
$product_name = str_ireplace('Solenoid coil', 'електромагнітна котушка', $product_name); 
$product_name = str_ireplace('Spark plug', 'свічка запалювання', $product_name); 
$product_name = str_ireplace('Return spring', 'зворотна пружина', $product_name); 
$product_name = str_ireplace('Zugfeder Getriebe', 'редуктор пружини розтягування', $product_name); 
$product_name = str_ireplace('Exhaust gasket', 'прокладка вихлопу', $product_name); 
$product_name = str_ireplace('Gasket fuel pump', 'прокладка паливного насоса', $product_name); 
$product_name = str_ireplace('Катушка зажигания', 'катушка запалення', $product_name);
$product_name = str_ireplace('EXTENSION SPRING', 'пружина', $product_name);
$product_name = str_ireplace('SPRING', 'Пружина', $product_name);
$product_name = str_ireplace('Reel, стартер', 'котушка стартера', $product_name);
$product_name = str_ireplace('Воздушный фильтр', 'Повітряний фільтр', $product_name);
$product_name = str_ireplace('FEDER', 'пружина', $product_name);
$product_name = str_ireplace('Щетки угольные', 'вугільні щітки', $product_name);
$product_name = str_ireplace('Extension spring', 'вугільні щітки', $product_name);
$product_name = str_ireplace('Поршень ring set', 'комплект поршньових кілець', $product_name);
$product_name = str_ireplace('Ignition coil', 'катушка запалення', $product_name);
$product_name = str_ireplace('Starter motor', 'стартер', $product_name);
$product_name = str_ireplace('Регулятор напряжения', 'регулятор напруги', $product_name);
$product_name = str_ireplace('Клиновой ремень', 'клиновий ремінь', $product_name);
$product_name = str_ireplace('Nut copper for exhaust', 'гайка мідна для вихлопу', $product_name);
$product_name = str_ireplace('Torsion spring', 'пружина', $product_name);
$product_name = str_ireplace('Удлинительная пружина', 'подовжувальна пружина', $product_name);
$product_name = str_ireplace('Zugfeder für Klauenkupplungsge', 'пружина розтягування для зубчастого зчеплення', $product_name);
$product_name = str_ireplace('Feder', 'Пружина', $product_name);
$product_name = str_ireplace('натяжная', 'натяжна', $product_name);
$product_name = str_ireplace('clutch/brake', 'зчеплення/гальмо', $product_name);
$product_name = str_ireplace('Tension spring', 'пружина', $product_name);
$product_name = str_ireplace('Upper handle with soft grip', "верхня ручка з м'якою ручкою", $product_name);
$product_name = str_ireplace('Seat', "сидіння", $product_name);
$product_name = str_ireplace('Сиденье', "сидіння", $product_name);
$product_name = str_ireplace('Упорное кольцо', "упорне кільце", $product_name);
$product_name = str_ireplace('Nut', "гайка", $product_name);
$product_name = str_ireplace('Screw', "гвинт", $product_name);
$product_name = str_ireplace('Bolt', "болт", $product_name);
$product_name = str_ireplace('Кольцо стопорное', "Кільце стопорне", $product_name);
$product_name = str_ireplace('упорная', "упорна", $product_name);
$product_name = str_ireplace('Washer', "шайба", $product_name);
$product_name = str_ireplace('Spacer', "розпірна втулка", $product_name);
$product_name = str_ireplace('Кольцо', "кільце", $product_name);
$product_name = str_ireplace('сжатия', "стиснення", $product_name);
$product_name = str_ireplace('сцепления', "зчеплення", $product_name);
$product_name = str_ireplace('Натяжная', "натяжна", $product_name);
$product_name = str_ireplace('Handle grip', "захват ручки", $product_name);
$product_name = str_ireplace('Нижняя', "нижня", $product_name);
$product_name = str_ireplace('Крепление', "кріплення", $product_name);
$product_name = str_ireplace('правый', "правий", $product_name);
$product_name = str_ireplace('Держатель', "тримач", $product_name);
$product_name = str_ireplace('Rear seat tray', "лоток для заднього сидіння", $product_name);
$product_name = str_ireplace('extension', "витягування", $product_name);
$product_name = str_ireplace('spark plug cap', "ковпачок свічки запалювання", $product_name);
$product_name = str_ireplace('левая', "ліва", $product_name);
$product_name = str_ireplace('левый', "лівий", $product_name);
$product_name = str_ireplace('выхлопной трубы', "вихлопної труби", $product_name);
$product_name = str_ireplace('Фрикционный диск', "фрикційний диск", $product_name);
$product_name = str_ireplace('распорный', "розпірний", $product_name);
$product_name = str_ireplace('дисковая', "дискова", $product_name);
$product_name = str_ireplace('Стопорное кольцо', "стопорне кільце", $product_name);
$product_name = str_ireplace('нейтральная', "нейтральна", $product_name);
$product_name = str_ireplace('Snap ring', "стопорне кільце", $product_name);
$product_name = str_ireplace('Locking nut', "стопорна гайка", $product_name);
$product_name = str_ireplace('Shim', "шайба", $product_name);
$product_name = str_ireplace('Винт', "гвинт", $product_name);
$product_name = str_ireplace('двигателя', "двигуна", $product_name);
$product_name = str_ireplace('für Klauenkupplungsge', "для зубчастого зчеплення", $product_name);
$product_name = str_ireplace('рычага управления', "важеля управління", $product_name);
$product_name = str_ireplace('красная', "червона", $product_name);
$product_name = str_ireplace('с треугольной головкой', "з трикутною головкою", $product_name);
$product_name = str_ireplace('Защелка стопорная', "засувка стопорна", $product_name);
$product_name = str_ireplace('растяжения', "розтягування", $product_name);
$product_name = str_ireplace('рычага', "важеля", $product_name);
$product_name = str_ireplace('управления', "керування", $product_name);
$product_name = str_ireplace('рычага', "важеля", $product_name);
$product_name = str_ireplace('Handle', "ручка", $product_name);
$product_name = str_ireplace('Изоляционная', "ізоляційна", $product_name);
$product_name = str_ireplace('Барашковая', "барашкова", $product_name);
$product_name = str_ireplace('Держатель', "Тримач", $product_name);
$product_name = str_ireplace('Нижняя', "нижня", $product_name);
$product_name = str_ireplace('Соединительный', "з'єднувальний", $product_name);
$product_name = str_ireplace('предохранительная', "запобіжна", $product_name);
$product_name = str_ireplace('Уплотнительная', "ущільнювальна", $product_name);
$product_name = str_ireplace('Circlip', "стопорне кільце", $product_name);
$product_name = str_ireplace('Рым-гайка', "рим-гайки", $product_name);
$product_name = str_ireplace('Шестигранный', "шестигранний", $product_name);
$product_name = str_ireplace('for', "для", $product_name);
$product_name = str_ireplace('Tension', "напруга", $product_name);
$product_name = str_ireplace('Self locking', "з автоматичним блокуванням", $product_name);
$product_name = str_ireplace('Левая', "ліва", $product_name);
$product_name = str_ireplace('Self locking', "з автоматичним блокуванням", $product_name);
$product_name = str_ireplace('Self locking', "з автоматичним блокуванням", $product_name);
$product_name = str_ireplace('Self locking', "з автоматичним блокуванням", $product_name);












// внутрішній артикул
$sku = pq('$h1 span:eq(0)')->text();
$product[$key]['sku']= $sku;
////////////////////////////////////////////////////// внутрішній артикул

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
// проверка на Не вдалося знайти сторінку




//повна назва товару типу 'Диск троса Honda 28415ZG9802
//проверка есть ли в имени бренд
$have_name_brand;
if (stripos($product_name, $brand) !== false) {
$full_name = $product_name . ' '. $sku;
$full_name = ucfirst($full_name);
$full_name =  mb_ucfirst($full_name);
}
else {
  $full_name = $product_name . ' '. $brand . ' '. $sku;
  $full_name =  mb_ucfirst($full_name);
}



// посилання на сторінку
$url = $document->find('link[rel="canonical"]');
$url = pq($url);
$url = $url->attr('href');
$product[$key]['url'] = $url;
// echo $url.'<br>';
///////////////////////////////////////////////посилання на сторінку




//хлыбны крошки
$bread_arr = [];
$bread_path = $document->find('.kh-pt53y');
foreach($bread_path as $key=>$value){
  $pq = pq($value)->text();
  $bread_arr[] = $pq;
}

if (!in_array('Деталі для мотоблоків і газонокосарок', $bread_arr)) continue;
//тип. береться з крошок 
$type_product = array_pop($bread_arr);
$type_product = str_replace(' - огляд - Оригінальне обладнання', '', $type_product);
$type_product = str_replace('Handles - overview - OE', 'Ручки', $type_product);
$type_product = str_replace('Push lever supports - overview - OE', 'Опори натискного важеля', $type_product);
$type_product= str_replace('- огляд - Оригінальні', '', $type_product);
$type_product= str_replace(', оригінальне обладнання', '', $type_product);
   
echo $type_product.'<br>';

//
echo '<b>'.$full_name.'</b><br>';


$bread_string = implode('>', $bread_arr); 

echo $bread_string.'<br>';






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


//пустышки картинки logo-,  assproductimage-



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


$row_name = $descrition->find('tr');
//название значения
foreach ($row_name as $key1=>$value) {
  $th = pq($value)->find('th')->text();
  $tr = pq($value)->find('td')->text();
  $tr = str_replace('mm', 'мм', $tr);
  $tr = str_replace('Inch', 'дюйм', $tr);
  $tr = str_replace('cm', 'см', $tr);
 $tr = str_replace('pcs', 'шт', $tr);
  $tr = str_replace(' m', ' м', $tr);
  $tr = str_replace('Rubber', 'Гумовий', $tr);
  $tr = str_replace('Twisted', 'Кручений', $tr);
  $tr = str_replace('Round', 'Круглий', $tr);
  $tr = str_replace('Metric', 'Метрична', $tr);
  $tr = str_replace('Reel', 'Катушка', $tr);
   $tr = str_replace('Square', 'Квадрат', $tr);
$tr = str_replace(' V', ' В', $tr);
$tr = str_replace('Toothed', 'Зубчастий', $tr);
$tr = str_replace('Chloroprene rubber', 'Хлоропреновий каучук', $tr);
$tr = str_replace('r/min', 'об/хв', $tr);
$tr = str_replace('Tube', 'Тюбик', $tr);
$tr = str_replace('Yellow', 'Жовтий', $tr);
$tr = str_replace('Seat repairing', 'Ремонт сидінь', $tr);


 
  $li = pq($value)->find('.kh-16zd49f')->html();
if($li) {
  $li = str_replace('</span><span>', ' | ', $li);
$li = str_replace('mm', 'мм', $li);

  $description_row_value[$key1] = $li;
}
else {
  $description_row_value[$key1] = $tr;
}
      $description_row[$key1] = $th;
      
    }


$combine_description = array_combine($description_row, $description_row_value);
format($combine_description);





$con = connect_db();
$sql = "INSERT INTO products (name, sku, brand, image, origsku, url)
VALUES ('$full_name', '$sku', '$brand', '$images_str', '$originals_sku_arr_str', '$url')";
$con->query($sql);  




foreach($combine_description as $column => $value) {


    $existing_columns = array();
$sql_show_columns = "SHOW COLUMNS FROM products";
$result_columns = $con->query($sql_show_columns);
if ($result_columns->num_rows > 0) {
    while($row = $result_columns->fetch_assoc()) {
        $existing_columns[] = $row['Field'];
    }
}


    // echo 'column'. '-------'.$column.'<br>';
    // echo 'value'. '-------'.$value.'<br>';
    if (in_array($column, $existing_columns)) {
        $sql_update = "UPDATE products SET $column = '$value'";
        $con->query($sql_update);
          }
else {
    $sql_add_column = "ALTER TABLE products ADD $column VARCHAR(255)";
    $con->query($sql_add_column);
        $sql_add_value = "UPDATE products SET $column = '$value'";
        $con->query($sql_add_value);
        } 
   }

   $con->close();
unset($combine_description);
unset($existing_columns);












$flag++;
$document->unloadDocument();
echo "<hr>";
  } 
}








    
