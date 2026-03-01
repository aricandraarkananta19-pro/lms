<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'speaker', 'start_time', 'link'];
}
