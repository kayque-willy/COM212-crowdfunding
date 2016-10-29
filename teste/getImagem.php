<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "crowd";
	$PicNum = $_GET["PicNum"];

	mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 
	@mysql_select_db($db) or die("Impossível conectar ao banco."); 
	$result=mysql_query("SELECT * FROM projeto WHERE codigo='".$PicNum."'") or die("Impossível executar a query "); 
	$row=mysql_fetch_object($result); 
	Header( "Content-type: image/gif"); 
	echo $row->imagem; 
?>