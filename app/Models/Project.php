<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'id',
        'name',
        'deadline',
        'description',
        'type',
        'status',
        'user_id',
        'banner_image',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
