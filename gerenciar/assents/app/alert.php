<?php 

function alert($classe,$msg,$color,$textcolor){

	$cl = $classe;
	$m = $msg;
	$c = $color;
	$t = $textcolor;

	$hex = $color;


		echo '
<div class="alert alert-'.$cl.'">
  '.$m.'
</div>
<style type="text/css">
	.alert-'.$cl.'{
		font-size:12.9px;
		color: '.$t.';
		background-color: '.$c.';
	}
</style>';

}
?>