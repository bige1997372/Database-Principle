#### 使用 PHP simpleXML
```
<?php
$study = array();
$xml = simplexml_load_file('test1.tmx');
foreach($xml->children() as $period) {
    $study[] = get_object_vars($period);//获取对象全部属性，返回数组
}
echo '<pre>';
print_r($study);
?>
```
![image]()
#### 使用 PHPQuery库、
```
<?php
include 'phpQuery/phpQuery.php'; 
phpQuery::newDocumentFile('test1.tmx'); 
echo pq('tu > tuv> seg');
?>
```
![image]()
