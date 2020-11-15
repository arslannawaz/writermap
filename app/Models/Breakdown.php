<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Breakdown
 *
 * @property int $id
 * @property int $book_id
 * @property string $type
 * @property string|null $content
 * @property string|null $key_points
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown query()
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown whereKeyPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Breakdown whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Breakdown extends Model
{
    use HasFactory;

    const TYPE_CHARACTERS = 'characters';
    const TYPE_SETTINGS = 'settings';
    const TYPE_PROBLEM = 'problem';
    const TYPE_SOLUTION = 'solution';
    const TYPE_KEY_EVENTS = 'key-events';

    protected $fillable = ['type', 'content', 'key_points'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
