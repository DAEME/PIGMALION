<?php

class ClearPar  {
	public function build($cadena){
		$result=$cadena ;
		$find="()";
		$pos = str_replace($find,"1",$result);
		$num= mb_substr_count($pos , "1");
		
		$cadenaNueva="";
		for($i=0;$i<$num;$i++){
			$cadenaNueva=$cadenaNueva."()";
		}
		return  $cadenaNueva;
	}
}

$obj = new ClearPar  ();
echo $obj->build(")()()()(");

	?>