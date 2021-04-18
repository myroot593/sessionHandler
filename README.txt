/*
 | Penulis : AHMAD ZAELANI
 | blog : root93
 | ____________________________________________________________________________
 | PENDAHULUAN
 |
 | Ketika mengimplementasikan sessionhandlerinterface pada 
 | session_set_save_handler(open, close, read, write, destroy, gc)
 | maka Anda perlu mendefinisikan 6 parameter diatas, jika tidak
 | maka akan terjadi sebuah kesalahan/error. Anda bisa menambahkan
 | method lain jika memang diperlukan. 6 paramter diatas mungkin tidak perlu di
 | definisikan jika Anda tidak mengimplementasikan SessionHandlerInterface
 | ____________________________________________________________________________
 | Pemahaman I
 |
 | Fungsi ini akan otomatis dijalankan ketika session_start dimulai
 | dengan mendefinisikan session_set_save_handler dan memanggil objectnya
 | ketika memulai menggunakan session start, maka otomatis akan menyimpan ke db
 | dan ketika $_SESSION belum didefinisikan maka string session_data akan kosong
 | ketika dibaca menggunakan oleh read, namun akan mengembalikan nilai true
 | jika session sudah didefinisikan, jadi handler akan menyimpan data 
 | namun dengan session data kosong ketika variabel $_SESSION belum didefinisikan
 | jadi secara implementasi Anda bisa mendefinisikan $_SESSION ketika login
 | berhasil, dan dapat melakukan validasi dengan memanggil fungsi read untuk
 | melakukan validasi, jika read mereturn data yang kosong, maka anda bisa
 | menjalankan true false disana.
 | ____________________________________________________________________________
 | Pemahaman II
 |
 | Seperti yang dijelaskan pada pemahaman pertama, ketika handler dipanggil
 | dan disimpan lalu kita mulai mendefinisikan dan menyimpan object pada handler
 | maka ketika session_start() dipanggil, dia akan menyimpan sebuah data pada
 | tabel yang sudah didefinisikan sebelumnya, dimana ini otomatis menggunakan 
 | fungsi write yang kita definisikan pada method yang berada dalam handler
 | tetapi sebenernya secara teknik tentu kita bisa melakukan write dengan
 | memanggil object handlernya, tetapi masalahnya session_start harus tetap didefinisikan
 | supaya bisa membaca session_id(), dan jika session_id() tidak ada maka tidak ada
 | yang bisa kita baca pada database, dan itu artinya session_start akan tetap didefinisikan
 | pada halaman - halaman yang membutuhkan proses authentifikasi, karena data  tidak
 | akan mengembalikan nilai apa - apa ketika dibaca, yang terpenting adalah nilai $_SESSION
 | tidak perlu didefinisikan jika proses login gagal.
 | Jadi melakukan write bisa saja dengan memanggil objectnya, tetapi session_start harus
 | didefinisikan, ketika berhasil login, Anda bisa memasukan fungsi write dan mendefinisikan
 | datanya, session_id, dan session_data
 |  ____________________________________________________________________________
 | Pemahaman III
 |
 | Ketika session_start() dimulai dan  session_id yang dibaca menggunakan fungsi read()
 | mengambalikan nilai string kosong dan dia akan tetap menyimpan sebuah session_id ke 
 | database, maka nantinya ketika proses login berhasil, nilai session_id akan direplace
 | pada fungsi write() sehingga session_id sebelumnya akan memiliki sebuah nilai string
 | yang bisa dikembalikan.
 | Pada query write sudah didefinisikan menggunakan perintah replace, untuk memastikan
 | bahwa tidak ada session_id ganda yang sama yang tersimpan pada tabel
 | ____________________________________________________________________________
 | Pemahaman IV
 | Pada kasus ini session_id akan menghasilkan nilai hash sama persesinya
 | tetapi dengan time dan token yang berbeda - beda setiap session_start
 | didefinisikan. Note (Token hanya tambahan)
 | ____________________________________________________________________________
 | Pemahaman V
 | Open
 | ____________________________________________________________________________
 
 | Pemahaman VI
 | GC
 | ____________________________________________________________________________
 | Kesimpulan
 | SessionHandlerInterface ini akan melakukan write secara otomatis ke db ketika
 | didefinisikan, sama halnya ketika menggunakan fungsi session_destroy, handler
 | akan melakukan penghapusan data session yang tersimpan pada db. 
 | selanjutnya proses pembacaan/validasi data dilakukan dengan menggunakan method read
 | dan ketika mengembalikan nilai string, maka session kita bisa mendefinsikan 
 | session data dengan variabel $_SESSION
 | ____________________________________________________________________________
 | Refrensi : 
 | https://www.php.net/manual/en/class.sessionhandler.php
 | https://www.php.net/manual/en/class.sessionhandlerinterface.php
 | https://www.php.net/manual/en/function.session-set-save-handler.php
  
 
*/
