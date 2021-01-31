<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TimelineController extends Controller
{
    /** @var Book|\Illuminate\Database\Eloquent\Model|null */
    private $book;

    public function __construct()
    {
        $this->book = Book::find(request('book_id'));
        Inertia::share('book', $this->book);
    }

    public function indexPage()
    {
        return inertia('Book/Timeline');
    }

    public function eventsList()
    {
        return $this->book->events()->with('items', function ($query) {
            $query->orderBy('order');
        })->get();
    }
}
