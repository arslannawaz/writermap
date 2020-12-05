<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Milestone;
use App\Models\StoryPlan;
use Illuminate\Http\Request;

class StoryPlanController extends Controller
{

    public function index()
    {
        $book = Book::find(request('book_id'));
        return inertia('Book/StoryPlan', [
            'book' => $book,
            'storyPlan' => StoryPlan::firstOrCreate(['book_id' => request('book_id')]),
            'allMilestones' => $book->milestones()->orderBy('due_date', 'desc')->get(),
        ]);
    }

    public function update()
    {
        $storyPlan = StoryPlan::firstOrCreate([
           'book_id' => request('book_id'),
        ]);

        $field = request('field');

        $storyPlan->$field = request('value');
        return $storyPlan->save();
    }

    public function milestones()
    {
        return Book::find(request('book_id'))->milestones()->orderBy('due_date', 'asc')->paginate(3);
    }

    public function milestoneCreate()
    {
//        \Validator::make(request()->all(), [
//            'due_date' => ['required'],
//        ])->validateWithBag('milestone');

        return Milestone::create([
            'book_id' => request('book_id'),
            'due_date' => request('due_date'),
            'type' => request('type'),
            'title' => request('title'),
        ]);
    }

    public function milestoneUpdate()
    {
        $milestone = Milestone::findOrFail(request('milestone_id'));

        $field = request('field');
        $milestone->$field = request('value');

        return $milestone->save();
    }
}
