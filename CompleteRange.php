<?php

class CompleteRange {
	
	public function build($param){
		$parametro = array();
		$parametro = $param ;
		$parametroN = array();
		$fin=count($parametro)-1;
		$parametroN = range($parametro[0], $parametro[$fin]);
		$result=implode(',',$parametroN) ;
		return  $result;
	}

}
$obj = new CompleteRange ();
echo $obj->build( [55, 58, 60]);
	?>