# BOOKAPP
**NAMA : JUNANDA ILHAM PRIHAMBODO**  
**NIM : 185150701111012**  
## BUILD ENVIRONMENT
[Lumen 8.x](https://lumen.laravel.com/docs/8.x#installation)  
[Composer](https://getcomposer.org/download/)  
[PHP 7.6](https://www.php.net/downloads.php)  
## Description  
Program ini berisi dua tabel yaitu Authors dan Books dengan perintah yang dapat dijalankan seperti:  
- GET  
  Berfungsi untuk menampilkan semua data pada tabel.
- GET by id  
  Berfungsi untuk menampilkan data pada tabel sesuai id yang diinputkan.
- POST  
  Berfungsi untuk menambahkan data baru pada tabel.
- PUT using id  
  Berfungsi untuk mengedit data yang sudah ada pada tabel sesuai id yang diinputkan.
- DELETE by id  
  Berfungsi untuk menghapus data pada tabel sesuai id yang diinputkan.  
## Code Explaination  
### Router  
Pada ~/routes/web.php terdapat salah satu syntax :  

`$router->get('authors/{id}', 'AuthorsController@showById');`  

Syntax tersebut berfungsi ketika user memasukkan alamat dengan parameter "authors/{id}" maka program akan memproses AuthorsController dengan fungsi showById  
### Model  
Pada ~/models/Authors.php terdapat syntax:

`protected $fillable = ['name', 'gender', 'biography'];`  

Syntax tersebut dipakai untuk menspesifikasikan kolom mana saja yang dapat digunakan untuk CRUD oleh user.  
### Controller  
Controller berfungsi untuk melakukan proses data yang diambil dari tabel dan dikirim untuk ditampilkan kepada user. Salah satu implementasinya adalah method:  

    public function showById($id)
    {
        $author = Authors::where('id', $id)->first();
        if ($author) {
            return response()->json([
                'message' => 'show authors by id',
                'data' => $author
            ], 201);
        } else {
            return response()->json([
                'message' => 'author not found',
            ], 404);
        }
    }

Method showById berfungsi untuk menampilkan data sesuai dengan $id inputan yang diberikan oleh user. Method ini akan mengecek apakah id inputan sesuai dengan id pada tabel. 
Ketika sesuai maka akan mengirim respon berupa data json yang didalamnya terdapat pesan "show authors by id", data tabel dan kode HTTP 201. 
Namun, ketika id inputan tidak sesuai maka akan mengirim respon json dengan pesan "author not found" dengan kode HTTP 404.

