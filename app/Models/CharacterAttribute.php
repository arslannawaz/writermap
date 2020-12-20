<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharacterAttribute
 *
 * @property int $id
 * @property int $book_id
 * @property int $character_id
 * @property string|null $type
 * @property string $field
 * @property string|null $value
 * @property string|null $description
 * @property mixed|null $extra
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Book $book
 * @property-read \App\Models\Character $character
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterAttribute whereValue($value)
 * @mixin \Eloquent
 */
class CharacterAttribute extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'character_id', 'group', 'field', 'value', 'description', 'extra'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}
