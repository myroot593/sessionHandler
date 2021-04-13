<?php
require_once(__DIR__.'/Auth.php');
$objSessionHandler = new MySQLSessionHandler();
session_start();
if(!empty($objSessionHandler->read(session_id()))):
	echo "username Anda :".$objSessionHandler->read(session_id());
	echo "session sukses <a href=delete.php>Delete session</a>";
else:
	header("location:cek.php");
endif;

?>
