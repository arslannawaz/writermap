<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
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
        $book = Book::find($id);
        return inertia('Book/Pages', [
            'book_data' => $book,
            'first_chapter' => $book->chapters()->orderBy('created_at', 'asc')->first(),
        ]);
    }

    public function breakdown($id, $type = null)
    {
        $book = Book::find($id);

        $prevType = null;
        $nextType = null;
        if ($type !== null) {
            switch ($type) {
                case Breakdown::TYPE_CHARACTERS:
                    $prevType = Breakdown::TYPE_KEY_EVENTS;
                    $nextType = Breakdown::TYPE_SETTINGS;
                    break;
                case Breakdown::TYPE_SETTINGS:
                    $prevType = Breakdown::TYPE_CHARACTERS;
                    $nextType = Breakdown::TYPE_PROBLEM;
                    break;
                case Breakdown::TYPE_PROBLEM:
                    $prevType = Breakdown::TYPE_SETTINGS;
                    $nextType = Breakdown::TYPE_SOLUTION;
                    break;
                case Breakdown::TYPE_SOLUTION:
                    $prevType = Breakdown::TYPE_PROBLEM;
                    $nextType = Breakdown::TYPE_KEY_EVENTS;
                    break;
                case Breakdown::TYPE_KEY_EVENTS:
                    $prevType = Breakdown::TYPE_SOLUTION;
                    $nextType = Breakdown::TYPE_CHARACTERS;
                    break;
            }
        }

        return inertia('Book/Breakdown', [
            'book' => $book,
            'breakdown' => $book->breakdowns()->where(['type' => $type])->first(),
            'type' => $type,
            'prev_type' => $prevType,
            'next_type' => $nextType,
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
