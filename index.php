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
$product_name = str_replace('ZUGFEDER', 'пружина', $product_name);
$product_name = str_replace('EXTENSION SPRING Reel', 'пружина', $product_name);
$product_name = str_replace('Recoil Starter', 'стартер', $product_name);
$product_name = str_replace('BOWDENZUG', 'трос Боудена', $product_name);
$product_name = str_replace('Choke cable', 'кабель дроселя', $product_name);
$product_name = str_replace('Clutch cable', 'Трос зчеплення', $product_name);
$product_name = str_replace('Weeding wire', 'Прополювальний дріт', $product_name);
$product_name = str_replace('Nylon line', 'Нейлонова волосінь', $product_name);
$product_name = str_replace('Леска для триммера', 'Ліска для тримера', $product_name);
$product_name = str_replace('Trimmer head semi-automatic', 'тримерна полуавтоматична головка', $product_name);
$product_name = str_replace('Леска для триммера', 'Ліска для тримера', $product_name);
$product_name = str_replace('Knob LH thread', 'Ручка з лівою різьбою', $product_name);
$product_name = str_replace('Нож триммера', 'ніж тримера', $product_name);
$product_name = str_replace('Knob LH thread', 'Ручка з лівою різьбою', $product_name);
$product_name = str_replace('Brushes kit', 'Щітки', $product_name);
$product_name = str_replace('Лезвие для мотокосы', 'Лезо мотокоси', $product_name); 
$product_name = str_replace('Cutter', 'різак', $product_name); 
$product_name = str_replace('Recoil pulley', 'Шків стартера', $product_name); 
$product_name = str_replace('Compression spring', 'Пружина стиснення', $product_name); 
$product_name = str_replace('DREHFEDER', 'пружина', $product_name); 
$product_name = str_replace('Piston', 'Поршень', $product_name); 
$product_name = str_replace('Spring-Torsion', 'Пружина', $product_name); 
$product_name = str_replace('Piston ring set', 'Поршневі кільця', $product_name); 
$product_name = str_replace('Spring-Torsion', 'Пружина', $product_name); 
$product_name = str_replace('Spring', 'Пружина', $product_name); 
$product_name = str_replace('Coil Assy', 'Котушка', $product_name); 
$product_name = str_replace('Flywheel Assy', 'Маховик', $product_name); 
$product_name = str_replace('Brush set', 'Щітки', $product_name); 
$product_name = str_replace('Oil filter', 'Масляний фільтр', $product_name); 
$product_name = str_replace('Fan', 'вентилятор', $product_name); 
$product_name = str_replace('Cap', 'головка', $product_name); 
$product_name = str_replace('O-Ring', 'о кільце', $product_name); 
$product_name = str_replace('Tube', 'труба', $product_name); 
$product_name = str_replace('Spark plug', 'Свічка запалювання', $product_name); 
$product_name = str_replace('Solenoid coil', 'Електромагнітна котушка', $product_name); 
$product_name = str_replace('Spark plug', 'Свічка запалювання', $product_name); 
$product_name = str_replace('Return spring', 'Зворотна пружина', $product_name); 
$product_name = str_replace('Zugfeder Getriebe', 'Редуктор пружини розтягування', $product_name); 
$product_name = str_replace('Exhaust gasket', 'Прокладка вихлопу', $product_name); 
$product_name = str_replace('Gasket fuel pump', 'Прокладка паливного насоса', $product_name); 
$product_name = str_replace('Катушка зажигания', 'Катушка запалення', $product_name);
$product_name = str_replace('EXTENSION SPRING', 'Пружина', $product_name);
$product_name = str_replace('SPRING', 'Пружина', $product_name);
$product_name = str_replace('Reel, стартер', 'Котушка стартера', $product_name);
$product_name = str_replace('Воздушный фильтр', 'Повітряний фільтр', $product_name);
$product_name = str_replace('FEDER', 'Пружина', $product_name);
$product_name = str_replace('Щетки угольные', 'Вугільні щітки', $product_name);
$product_name = str_replace('Extension spring', 'Вугільні щітки', $product_name);
$product_name = str_replace('Поршень ring set', 'Комплект поршньових кілець', $product_name);
$product_name = str_replace('Ignition coil', 'Катушка запалення', $product_name);
$product_name = str_replace('Starter motor', 'Стартер', $product_name);
$product_name = str_replace('Регулятор напряжения', 'Регулятор напруги', $product_name);
$product_name = str_replace('Клиновой ремень', 'Клиновий ремінь', $product_name);
$product_name = str_replace('Nut copper for exhaust', 'Гайка мідна для вихлопу', $product_name);
$product_name = str_replace('Torsion spring', 'Пружина', $product_name);
$product_name = str_replace('Удлинительная пружина', 'Подовжувальна пружина', $product_name);
$product_name = str_replace('Zugfeder für Klauenkupplungsge', 'Пружина розтягування для зубчастого зчеплення', $product_name);
$product_name = str_replace('Feder', 'Пружина', $product_name);
$product_name = str_replace('натяжная', 'натяжна', $product_name);
$product_name = str_replace('clutch/brake', 'зчеплення/гальмо', $product_name);
$product_name = str_replace('Tension spring', 'пружина', $product_name);
$product_name = str_replace('Upper handle with soft grip', "Верхня ручка з м'якою ручкою", $product_name);
$product_name = str_replace('Seat', "Сидіння", $product_name);
$product_name = str_replace('Сиденье', "Сидіння", $product_name);
$product_name = str_replace('Упорное кольцо', "Упорне кільце", $product_name);
$product_name = str_replace('Nut', "Гайка", $product_name);
$product_name = str_replace('Screw', "Гвинт", $product_name);
$product_name = str_replace('Bolt', "Болт", $product_name);
$product_name = str_replace('Кольцо стопорное', "Кільце стопорне", $product_name);
$product_name = str_replace('упорная', "упорна", $product_name);
$product_name = str_replace('Washer', "шайба", $product_name);
$product_name = str_replace('Spacer', "розпірна втулка", $product_name);
$product_name = str_replace('Кольцо', "кільце", $product_name);
$product_name = str_replace('сжатия', "стиснення", $product_name);
$product_name = str_replace('сцепления', "зчеплення", $product_name);
$product_name = str_replace('Натяжная', "натяжна", $product_name);
$product_name = str_replace('Handle grip', "захват ручки", $product_name);
$product_name = str_replace('Нижняя', "нижня", $product_name);
$product_name = str_replace('Крепление', "кріплення", $product_name);
$product_name = str_replace('правый', "правий", $product_name);
$product_name = str_replace('Держатель', "тримач", $product_name);
$product_name = str_replace('Rear seat tray', "Лоток для заднього сидіння", $product_name);




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

