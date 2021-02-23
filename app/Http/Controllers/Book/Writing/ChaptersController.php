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
        $chapters = $this->book->chapters()->orderBy('created_at', 'asc')->get();
        $chapter = $this->book->chapters()->orderBy('created_at', 'desc')->first();

        Inertia::share('chapters', $chapters);

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
        $chaptersCount = $this->book->chapters()->count();
        $chapter = $this->book->chapters()->create([
            'number' => $chaptersCount + 1,
            'title' => \request('title'),
        ]);

        return $chapter;
    }

    public function update()
    {
        $chapter = Chapter::find(request('id'));

        $field = \request('field');

        if (\request('field') === 'number') {
            $prevChapter = Chapter::where('book_id', \request('book_id'))
                ->where('number', \request('value'))
                ->first();

            if ($prevChapter !== null) {
                $prevChapter->number = $chapter->number;
                $prevChapter->save();
            }
        }

        $chapter->$field = \request('value');

        return $chapter->save();
    }

    public function editPage()
    {
        $chapters = $this->book->chapters()->orderBy('number', 'asc')->get();
        $chapter = $this->book->chapters()->where('id', \request('chapter_id'))->first();

        Inertia::share('chapters', $chapters);
        Inertia::share('page_chapter', $chapter);

        return inertia('Book/Writing', [
            'book' => $this->book,
            'chapter' => $chapter,
        ]);
    }
}
