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
}
