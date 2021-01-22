<?php

namespace App\Http\Controllers\Book\StoryPlan;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Milestone;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MilestoneController extends Controller
{
    public function index()
    {
        return Book::find(request('book_id'))->milestones()
            ->orderByRaw('FIELD(status, "'. Milestone::STATUS_COMPLETED .'", "'. Milestone::STATUS_ON_HOLD .'",
            "'. Milestone::STATUS_IN_PROGRESS .'", "'. Milestone::STATUS_TODO .'", "'. Milestone::STATUS_TO_PLAN .'") DESC')
            ->orderBy('due_date', 'asc')
            ->paginate(3);
    }

    public function all()
    {
        return Book::find(request('book_id'))->milestones()
            ->orderBy('due_date', 'asc')
            ->get();
    }

    public function create()
    {
//        \Validator::make(request()->all(), [
//            'due_date' => ['required'],
//        ])->validateWithBag('milestone');

        $book = Book::find(request('book_id'));
        Inertia::share('allMilestones', $book->milestones()->orderBy('due_date', 'desc')->get());

        return Milestone::create([
            'book_id' => request('book_id'),
            'due_date' => request('due_date'),
            'type' => request('type'),
            'title' => request('title'),
        ]);
    }

    public function update()
    {
        $milestone = Milestone::findOrFail(request('id'));

        $milestone->due_date = request('due_date');
        $milestone->status = request('status');

        return $milestone->save();
    }

    public function delete()
    {
        $milestone = Milestone::findOrFail(request('id'));
        return $milestone->delete();
    }
}
