<?php
include './common/config.inc.php';
//引入公用的数据库配置文件
include "./common/db.inc.php";

//判断用户是否提交数据
if($_POST){
	//首先收录验证码
	$code = $_POST['verify'];
	$username = $_POST['username'];
	if($username==""){
		$abc = "用户名不能为空";
		exit;
	}
	
	$password = $_POST['password'];
	if($password==""){
		echo "密码不能为空";
		exit;
	}
	
	//收录协议
	$protocol = isset($_POST['protocol'])?
	            $_POST['protocol']:0;
	if($protocol==0){
		echo  "请选择已阅读并同意协议";
		exit;
	}
		if($code==""){
		echo '验证码不能为空';
		exit;
	}
	if($code!=$_SESSION['code']){
		echo "验证码错误";
		exit;
	}
	//数据库操作
	$query = "insert into cms_user
			  (username,password)
			  value
			  ('".$username."','".$password."') ";
	$result = mysql_query($query);
	if($result){
		//帮助用户登录，或者给出登录链接让用户
		//用户信息保存到session中
		//用户名 id
		//自己去登录
		$_SESSION['username']=$username;
		$_SESSION['id']=mysql_insert_id();
		//跳转回index.php
		header("location:index.php");
		
	}else{
		echo "注册失败";
	}
	
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册_新闻视界</title>
<link href="styles/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="styles/layout.css" rel="stylesheet" type="text/css" media="all" />
<link href="styles/common.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="header-wrapper">
	<div class="wrapper">
		<div id="header">
			<div class="side-left logo">
				<a href="#" title="换一个角度看新闻">新闻视界</a>
			</div>
			<div class="side-center page-title"><span>注册</span></div>
			<div class="side-right login-bar"><a href="login.html" target="_blank">快速登录</a><a href="index.html" target="_blank">返回首页</a></div>
		</div>
	</div>
</div>
<div id="register-wrapper">
	<div id="register-main">
		<div class="progress-bar-input" id="progress-bar"></div>
		<form id="register-form" action="" method="post">
			<ul>
				<li class="clear">
					<span class="register-title side-left">账号:</span>
					<input type="text" name="username" class="register-input-username side-left"/>
					<span class="prompt side-left">
						<?php  echo @$abc; ?>
					</span>
				</li>
				<li class="clear">
					<span class="register-title side-left">密码:</span>
					<input type="password" name="password" class="register-input-password side-left"/>
					<span class="prompt side_left">
						<?php  echo @$pwd; ?>
					</span>
				</li>
				<li class="clear">
					<span class="register-title side-left">验证码:</span>
					<input type="text" name="verify" class="register-input-verify side-left"/>
					<img src="common/Code.class.php" />
					<span class="prompt side-left">
						<?php echo @$a;  echo @$b;?>	
					</span>
				</li>
				<li class="register-protocol">
					<input type="checkbox" name="protocol" checked="checked" value="1"/>我已阅读并同意《新闻视界用户服务条款与隐私保护政策》
				</li>
				<li class="register-button">
				<input type="submit" value="注册新账号" class="register-submit-button"/>
				</li>
			</ul>
		</form>
	</div>
</div>
</body>
</html>
