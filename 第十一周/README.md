#### 将本小组数据库设计完成，并编写尽可能多会用到的sql语句
```
<?php
	$sql="select * from project where PM_ID = '$userid'";//项目
	$sql="select * from filefortranslation where project_ID = '$projectID'";//项目中文件
	$sql="select translationID,sourceText,targetText from translationbase where translationsheet = 
			(select translationsheet_ID from translationbase where file_ID='$fileID')";//翻译字段
	$sql="select * from termsheet where tbsheet_Owner = '$username'";//术语表列表
	$sql="select * from termbase where tbsheet_ID = '$tbid'";//术语条目列表
	$sql="select * from translationmemorysheet where tmsheet_Owner = '$username'";//翻译记忆库列表
	$sql="select * from translationmemorybase where tmsheet_ID = '$tmid'";//翻译记忆条目列表
	$sql="select * from team where pm_ID = '$userid'";//小组列表
	$sql="select translator_ID1,translator_ID2,translatorID_3 from team where team_ID = '$teamid'";//小组成员列表
	$sql="select * from filefortranslation where file_ID in (select deleted_ID from deletedfile)";//回收站
	$sql="select * from machinetranslation";
	$sql="select * from websearch";
?>
```
