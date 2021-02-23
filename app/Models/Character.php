<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character
 *
 * @property int $id
 * @property int $book_id
 * @property int|null $group_id
 * @property int|null $type
 * @property string $name
 * @property string $first_name
 * @property string $last_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CharacterGroup|null $group
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereBookId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CharacterAttribute[] $attributes
 * @property-read int|null $attributes_count
 * @property-read mixed $type_title
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereType($value)
 */
class Character extends Model
{
    use HasFactory;

    const TYPE_MAIN = 0;
    const TYPE_SUPPORTING = 1;
    const TYPE_ANTAGONIST = 2;
    const TYPE_PROTAGONIST = 3;

    protected $fillable = ['type','name', 'first_name', 'last_name', 'group_id'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'type_title',
        'avatar_image_path',
    ];

    public function group()
    {
        return $this->belongsTo(CharacterGroup::class);
    }

    public function attributes()
    {
        return $this->hasMany(CharacterAttribute::class);
    }

    public function getAvatarImagePathAttribute()
    {
        /** @var CharacterAttribute $image */
        $image = $this->attributes()->where('group', 'physicality')
            ->where('field', 'image')
            ->first();

        if ($image !== null) {
            return '/storage/' . $image->value;
        }

        return '/storage/undefined-oval.png';
    }

    public function getTypeTitleAttribute()
    {
        switch ($this->type) {
            case self::TYPE_MAIN:
                return 'Main Character';
            case self::TYPE_SUPPORTING:
                return 'Supporting Character';
            case self::TYPE_ANTAGONIST:
                return 'Antagonist';
            case self::TYPE_PROTAGONIST:
                return 'Protagonist';
            default:
                return 'None';
        }
    }
}
