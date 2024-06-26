<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\ClassModel; 


class TeacherController extends Controller
{
    public function show(){
        $teachers = Teacher::with('class')->get(); 
        $classes = ClassModel::all(); 

        return view('teachers', ['teachers' => $teachers, 'classes' => $classes]);
    }

    public function update(Request $request, $id){
    $request->validate([
        'class_id' => 'required|exists:classes,id'
    ]);

    $teacher = Teacher::findOrFail($id);
    $teacher->class_id = $request->class_id;
    $teacher->save();

    return redirect()->route('teachers')->with('success', 'Класс учителя успешно обновлен.');
}

}
