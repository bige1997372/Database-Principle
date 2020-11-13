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
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%8D%81%E5%91%A8/%E8%AF%BE%E4%B8%8A%E4%BD%9C%E4%B8%9A/2.png)
#### 使用 PHPQuery库、
```
<?php
include 'phpQuery/phpQuery.php'; 
phpQuery::newDocumentFile('test1.tmx'); 
echo pq('tu > tuv> seg');
?>
```
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E5%8D%81%E5%91%A8/%E8%AF%BE%E4%B8%8A%E4%BD%9C%E4%B8%9A/1.png)
