<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Symfony\Component\Translation\Catalogue\AbstractOperation;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        return Books::all();
    }

    public function showById($id)
    {
        $book = Books::where('id', $id)->first();
        if ($book) {
            return $book;
        } else {
            return response()->json([
                'message' => 'Book not found',
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'author' => 'required'
        ]);

        $book = Books::create(
            $request->only(['title', 'description', 'author'])
        );

        return response()->json([
            'created' => true,
            'data' => $book
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $book = Books::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'book not found'
            ], 404);
        }

        $book->fill(
            $request->only(['title', 'description', 'author'])
        );
        $book->save();

        return response()->json([
            'updated' => true,
            'data' => $book
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $book = Books::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'book not found'
                ]
            ], 404);
        }

        $book->delete();

        return response()->json([
            'deleted' => true
        ], 200);
    }
    
}
