<?php
session_start();
//验证码
/*
 *  - 画布（浅色、随机）
    - 干扰（随机出现的线，随机出现的点）
    - 输出文字
    - 展示
    - 释放资源
*/ 
//画布（浅色、随机）
$img = imagecreatetruecolor(80,30);
//创建画布的背景色
$bgcolor = imagecolorallocate($img,
		              rand(200,255),
                      rand(200,255),
                      rand(200,255));
//填充画布
imagefill($img,0,0,$bgcolor);

//- 干扰（随机出现的线，随机出现的点）
for($i=0;$i<100;$i++){
	$color = imagecolorallocate($img,
			                    rand(100,200),
			                    rand(100,200),
			                    rand(100,200));
	imagesetpixel($img,rand(1,79),
	                   rand(1,29),$color);
}
//随机10条线
for($i=0;$i<10;$i++){
	$color = imagecolorallocate($img,
			rand(100,200),
			rand(100,200),
			rand(100,200));
	imageline($img,rand(1,79),rand(1,29),
	               rand(1,79),rand(1,29),$color);
	
}

//- 输出文字
$codes = "0123456789abcdefghijklmnopqrstuvwxyz";
//规定验证码的长度
$length = 4;
//从 库字符串 随机截取 每次截取一个字符
//定义一个将存储在session中的字符串变量
$words = "";
for($i=0;$i<$length;$i++){
	$color = imagecolorallocate($img,
			                    rand(0,100),
			                    rand(0,100),
			                    rand(0,100));
	
    $str = substr($codes,rand(0,strlen($codes)-1),1);
    //将验证码上的四个字符连接起来
    $words.=$str; 
    $x = (80/$length)*$i+5;
    $y = rand(5,10);
    imagestring($img,5,$x,$y,$str,$color);
}
//将验证码上的文字保存到session中
$_SESSION['code'] = $words;


//- 展示
header("Content-Type:image/png");
imagepng($img);

//- 释放资源
imagedestroy($img);























