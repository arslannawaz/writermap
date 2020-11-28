<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharacterGroup
 *
 * @property int $id
 * @property int $book_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Character[] $characters
 * @property-read int|null $characters_count
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CharacterGroup extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
