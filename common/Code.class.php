<?php
session_start();
class Code{
	public $image;
	public $width;
	public $height;
	public $word;
	public $length;
	function __construct($width,$height,$length){
		$this->width=$width;
		$this->height=$height;
		$this->length=$length;
		
	}
//填充背景颜色-----------------------------------
	function Bgcolor(){
		$this->image=imagecreatetruecolor($this->width, $this->height);
		$color=imagecolorallocate($this->image, 
										rand(200, 255), 
										rand(200, 255), 
										rand(200, 255));
		imagefill($this->image, 0, 0, $color);
	}
//干扰----------------------------------------------
	function disturb(){
		for ($i=1;$i<=100;$i++){
			$color=imagecolorallocate($this->image,
					rand(50, 100),
					rand(50, 100),
					rand(50, 100));
			imagesetpixel($this->image, rand(0, 80), rand(0, 40), $color);
		}
		for ($i=1;$i<=5;$i++){
			$color=imagecolorallocate($this->image,
					rand(50, 100),
					rand(50, 100),
					rand(50, 100));
			imageline($this->image, rand(0, 80), rand(0, 40), 
									rand(0, 80), rand(0, 40), $color);
		}
	}
//获取验证码字符串------------------------------------------------------
	function getstr(){
		for ($i=0;$i<$this->length;$i++){
			$string='1234567890qazwsxedcrfvtgbyhnujmikolp';
			$this->word .= substr($string, rand(0, strlen($string)-1),1);	
		}
	}
//给画布输入字符串----------------------------------------------------
	function getcode(){
		for ($i=0;$i<$this->length;$i++){
			$color=imagecolorallocate($this->image,
										rand(0, 100),
										rand(0, 100),
										rand(0, 100));
			$string=substr($this->word, $i,1);
			$x=($this->width/$this->length)*$i+5;
			$y=rand(10, 25);
			$font=5;
			imagestring($this->image, $font, $x, $y, $string, $color);
		}
		$_SESSION['code']=$this->word;
	}
	function newcode(){
		$this->Bgcolor();
		$this->disturb();
		$this->getstr();
		$this->getcode();
	
	}
//输出图片------------------------------------------------------	
	function __destruct(){
		header("Content-Type:image/png");
		imagepng($this->image);
		imagedestroy($this->image);
	}
	
}
$c = new Code(80,40,4);
$c->newcode();