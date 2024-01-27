<?php 


if (!isset($_SESSION['account'])) {
	header('Location: '.$flow);
}else{
	$token_account = $_SESSION['account'];
	$sql_check = "SELECT * FROM `vortex-users` WHERE `users-token`='$token_account' && `users-status`='1'";
	$i_account = $connect->query($sql_check)->num_rows;
	if ($i_account > 0) {
		$c_account = $connect->query($sql_check);
		$info_account = $c_account->fetch_array();
	}else{
		session_unset();
		session_destroy();
		header('Location: '.$flow.'?notification=reaccount');
	}
}



?>