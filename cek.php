<?php

require_once(__DIR__.'/Auth.php');

$objSessionHandler = new MySQLSessionHandler();
session_start();
//session_regenerate_id(); 
// jika Anda menggunakan ini session_regenerate_id maka akan ada session baru untuk permintaan login, session sebelumnya akan tetap tersimpan

if(!empty($objSessionHandler->read(session_id()))):
	header("location:sukses.php");
endif;

if(isset($_POST['submit'])){

	$objSessionHandler->write(session_id(),$_SESSION['username']='root93');
	session_write_close();
	header("location:sukses.php");
}




?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Session Handler</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	<input type="submit" name="submit" value="login">
	

</form>
</body>
</html>
