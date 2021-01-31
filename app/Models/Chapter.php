<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Chapter
 *
 * @property int $id
 * @property int $book_id
 * @property string $title
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $number
 * @method static \Illuminate\Database\Eloquent\Builder|Chapter whereNumber($value)
 */
class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'number', 'title', 'content'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
