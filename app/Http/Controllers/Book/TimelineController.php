<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Event;
use App\Models\EventItem;
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

    public function createEvent()
    {
        return $this->book->events()->create([
            'title' => \request('title'),
            'description' => \request('description'),
        ]);
    }

    public function updateEvent()
    {
        $event = Event::find(\request('event_id'));
        $event->title = \request('title');
        $event->description = \request('description');

        return $event->save();
    }

    public function deleteEvent()
    {
        $event = Event::find(\request('event_id'));
        return $event->delete();
    }

    public function search()
    {
        return $this->book->events()->with('items', function ($query) {
            $query
                ->where('title', 'like', '%'.\request('query').'%')
                ->orderBy('order');
        })->get();
    }
}
