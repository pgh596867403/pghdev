<?php
//从新闻分类表中读取出新闻分类(cms_type)
include '../common/db.inc.php';
//3、操作
$query = "select id,tname from cms_type";
//$result对于有返回结果集的sql语句，返回资源
$result = mysql_query($query);
//添加新闻
if(!empty($_POST)){
	//当$_POST非空时，获取用户post来的信息
	//获取新闻标题
	$title = $_POST['title'];
	//新闻分类
	$type =  $_POST['type'];
	//新闻内容
	$contents =  $_POST['contents'];
	//向数据库输入内容
	$query = "insert cms_article 
			  (title,contents,tid,aid,addtime)
			  value
			  ('".$title."','".$contents."',
			  ".$type.",1,now())";
	//echo $query;
	$result = mysql_query($query);
	//mysql_query对于没有返回结果集的sql语句返回布尔值
	if($result){
		echo "新闻添加成功";
	}else{
		echo "新闻添加失败";
	}
	
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>my demo</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css" media="all"/>
<style>
    #wrap{
	     padding:20px;
    }
     table{
	      width:100%;
     	  border-top:1px solid #ccc;
     	  border-left:1px solid #ccc;
     }
     td,th{
	      border-right:1px solid #ccc;
     	  border-bottom:1px solid #ccc;
     	  padding:8px;
     }
</style>
</head>
<body>
 <div id="wrap">
    <form action="addnew.php" method="post">
          <table>
               <tr>
                     <th colspan="2" class="title" style="font-size:30px">新闻发布</th>
               </tr>
               <tr>
                    <td>标题</td>
                    <td><input   type="text" name="title"/></td>
               </tr>
               <tr>
                    <td>分类</td>
                    <td>
                         <select name="type">
                              <?php
                                while($row=mysql_fetch_assoc($result)){ 
                              ?>
                              <option value="<?php echo $row['id']; ?>">
                               <?php echo $row['tname']; ?>                                
                              </option>
                              <?php } ?>
                         </select>
                    </td>
               </tr>
               <tr>
                    <td>正文</td>
                    <td>
                        <textarea rows="10" cols="50" name="contents"></textarea>
                    </td>
               </tr>
               <tr>
                     <th colspan="2">
                         <input type="submit" value="发布"/>
                     </th>
               </tr>
          </table>
    </form>
 </div>
</body>
</html>