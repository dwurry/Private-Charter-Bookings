<?php
class ColorUtils extends CApplicationComponent{
	// Web-Safe Color Original Choice
	const BLUE = 'BLUE'; // #6699CC'; // '#588EBD'; 102, 153, 204
	const RED = 'RED'; // #CC6666'; // '#E35B5B'; 204, 102, 102
	const ORANGE = 'ORANGE'; // #33CC99'; // "#44B6AE'; 51, 204, 153
	const GREEN = 'GREEN'; // #44B6AE';
	const PURPLE = 'PURPLE'; // #8775A7';
	public static function BLUE_SET(){
		return array('name'=>ColorUtils::BLUE,'header'=>'#5599FF','odd'=>'#CCFFFF','even'=>'#ECFFFF');
	}
	public static function RED_SET(){
		return array('name'=>ColorUtils::RED,'header'=>'#DA6969','odd'=>'#FFECEC','even'=>'#FFFCFC');
	}
	public static function ORANGE_SET(){
		return array('name'=>ColorUtils::ORANGE,'header'=>'#FFCC00','odd'=>'#FFF3DA','even'=>'#FFE3CA');
	}
	public static function GREEN_SET(){
		return array('name'=>ColorUtils::GREEN,'header'=>'#44B6AE','odd'=>'#F2FAFA','even'=>'#D2FAF6');
	}
	public static function PURPLE_SET(){
		return array('name'=>ColorUtils::PURPLE,'header'=>'#8775A7','odd'=>'#C3BAD3','even'=>'#CFC8DC');
	}
}
?>