<?php
header("Content-Type:text/html;charset=utf-8");
if ($_POST && $_POST['ids']!=''){
	$ids=$_POST['ids'];
	$su='';
	$err='';
	foreach ($ids as $id){
		$pdo=new PDO("mysql:host=127.0.0.1;dbname=news",'root','root');		
		$query="delete from newtext where id=?";
		$statement=$pdo->prepare($query);
		$statement->bindparam(1,$id);
		$result=$statement->execute();
		if($result){
			$su.='-'.$id;
		}else {
			$err.='-'.$id;
		}
	
	}
	echo '被删除的id为:'.$su;
	echo '<br/>';
	echo '未被删除的id为:'.$err;
	
	
	
}