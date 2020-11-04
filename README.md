# *BOOKAPP*
NAMA : JUNANDA ILHAM PRIHAMBODO

NIM  : 185150701111012

Program ini akan menampilkan data buku sesuai id yang dicantumkan.

Apabila Id tidak ditemukan maka program akan menampilkan status 404 dan pesan error.

    $router->get('/books/{id}', 'BooksController@showId');

Syntax ini berfungsi untuk mengambil parameter inputan user yang lalu diproses di dalam controller BooksController dengan fungsi showId.

    public function showId($id){
        if ($id <= 2 and $id >= 1){
            $result = Book::find($id);
            return $result;
        }
        else {
            die("Book Not Found. Status Code: 404");
        }
    }

Fungsi showId() bertujuan untuk menerima inputan dari user yang dikirim melalui router dan disimpan dalam parameter $id.
Parameter $id akan dicek apakah sesuai dengan daftar id yang terdapat dalam database, apabila cocok maka akan menampilkan data buku sesuai $id.
Namun, apabila $id tidak ditemukan dalam database maka akan mengeluarkan pesan error dan status 404.
