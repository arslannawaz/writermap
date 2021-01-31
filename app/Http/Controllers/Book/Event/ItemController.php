<?php

namespace App\Http\Controllers\Book\Event;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Event;
use App\Models\EventItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    /** @var Book|\Illuminate\Database\Eloquent\Model|null */
    private $book;

    /** @var Event */
    private $event;

    public function __construct()
    {
        $this->book = Book::find(request('book_id'));
        $this->event = Event::find(request('event_id'));

        Inertia::share('book', $this->book);
        Inertia::share('event', $this->event);
    }

    public function reorder()
    {
        foreach (\request('items') as $index => $item) {
            $eventItem = EventItem::find($item['id']);
            $eventItem->event_id = $this->event->id;
            $eventItem->order = $index;
            $eventItem->save();
        }

        return $this->event->items()->orderBy('order')->get();
    }

    public function create()
    {
        return EventItem::create([
            'event_id' => \request('event_id'),
            'title' => \request('title'),
            'description' => \request('description'),
        ]);
    }

    public function update()
    {
        $eventItem = EventItem::find(\request('event_item_id'));
        $eventItem->title = \request('title');
        $eventItem->description = \request('description');

        return $eventItem->save();
    }

    public function delete()
    {
        $eventItem = EventItem::find(\request('event_item_id'));
        return $eventItem->delete();
    }
}
