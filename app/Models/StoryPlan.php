<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\StoryPlan
 *
 * @property int $id
 * @property int $book_id
 * @property string|null $objective
 * @property string|null $inspiration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan whereInspiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan whereObjective($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoryPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StoryPlan extends Model
{
    use HasFactory;

    protected $fillable = ['objective', 'inspiration', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
