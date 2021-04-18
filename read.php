
<?php
/* Implementasi

	| Setelah proses login berhasil Anda bisa terlebih dahulu membaca session_id
	| Jika string mengembalikan nilai kosong, maka jalankan proses return true
	| dan false, tetapi jika ada, panggil parameter data session yang telah 
	| tersimpan sebelumnya, jika tidak ada, redirect ke halaman utama


*/

require_once(__DIR__.'/Auth.php');
$objSessionHandler = new MySQLSessionHandler();
session_set_save_handler($objSessionHandler, true);
session_start();
if(empty($objSessionHandler->read(session_id()))){
	header("location:index.php");
}


	$_SESSION['username']='root93';
	echo "Anda tervalidasi :)";


?>
