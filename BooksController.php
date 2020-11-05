<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Symfony\Component\Translation\Catalogue\AbstractOperation;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function showId($id)
    {
        $book = Book::where('id', $id)->first();
        if ($book) {
            return $book;
        } else {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }
        // if ($id <= 2 and $id >= 1){
        //     $result = Book::find($id);
        //     return $result;
        // }
        // else {
        //     die("Book Not Found. Status Code: 404");
        // }
    }
}
