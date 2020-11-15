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
        $book->title = $request->title;
        $book->save();

        return $book;
    }

    public function pages($id)
    {
        return inertia('Book/Pages', [
            'book_data' => Book::find($id),
        ]);
    }

    public function breakdown($id, $type = null)
    {
        $book = Book::find($id);
        return inertia('Book/Breakdown', [
            'book' => $book,
            'breakdown' => $book->breakdowns()->where(['type' => $type])->first(),
            'type' => $type,
        ]);
    }

    public function update($id)
    {
        /** @var Book $book */
        $book = Book::find($id);

        if (request('image')) {
            $book->updateCoverImage(request('image'));
        } else {
            $field = request('field');
            $book->$field = request('value');
            $book->save();
        }

        return $book;
    }
}
