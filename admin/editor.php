<?php
header("Content-Type:text/html;charset=utf-8");
$dsn="mysql:host=127.0.0.1;dbname=news";
$name="root";
$password="root";
$pdo = new PDO($dsn,$name,$password);
$query="update newtext set title=? ,tid=?,contents=? where id=? ";
$statement=$pdo->prepare($query);

if ($_POST && $_GET){
$sid1=$_POST['title'];
$sid2=$_POST['type'];
$sid3=$_POST['contents'];
$sid4=$_GET['p'];


$statement->bindParam(1,$sid1);
$statement->bindParam(2,$sid2);
$statement->bindParam(3,$sid3);
$statement->bindParam(4,$sid4);
$statement->execute();
echo '<h1><font color="green">发布成功</font></h1>';
}

?>
<form action='' method='post'>
<table>
<tr>
	<th colspan="2"></th>
	
</tr>
<tr>
	<td>标题</td>
	<td>
		<input type="text" name="title"/>
	</td>
</tr>
<tr>
	<td>分类</td>
	<td>
		<select name="type">
			<option value="1">国内新闻</option>
			<option value="2">国际新闻</option>
			<option value="3">体育新闻</option>
			<option value="4">娱乐新闻</option>
			<option value="5">搞笑新闻</option>
			<option value="6">明星新闻</option>
			<option value="7">政治新闻</option>
			
		</select>
	</td>
</tr>
<tr>
	<td>正文</td>
	<td>
		<textarea rows="20" cols="80" name="contents"></textarea>
	</td>
</tr>
<tr>
	<th colspan="2">
		<input type="submit" value="发布"/>
	</th>
</tr>
</table>
</form>





</table>