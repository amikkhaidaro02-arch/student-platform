<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'code',
        'image_path',
        'teacher_id',
    ];

    /**
     * Преподаватель, создавший курс.
     */
    public function teacher()
    {
        return $table = $this->belongsTo(User::class, 'teacher_id');
    }
}
