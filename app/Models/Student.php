<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'surname',
        'first_name',
        'patronymic',
        'birthdate',
        'class_id',
    ];
    public function class(){
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
