<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Character;
use App\Models\CharacterAttribute;
use App\Models\CharacterGroup;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

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
            'type' => request('type'),
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'name' => request('first_name') . ' ' . request('last_name'),
            'group_id' => request('group_id'),
        ]);
    }

    public function delete()
    {
        $book = Book::findOrFail(request('book_id'));
        return $book->characters()->where('id', request('character_id'))->delete();
    }

    public function edit()
    {
        $character = Character::findOrFail(request('character_id'));
        return inertia('Book/Characters/Edit', [
            'book' => Book::findOrFail(request('book_id')),
            'character' => $character,
            'prop_attributes' => $character->attributes,
        ]);
    }

    public function update()
    {
        $characterAttribute = CharacterAttribute::findOrFail([
            'type' => request('type'),
            'field' => request('field'),
        ]);

        return $characterAttribute;
    }

    public function uploadAttributeImage(CharacterAttribute $model, UploadedFile $file)
    {
        tap($model->value, function ($previous) use ($model, $file) {
            $model->forceFill([
                'value' => $file->storePublicly(
                    'character-attributes', ['disk' => 'public']
                ),
            ])->save();

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }

    public function updateAttribute()
    {
        $characterAttribute = CharacterAttribute::firstOrCreate([
            'book_id' => request('book_id'),
            'character_id' => request('character_id'),
            'group' => request('group'),
            'field' => request('field'),
        ]);

        if (request()->has('value')) {
            if ($characterAttribute->field === 'image') {
                /** @var UploadedFile $file */
                $file = request('value');
                $this->uploadAttributeImage($characterAttribute, $file);
            } else {
                $characterAttribute->value = request('value');
            }
        }

        if (request()->has('description')) {
            $characterAttribute->description = request('description');
        }

        if (request()->has('extra')) {
            $characterAttribute->extra = request('extra');
        }

        $characterAttribute->save();

        return $characterAttribute;
    }

    public function createGroup()
    {
        $book = Book::findOrFail(request('book_id'));
        return $book->characterGroups()->create(['title' => request('title')]);
    }
}
