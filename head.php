<?php
include './common/config.inc.php'; 
?>
<!-- 通用顶部导航开始-->
<div id="top-navi-wrap">
	<div class="clearfix" id="top-navi">
		<div class="side-left">
			<a href="#">巴西世界杯一再爆冷 卫冕冠军西班牙出局</a>
			<a href="#">瑞士人为啥最幸福</a>　
			<a href="#">中国病人庞麦郎</a>
		</div>
		<div class="side-right">
		  <?php
		  //判断用户是否登录
		  if(isset($_SESSION['username'])&&$_SESSION['username']!=""){ 
		  ?>
		  <span>您好，<a href="#" class="current-user">
		  <?php echo '欢迎'.$_SESSION["username"]; ?>
		  </a></span>
				<a href="logout.php">退出</a>
		  <?php }else{ ?>		
			<a href="login.php" target="_blank" class="top-nav-login-title">登录</a>
			<div class="top-nav-select-title">
				<a href="register.php" target="_blank">免费注册</a>
			<?php } ?>	
			</div>
		</div>
	</div>
</div>
<!-- 通用顶部导航结束 -->
<!--header start-->
<div class="clear" id="header">
		<div id="logo"><a href="#" title="换一个角度看新闻"></a></div>
		<div id="search-bar">
			<form name="search-form" action="" method="get">
				<input type="text" name="keywords" id="keywords" value="党报连发治军铁腕新政"/>
				<input type="submit" value="" id="search-submit-button"/>
			</form>
		</div>
</div>
<!--header end-->
<!--导航开始-->
<div id="navigation">
	<ul class="clear">
		<li><a href="index.php" target="_blank">首页</a></li>
		<li><a href="roll.html" target="_blank">滚动</a></li>
		<li><a href="china.html" target="_blank">国内</a></li>
		<li><a href="world.html" target="_blank">国际</a></li>
		<li><a href="society.html" target="_blank">社会</a></li>
		<li><a href="photo.html" target="_blank">图片</a></li>
		<li><a href="ent.html" target="_blank">娱乐</a></li>
		<li><a href="military.html" target="_blank">军事</a></li>
		<li><a href="bbs.html" target="_blank">评论</a></li>
		<li><a href="history.html" target="_blank">历史</a></li>
		<li><a href="encyclopedia.html" target="_blank">百科</a></li>
		<li><a href="commonweal.html" target="_blank">公益</a></li>
	</ul>
</div>
<!--导航结束-->