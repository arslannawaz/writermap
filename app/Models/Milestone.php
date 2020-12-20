<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Milestone
 *
 * @property int $id
 * @property int $book_id
 * @property integer $status
 * @property string $due_date
 * @property string $type
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone query()
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Milestone whereStatus($value)
 */
class Milestone extends Model
{
    use HasFactory;

    const STATUS_IN_PROGRESS = 0;
    const STATUS_COMPLETED = 1;
    const STATUS_TO_PLAN = 2;
    const STATUS_TODO = 3;
    const STATUS_ON_HOLD = 4;

    protected $fillable = ['type', 'title', 'due_date', 'book_id', 'status'];

    protected $attributes = [
        'status' => self::STATUS_IN_PROGRESS,
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
