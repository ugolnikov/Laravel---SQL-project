<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'surname',
        'first_name',
        'patronymic',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
