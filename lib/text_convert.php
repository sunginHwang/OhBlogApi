<?
/*
text to image converter
daftlogic 
www.daftlogic.com
*/
Header("Content-type: image/png");
class textPNG 
{
	var $font = 'fonts/NanumGothicBold.ttf'; //default font. directory relative to script directory.
	var $msg = "안녕하세요"; // default text to display.
	var $size = 24; // default font size.
	var $rot = 0; // rotation in degrees.
	var $pad = 0; // padding.
	var $transparent = 1; // transparency set to on.
	var $red = 0; // black text...
	var $grn = 0;
	var $blu = 0;
	var $bg_red = 255; // on white background.
	var $bg_grn = 255;
	var $bg_blu = 255;
	var $max_width = 0;
	var $max_height = 0;
	var $stroke = false;
	
	function draw() 
	{
		$width = 0;
		$height = 0;
		$offset_x = 0;
		$offset_y = 0;
		$bounds = array();
		$img = "";
	
		// get the font height.
		$bounds = ImageTTFBBox($this->size, $this->rot, $this->font, "W");
		if ($this->rot < 0) 
		{
			$font_height = abs($bounds[7]-$bounds[1]);		
		} 
		else if ($this->rot > 0) 
		{
		$font_height = abs($bounds[1]-$bounds[7]);
		} 
		else 
		{
			$font_height = abs($bounds[7]-$bounds[1])+2;
		}
		// determine bounding box.
		$bounds = ImageTTFBBox($this->size, $this->rot, $this->font, $this->msg);
		if ($this->rot < 0) 
		{
			$width = abs($bounds[4]-$bounds[0]);
			$height = abs($bounds[3]-$bounds[7]);
			$offset_y = $font_height;
			$offset_x = 0;
		} 
		else if ($this->rot > 0) 
		{
			$width = abs($bounds[2]-$bounds[6]);
			$height = abs($bounds[1]-$bounds[5]);
			$offset_y = abs($bounds[7]-$bounds[5])+$font_height;
			$offset_x = abs($bounds[0]-$bounds[6]);
		} 
		else
		{
			$width = abs($bounds[4]-$bounds[6])+2;
			$height = abs($bounds[7]-$bounds[1])+2;
			$offset_y = $font_height;;
			$offset_x = 0;
		}
		$new_width = $width+($this->pad*2);
		$new_height = $height+($this->pad*2);
		$img = imagecreatetruecolor($new_width,$new_height);
		imagealphablending($img, false);
		$transparency = $this->transparent ?  imagecolorallocatealpha($img, 0, 0, 0, 127) : imagecolorallocate($img, $this->bg_red, $this->bg_grn, $this->bg_blu);
		imagefill($img, 0, 0, $transparency);
		imagesavealpha($img, true);

		$foreground = ImageColorAllocate($img, $this->red, $this->grn, $this->blu);
		
		$strokecolor = ImageColorAllocate($img, 0, 0, 0);
	
		ImageInterlace($img, false);

		$gap = $this->size > 20 ? 0 : 0;

		if(preg_match('/^[[:alpha:]]*$/',$this->msg)===1){
			$gap-= 4;
		}
		// render the image
		ImageFTText($img, $this->size, $this->rot, $offset_x+$this->pad-1, $offset_y+$this->pad+$gap, $foreground, $this->font, $this->msg);
			
		$adjust_width = $this->max_width > 0 && $new_width/2 > $this->max_width ? $this->max_width : $new_width/2;
		$adjust_height = $this->max_height > 0 && ($new_height/2) > $this->max_height ? $this->max_height : $new_height/2;

		$image_p = imagecreatetruecolor($adjust_width, $adjust_height);

		imagesavealpha($image_p, true);
		imagealphablending($image_p, false);
		imagefilledrectangle($image_p, 0, 0,  $new_width, $new_height, 0xffffff);
		
		
		imagecopyresampled($image_p, $img, 0, 0, 0, 0, $adjust_width, $adjust_height, $new_width, $new_height);
	
		// output PNG object.
		imagePNG($image_p);
		imagedestroy($img);
		imagedestroy($image_p);
	}
}


$text = new textPNG;

if(isset($_GET['color']) && strlen($_GET['color'])==6){
	$red = hexdec(substr($_GET['color'],0,2));
	$grn = hexdec(substr($_GET['color'],2,2));
	$blu = hexdec(substr($_GET['color'],4,2));
}

if (isset($_GET['max_width'])) $text->max_width = $_GET['max_width']; // text to display
if (isset($_GET['max_height'])) $text->max_height = $_GET['max_height']; // text to display
if (isset($_GET['msg'])) $text->msg = $_GET['msg']; // text to display
if (isset($_GET['font-family'])) $text->font = 'fonts/'.$_GET['font-family'].'.ttf'; // font to use (include directory if needed).
if (isset($_GET['font-size'])) $text->size = $_GET['font-size']*2; // size in points
if (isset($_GET['stroke'])) $text->stroke = $_GET['stroke']; // size in points
if (isset($rot)) $text->rot = $rot; // rotation
if (isset($pad)) $text->pad = $pad; // padding in pixels around text.
if (isset($red)) $text->red = $red; // text color
if (isset($grn)) $text->grn = $grn; // ..
if (isset($blu)) $text->blu = $blu; // ..
if (isset($bg_red)) $text->bg_red = $bg_red; // background color.
if (isset($bg_grn)) $text->bg_grn = $bg_grn; // ..
if (isset($bg_blu)) $text->bg_blu = $bg_blu; // ..
if (isset($tr)) $text->transparent = $tr; // transparency flag (boolean).


$text->draw();