<?php
//引入数据库配置文件
include '../common/db.inc.php';
//获取总记录数
$query = "select a.id,a.title,t.tname,a.addtime from newtext as a
		  inner join newtype as t
		  on tid=t.id";
		  
$result = mysql_query($query);
$total = mysql_num_rows($result); 
// var_dump($row=mysql_fetch_assoc($result));
/* while($row=mysql_fetch_assoc($result)){
	echo $row['title'];
	echo '<br/>';
}
exit;  */

//每页显示记录数
$page_size = 8;
//总页数 = ceil(总记录数/每页显示记录数)
$total_page = ceil($total/$page_size);

//获取当前页
$page = isset($_GET['p'])?$_GET['p']:1;
//当前页限制
if($page<=0){
	$page=1;
}else if($page>$total_page&&$total_page!=0){
	$page=$total_page;
}
//首页 上一页
//上一页=当前页-1
$p = $page-1;
$flists = "";
if($p>0){
$flists = "&nbsp;<a href='?p=1'>首页</a>&nbsp;
		   <a href='?p=".$p."'>上一页</a>&nbsp;";
}
//1 2 3 4 5 6 7 
//5 6 7 
$num = 3;
$lists = "";
//1 2 3
for($i=$num;$i>=1;$i--){
	$n = $page-$i;
	if($n>0){
		$n = "&nbsp;<a href='?p=".$n."'>".$n."</a>&nbsp;";
		$lists.=$n;
	}
}
	
	
	
$lists.="&nbsp;".$page."&nbsp;";
for($i=1;$i<=$num;$i++){
	$n = $page+$i;
	if($n<=$total_page){
		$n = "&nbsp;<a href='?p=".$n."'>".$n."</a>&nbsp;";	
		$lists.=$n;
	}
}

//下一页 尾页
//下一页 当前页+1
$n = $page+1;
$llist = "";
if($n<=$total_page){
	$llist = "&nbsp;<a href='?p=".$n."'>下一页</a>&nbsp;
			  <a href='?p=".$total_page."'>尾页</a>&nbsp;";
}

//计算limit的偏移量
//偏移量 = （当前页-1）* 每页显示记录数
$offset = ($page-1)*$page_size;

//将cms_article表中的数据读取出来
$query = "select a.id,title,tid,addtime,tname 
		  from newtext as a inner join
		  newtype as t on a.tid=t.id limit 
		  $offset,$page_size";
$result = mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>my demo</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css" media="all"/>
<style>
    #wrap{
	     padding:2px;
    }
     table{
	      width:100%;
     	  border-top:1px solid #ccc;
     	  border-left:1px solid #ccc;
     }
     td,th{
	      border-right:1px solid #ccc;
     	  border-bottom:1px solid #ccc;
     	  padding:2px;
     }
</style>
</head>
<body>
 <div id="wrap">
    <form action="bathdel.php" method="post" style="font-size:20px">
          <table>
               <tr >
                     <th colspan="6" class="title" >新闻列表</th>
               </tr>
                <tr>
                    <th><a href="javascript:selectAll()">全选</a></th>
	                <th>ID</th>
	                <th>新闻标题</th>
	                <th>新闻分类</th>
	                <th>添加时间</th>
	                <th>操作</th>
                </tr>
                <!-- 循环输出新闻表中的内容-->
                <?php while ($row=mysql_fetch_assoc($result)){?>
           			<tr>
           				<th><input type="checkbox" value="<?php echo $row['id']?>" name="ids[]"/></th>
           				<th><?php echo $row['id']?></th>
           				<th><?php echo $row['title']?></th>
           				<th><?php echo $row['tname']?></th>
           				<th><?php echo $row['addtime']?></th>
           				<th><a href="editor.php?p=<?php echo $row['id']?>">编辑</a>|删除</th>
           			</tr>
           			
           			
           		<?php }?>
                <!-- 循环输出新闻表中的内容-->
                <tr>
	                <td colspan="5">
		                <?php
		              
		                echo "共".$total_page."页&nbsp;当前第".$page."页".$flists.$lists.$llist; 
		                ?>
	                </td>
	                <th><input type="submit" value="批量删除"/></th>
                </tr>
          </table>
    </form>
 </div>
 <script>
var obj=document.getElementsByName('ids[]');
function selectAll(){
	for(var i=0;i<obj.length;i++){
		obj[i].checked=true;
		
	}
}



 </script>
</body>
</html>





