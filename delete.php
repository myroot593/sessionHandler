
<?php
require_once(__DIR__.'/Auth.php');

$objSessionHandler = new MySQLSessionHandler();
session_start();
if(!empty($objSessionHandler->read(session_id()))):

	if($objSessionHandler->destroy(session_id())):
		echo "sesion berhasil dihapus <a href=cek.php>Buat Lagi</a>";
		session_destroy();
		
	else:
		echo "session gagal dihapus";
	endif;
else:
	echo "Tidak ada sessi yang ditemukan";
endif;

?>
