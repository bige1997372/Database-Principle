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