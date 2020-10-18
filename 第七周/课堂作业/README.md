### 制作中英文双语数据,将上述制作的数据通过jqGrid渲染到网页上
```
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- The jQuery library is a prerequisite for all jqSuite products -->
    <script type="text/ecmascript" src="js/jquery.min.js"></script> 
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="js/i18n/grid.locale-en.js"></script>
    <!-- This is the Javascript file of jqGrid -->   
    <script type="text/ecmascript" src="js/jquery.jqGrid.min.js"></script>
    <!-- This is the localization file of the grid controlling messages, labels, etc.
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
    <!-- The link to the CSS that the grid needs -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid-bootstrap.css" />
	<script>
		$.jgrid.defaults.width = 780;
		$.jgrid.defaults.styleUI = 'Bootstrap';
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <meta charset="utf-8" />
    <title>jqGrid Loading Data - JSON</title>
</head>
<body>
<div style="margin-left:20px">
    <table id="jqGrid"></table>
    <div id="jqGridPager"></div>
</div>
<script type="text/javascript"> 
$(document).ready(function () {
		$("#jqGrid").jqGrid({
		url: 'data.json',
		datatype: "json",
		colNames: ['zh_CN', 'en_US'],
		 colModel: [
			{ label: 'zh_CN', name: 'zh_CN', width: 75 },
			{ label: 'en_US', name: 'en_US', width: 90 },	                  
		],
		viewrecords: true, // show the current page, data rang and total records on the toolbar
		width: 780,
		height: 200,
		rowNum: 30,
		loadonce: true, // this is just for the demo
		pager: "#jqGridPager"
	});
});
 </script>
</body>
</html>
```
![image](https://github.com/bige1997372/Database-Principle2/blob/master/%E7%AC%AC%E4%B8%83%E5%91%A8/%E8%AF%BE%E5%A0%82%E4%BD%9C%E4%B8%9A/jq1.png)
### 创建数据库与表，将上述制作的中英文双语数据导入数据库中,直接通过pdo访问数据库并包装返回结果
search.php
```
<?php
	$dbconn = array(
		'dns'=>"mysql:host=localhost;dbname=db",
		'dbuser'=>'root',
		'dbpwd'=>''
	);
	try{
		$db = new PDO($dbconn['dns'],$dbconn['dbuser'],$dbconn['dbpwd']);
		$db->query("set names utf8");
		$sql = "SELECT * FROM `sheet1`";
		$query = $db->query($sql);
		$return=array();
		foreach($query as $rows)
		{
			$return['rows'][]=$rows;
		}
		echo (json_encode($return));
	}catch(PDOException  $e)
	{
		echo $e->getMessage();
	}
?>
```
