<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WritingController extends Controller
{
    public function __construct()
    {
        $book = Book::find(request('book_id'));
        Inertia::share('book', $book);
    }

    public function createChapter()
    {

    }
}
