<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Note
 *
 * @property-read \App\Models\Book $book
 * @method static \Illuminate\Database\Eloquent\Builder|Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $book_id
 * @property int $group
 * @property string $title
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUpdatedAt($value)
 */
class Note extends Model
{
    use HasFactory;

    const GROUP_GENERAL = 0;
    const GROUP_RESEARCH = 1;
    const GROUP_IDEAS = 2;

    protected $fillable = ['book_id', 'group', 'title', 'content'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public static function getGroupByString($key)
    {
        switch ($key) {
            case 'general':
                return static::GROUP_GENERAL;
                break;
            case 'research':
                return static::GROUP_RESEARCH;
                break;
            case 'ideas':
                return static::GROUP_IDEAS;
                break;
            default:
                return false;
                break;
        }
    }
}
