<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Book\BreakdownController;
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
    return redirect('dashboard');
});

Route::get('login/{driver}', [LoginController::class, 'redirectToProvider'])->name('social_login');
Route::get('login/{driver}/callback', [LoginController::class, 'handleProviderCallback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard', [
        'books' => Auth::user()->books()->orderBy('created_at', 'desc')->paginate(4),
    ]);
})->name('dashboard');


Route::post('books', [BookController::class, 'index'])->name('books.index');
Route::post('books/create', [BookController::class, 'create'])->name('books.create');



Route::get('books/{id}/pages', [BookController::class, 'pages'])->name('books.pages');
Route::post('books/{id}/update', [BookController::class, 'update'])->name('books.update');
Route::post('books/{book_id}/breakdowns/{breakdown_id}/update', [BreakdownController::class, 'update'])->name('breakdowns.update');
Route::get('books/{id}/breakdown', [BookController::class, 'breakdown'])->name('books.breakdown');
Route::get('books/{id}/breakdown/{type}', [BookController::class, 'breakdown'])->name('books.breakdown');

Route::get('books/{id}/story-plan', [BookController::class, 'storyPlan'])->name('books.story-plan');

Route::get('books/{id}/characters', [\App\Http\Controllers\Book\CharacterController::class, 'index'])->name('books.characters');
Route::any('books/{book_id}/characters/list', [\App\Http\Controllers\Book\CharacterController::class, 'list'])->name('books.characters.list');
Route::post('books/{book_id}/characters/create', [\App\Http\Controllers\Book\CharacterController::class, 'create'])->name('books.characters');
Route::post('books/{book_id}/characters/group/create', [\App\Http\Controllers\Book\CharacterController::class, 'createGroup'])->name('books.characters');
