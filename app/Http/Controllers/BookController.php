<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        return \Auth::user()->books()->orderBy('created_at', 'desc')->paginate(4);
    }

    public function create(Request $request)
    {
        $book = new Book;
        $book->user_id = \Auth::id();
        $book->name = $request->name;
        $book->save();

        return $book;
    }

    public function pages($id)
    {
        return inertia('Book/Pages', [
            'book' => Book::find($id),
        ]);
    }

    public function breakdown($id, $type = null)
    {
        return inertia('Book/Breakdown', [
            'book' => Book::find($id),
        ]);
    }
}
