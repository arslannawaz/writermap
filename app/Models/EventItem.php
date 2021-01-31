<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EventItem
 *
 * @property int $id
 * @property int $event_id
 * @property string $title
 * @property string|null $description
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Event $event
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EventItem extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'title', 'description', 'order'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
