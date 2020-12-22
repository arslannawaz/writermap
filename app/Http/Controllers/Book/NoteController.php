<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoteController extends Controller
{
    public function index()
    {
        $book = Book::find(request('book_id'));
        $notes = $book->notes()->where('group', Note::getGroupByString(request('group')))->orderBy('created_at', 'desc')->get();
        $note = null;

        Inertia::share('book', $book);
        Inertia::share('notes', $notes);
        Inertia::share('note_group', \request('group'));

        foreach ($notes as $item) {
            $note = $item;
            break;
        }

        return inertia('Book/Notes', [
            'book' => $book,
            'notes' => $notes,
            'note' => $note,
        ]);
    }

    public function edit()
    {
        $book = Book::find(request('book_id'));
        $note = $book->notes()->where('id', \request('note_id'))->first();
        $notes = $book->notes()->where('group', $note->group)->orderBy('created_at', 'desc')->get();

        Inertia::share('book', $book);
        Inertia::share('note', $note);
        Inertia::share('notes', $notes);
        Inertia::share('note_group', \request('group'));

        return inertia('Book/Notes', [
            'book' => $book,
            'notes' => $notes,
            'note' => $note,
        ]);
    }

    public function update()
    {
        $note = Note::find(request('id'));

        $field = \request('field');
        $note->$field = \request('value');

        return $note->save();
    }

    public function create()
    {
        $book = Book::find(request('book_id'));
        $note = $book->notes()->create([
            'group' => Note::getGroupByString(\request('group')),
            'title' => \request('title')
        ]);

        return $note;
    }
}
