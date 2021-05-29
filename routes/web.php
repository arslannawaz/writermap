<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Book\StoryPlanController;
use App\Http\Controllers\Book\CharacterController;
use App\Http\Controllers\Book\NoteController;
use App\Http\Controllers\Book\Writing\ChaptersController;
use App\Http\Controllers\Book\StoryPlan\MilestoneController;
use App\Http\Controllers\Book\BreakdownController;
use App\Http\Controllers\Book\TimelineController;
use App\Http\Controllers\Book\Event\ItemController as EventItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('scriptorium');
});

Route::get('login/{driver}', [LoginController::class, 'redirectToProvider'])->name('social_login');
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/scriptorium', function () {
    return Inertia\Inertia::render('Dashboard', [
        'books' => Auth::user()->books()->orderBy('created_at', 'desc')->paginate(4),
    ]);
})->name('scriptorium');

//Route::get('books/{id}/print', function ($id) {
//    $book = \App\Models\Book::findOrFail($id);
//    return view('print', compact('book'));
//});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::post('send-feedback', function () {
        Mail::to('maxsprite.work@gmail.com')->send(new \App\Mail\FeedbackMail(request()->post('message')));
        return true;
    });

    Route::get('writers-room', function () {
        return inertia('WritersRoom');
    });

    Route::post('books', [BookController::class, 'index'])->name('books.index');
    Route::post('books/create', [BookController::class, 'create'])->name('books.create');

    Route::post('profile/add-card', [\App\Http\Controllers\ProfileController::class, 'addCard']);
    Route::get('profile/current-subscription', [\App\Http\Controllers\ProfileController::class, 'currentSubscription']);
    Route::get('profile/stripe/promocodes', [\App\Http\Controllers\ProfileController::class, 'promocodesList']);
    Route::post('profile/stripe/promocode/check', [\App\Http\Controllers\ProfileController::class, 'checkPromocode']);
    Route::post('profile/change-subscription', [\App\Http\Controllers\ProfileController::class, 'changeSubscription']);
    Route::post('profile/cancel-subscription', [\App\Http\Controllers\ProfileController::class, 'cancelSubscription']);
    Route::get('profile/invoices', [\App\Http\Controllers\ProfileController::class, 'invoices']);

    Route::get('books/{id}/pages', [BookController::class, 'pages'])->name('books.pages');
    Route::post('books/{id}/update', [BookController::class, 'update'])->name('books.update');
    Route::post('books/{book_id}/breakdowns/{breakdown_id}/update', [BreakdownController::class, 'update'])->name('breakdowns.update');
    Route::get('books/{id}/breakdown', [BookController::class, 'breakdown'])->name('books.breakdown');
    Route::get('books/{id}/breakdown/{type}', [BookController::class, 'breakdown'])->name('books.breakdown');

    Route::get('books/{book_id}/story-plan', [StoryPlanController::class, 'index'])->name('books.story-plan');
    Route::post('books/{book_id}/story-plan/update', [StoryPlanController::class, 'update'])->name('books.story_plan.update');
    Route::get('books/{book_id}/story-plan/milestones', [MilestoneController::class, 'index'])->name('books.story_plan.milestones');
    Route::get('books/{book_id}/story-plan/milestones/all', [MilestoneController::class, 'all'])->name('books.story_plan.milestones.all');
    Route::post('books/{book_id}/story-plan/milestone/create', [MilestoneController::class, 'create'])->name('books.milestone.create');
    Route::post('books/{book_id}/story-plan/milestone/update', [MilestoneController::class, 'update'])->name('books.milestones.update');
    Route::post('books/{book_id}/story-plan/milestone/delete', [MilestoneController::class, 'delete'])->name('books.milestones.delete');

    Route::get('books/{id}/characters', [CharacterController::class, 'index'])->name('books.characters');
    Route::any('books/{book_id}/characters/list', [CharacterController::class, 'list'])->name('books.characters.list');
    Route::get('books/{book_id}/characters/{character_id}/edit', [CharacterController::class, 'edit'])->name('books.characters.edit');
    Route::post('books/{book_id}/characters/{character_id}/attributes/update', [CharacterController::class, 'updateAttribute'])->name('books.characters.attributes.update');
    Route::get('books/{book_id}/characters/groups/list', [CharacterController::class, 'groupList'])->name('books.characters.list');
    Route::post('books/{book_id}/characters/create', [CharacterController::class, 'create'])->name('books.characters.create');
    Route::post('books/{book_id}/characters/{character_id}/update', [CharacterController::class, 'update'])->name('books.characters.update');
    Route::post('books/{book_id}/characters/{character_id}/delete', [CharacterController::class, 'delete'])->name('books.characters.delete');
    Route::post('books/{book_id}/characters/group/create', [CharacterController::class, 'createGroup'])->name('books.characters');


    Route::post('books/{book_id}/notes/create', [NoteController::class, 'create'])->name('books.notes.create');
    Route::post('books/{book_id}/notes/update', [NoteController::class, 'update'])->name('books.notes.update');
    Route::get('books/{book_id}/notes/{note_id}/edit', [NoteController::class, 'edit'])->name('books.notes.edit');
    Route::any('books/{book_id}/notes/group/{group}', [NoteController::class, 'index'])->name('books.notes.group');

    Route::post('books/{book_id}/chapters/create', [ChaptersController::class, 'create'])->name('books.chapters.create');
    Route::post('books/{book_id}/chapters/update', [ChaptersController::class, 'update'])->name('books.chapters.update');
    Route::get('books/{book_id}/chapters/{chapter_id}/edit', [ChaptersController::class, 'editPage'])->name('books.chapters.edit_page');
    Route::any('books/{book_id}/chapters', [ChaptersController::class, 'index'])->name('books.notes.index_page');

    Route::get('books/{book_id}/timeline', [TimelineController::class, 'indexPage'])->name('books.timeline');
    Route::post('books/{book_id}/timeline/search', [TimelineController::class, 'search'])->name('books.timeline.search');

    Route::get('books/{book_id}/timeline/events/list', [TimelineController::class, 'eventsList'])->name('books.events.list');
    Route::post('books/{book_id}/timeline/events/{event_id}/items/reorder', [EventItemController::class, 'reorder'])->name('books.events.items.reorder');
    Route::post('books/{book_id}/timeline/events/create', [TimelineController::class, 'createEvent'])->name('books.events.create');
    Route::post('books/{book_id}/timeline/events/{event_id}/update', [TimelineController::class, 'updateEvent'])->name('books.events.update');
    Route::post('books/{book_id}/timeline/events/{event_id}/delete', [TimelineController::class, 'deleteEvent'])->name('books.events.delete');
    Route::post('books/{book_id}/timeline/events/{event_id}/items/create', [EventItemController::class, 'create'])->name('books.events.items.create');
    Route::post('books/{book_id}/timeline/events/{event_id}/items/{event_item_id}/update', [EventItemController::class, 'update'])->name('books.events.items.update');
    Route::post('books/{book_id}/timeline/events/{event_id}/items/{event_item_id}/delete', [EventItemController::class, 'delete'])->name('books.events.items.delete');
});
