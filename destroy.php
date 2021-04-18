<?php
/* Implementasi

	| Pada saat session_destroy  didefinisikan maka
	| fungsi destroy dipanggil secara otomatis, dan ini sebenarnya secara otomatis
	| juga akan menghasilkan session id baru


*/

require_once(__DIR__.'/Auth.php');
$objSessionHandler = new MySQLSessionHandler();
session_set_save_handler($objSessionHandler, true);
session_start();
if(empty($objSessionHandler->read(session_id()))){
	die("Anda tidak diperkenankan mengakses halaman ini");
}else{


		
		if(session_destroy()):
			echo "Session Anda telah berakhir";
			session_write_close();
		else:
			echo "Gagal keluar dari sesi";
		endif;
}
		
		


?>

