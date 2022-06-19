<?php


try {
	$db=new PDO("mysql:host=localhost;dbname=blog_db",'root','');
	$db->exec("set names utf8");
} catch(PDOException $e){
	echo $e->getMessage();
}


?>