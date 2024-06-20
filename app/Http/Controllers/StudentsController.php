<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function students_show(){
        $students = new Student();
        // dd($students->all());
        return view('students', ['list' => $students->all()]);

    }
}
