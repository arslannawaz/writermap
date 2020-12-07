<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Milestone;
use App\Models\StoryPlan;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
