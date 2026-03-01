<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory, InteractsWithMedia;

    const CATEGORIES = [
        'service-excellence' => 'Service Excellence',
        'administrasi-keuangan' => 'Administrasi Keuangan',
        'administrasi-perkantoran' => 'Administrasi Perkantoran',
        'aplikasi-perkantoran' => 'Aplikasi Perkantoran',
        'hr-sdm' => 'Staff HR / SDM',
        'pelayanan-pelanggan' => 'Pelayanan Pelanggan',
    ];

    const LEVELS = [
        'beginner' => 'Beginner',
        'intermediate' => 'Intermediate',
        'advanced' => 'Advanced',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'category',
        'level',
        'duration_hours',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = static::generateUniqueSlug($model->title);
        });

        static::updating(function ($model) {
            if ($model->isDirty('title')) {
                $model->slug = static::generateUniqueSlug($model->title);
            }
        });
    }

    protected static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class)->withPivot('enrolled_at')->withTimestamps();
    }
}