// echo $full_name.'<br>';


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
$bread_arr_format = array_pop($bread_arr);
$bread_arr_format = str_replace(' - огляд - Оригінальне обладнання', '', $bread_arr_format);
$bread_arr_format = str_replace('Handles - overview - OE', 'Ручки', $bread_arr_format);
$bread_arr_format = str_replace('Push lever supports - overview - OE', 'Опори натискного важеля', $bread_arr_format);
$bread_arr_format = str_replace('- огляд - Оригінальні', '', $bread_arr_format);

   
echo $bread_arr_format.'<br>';

//
echo $full_name.'<br>';
format($bread_arr);






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
 
  $li = pq($value)->find('.kh-16zd49f')->html();
if($li) {
  $li = str_replace('</span><span>', ' | ', $li);
$li = str_replace('mm', 'мм', $li);

   
  
  $description_row_value[$key1] = $li;
}
else {
  $description_row_value[$key1] = $tr;
}
 
      // echo $th.'----------' .$tr.'<br>';
      $description_row[$key1] = $th;
      
    }


$combine_description = array_combine($description_row, $description_row_value);
// format($combine_description);





$con = connect_db();
$sql = "INSERT INTO products (name, sku, brand, image, origsku, url)
VALUES ('$full_name', '$sku', '$brand', '$images_str', '$originals_sku_arr_str', '$url')";
$con->query($sql);  
$flag++;
$document->unloadDocument();
echo "<hr>";
  } 
}
// format($product);







    
