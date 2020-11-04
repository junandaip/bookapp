<?php

namespace App\Http\Controllers;
use App\Models\Book;

class BooksController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function showId($id)
    {
        if ($id <= 2 and $id >= 1){
            $result = Book::find($id);
            return $result;
        }
        else {
            die("Book Not Found. Status Code: 404");
        }
    }
}