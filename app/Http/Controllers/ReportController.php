<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reports(){
        $youngest = Student::whereHas('class', function ($query) {
                $query->whereBetween('class_id', [1, 3]); 
            })
            ->orderBy('birthdate', 'asc') 
            ->first(); 


        $sum = Student::whereHas('class', function ($query) {
                $query->whereBetween('class_id', [5, 8]); 
            })
            ->count();

            
        $teachers = Teacher::all();

        $data = [];
        foreach ($teachers as $teacher) {
            $studentCount = DB::table('students')
                                ->where('class_id', $teacher->class_id)
                                ->count();

            $data[] = [
                'teacher' => $teacher->surname . ' ' . $teacher->first_name . ' ' . $teacher->patronymic,
                'student_count' => $studentCount,
            ];
        }

        return view('reports', ['youngest' => $youngest, 'sum' => $sum, 'data' => $data]);
    }
}
