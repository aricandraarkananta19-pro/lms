<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'time_limit'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($quiz) {
            if (empty($quiz->slug)) {
                $quiz->slug = static::generateUniqueSlug($quiz->title);
            }
        });

        static::updating(function ($quiz) {
            if ($quiz->isDirty('title')) {
                $quiz->slug = static::generateUniqueSlug($quiz->title, $quiz->id);
            }
        });
    }

    /**
     * Generate a unique slug for the quiz.
     */
    public static function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = \Illuminate\Support\Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }
}
