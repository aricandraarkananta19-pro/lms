<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'due_date'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            if (empty($task->slug)) {
                $task->slug = static::generateUniqueSlug($task->title);
            }
        });

        static::updating(function ($task) {
            if ($task->isDirty('title')) {
                $task->slug = static::generateUniqueSlug($task->title, $task->id);
            }
        });
    }

    /**
     * Generate a unique slug for the task.
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
