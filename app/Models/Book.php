<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * App\Models\Book
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string|null $cover_image_path
 * @property string $title
 * @property string|null $additional_title
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $site
 * @property string|null $copyright
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Breakdown[] $breakdowns
 * @property-read int|null $breakdowns_count
 * @property-read string $cover_image_url
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAdditionalTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCopyright($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCoverImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUserId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CharacterGroup[] $characterGroups
 * @property-read int|null $character_groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Character[] $characters
 * @property-read int|null $characters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Milestone[] $milestones
 * @property-read int|null $milestones_count
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'additional_name', 'contacts', 'copyright', 'cover_image_path'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'cover_image_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function breakdowns()
    {
        return $this->hasMany(Breakdown::class);
    }

    public function characterGroups()
    {
        return $this->hasMany(CharacterGroup::class);
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateCoverImage(UploadedFile $photo)
    {
        tap($this->cover_image_path, function ($previous) use ($photo) {
            $this->forceFill([
                'cover_image_path' => $photo->storePublicly(
                    'cover-images', ['disk' => $this->coverImageDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->coverImageDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteCoverImage()
    {
        Storage::disk($this->coverImageDisk())->delete($this->cover_image_path);

        $this->forceFill([
            'cover_image_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getCoverImageUrlAttribute()
    {
        return $this->cover_image_path
            ? Storage::disk($this->coverImageDisk())->url($this->cover_image_path)
            : $this->defaultCoverImageUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultCoverImageUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function coverImageDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }

    protected static function booted()
    {
        static::saved(function ($book) {
            $book->breakdowns()->saveMany([
                new Breakdown(['book_id' => $book->id, 'type' => Breakdown::TYPE_CHARACTERS]),
                new Breakdown(['book_id' => $book->id, 'type' => Breakdown::TYPE_SETTINGS]),
                new Breakdown(['book_id' => $book->id, 'type' => Breakdown::TYPE_PROBLEM]),
                new Breakdown(['book_id' => $book->id, 'type' => Breakdown::TYPE_SOLUTION]),
                new Breakdown(['book_id' => $book->id, 'type' => Breakdown::TYPE_KEY_EVENTS]),
            ]);
        });

        parent::booted(); // TODO: Change the autogenerated stub
    }
}
