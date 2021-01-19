<?php

namespace App\Http\Controllers\Book\Writing;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChaptersController extends Controller
{
    /** @var Book|\Illuminate\Database\Eloquent\Model|null */
    private $book;

    public function __construct()
    {
        $this->book = Book::find(request('book_id'));
        Inertia::share('book', $this->book);
    }

    public function index()
    {
        $chapter = $this->book->chapters()->orderBy('created_at', 'desc')->first();

        if ($chapter === null) {
            return \inertia('Book/Writing', [
                'chapter' => null,
            ]);
        }

        return redirect()->route('books.chapters.edit_page', [
            'book_id' => $this->book->id,
            'chapter_id' => $chapter,
        ]);
    }

    public function create()
    {
        $chapter = $this->book->chapters()->create([
            'title' => \request('title')
        ]);

        return $chapter;
    }

    public function update()
    {
        $chapter = Chapter::find(request('id'));

        $field = \request('field');
        $chapter->$field = \request('value');

        return $chapter->save();
    }

    public function editPage()
    {
        $chapter = $this->book->notes()->where('id', \request('chapter_id'))->first();

        return inertia('Book/Notes', [
            'book' => $this->book,
            'chapter' => $chapter,
        ]);
    }
}
