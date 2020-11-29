<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\CharacterGroup;

class CharacterController extends Controller
{
    public function index()
    {
        $book = Book::find(request('id'));
        return inertia('Book/Characters', [
            'book' => $book,
            'groups' => CharacterGroup::all(),
            'characters' => $book->characters(),
        ]);
    }

    public function list()
    {
        $characters = Book::find(request('book_id'))->characters();

        if (request()->has('group_id') && request('group_id') !== 'all') {
            $characters->where('group_id', request('group_id'));
        }

        if (request()->has('query') && empty(request('query')) === false) {
            $characters->where('name', 'like', '%'. request('query') . '%');
        }

        $characters->orderBy('created_at', 'desc');
        return $characters->paginate(8);
    }

    public function groupList()
    {
        return Book::find(request('book_id'))->characterGroups()->orderBy('created_at', 'desc')->get();
    }

    public function create()
    {
        $book = Book::findOrFail(request('book_id'));
        return $book->characters()->create([
            'name' => request('name'),
            'group_id' => request('group_id'),
        ]);
    }

    public function createGroup()
    {
        $book = Book::findOrFail(request('book_id'));
        return $book->characterGroups()->create(['title' => request('title')]);
    }
}
