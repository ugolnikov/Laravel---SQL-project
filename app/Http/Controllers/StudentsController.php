<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Feedback;
use App\Models\ClassModel;
use App\Rules\UniqueStudent;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    public function students_show(){
        $students = Student::with('class')->orderBy('id')->get();
        $classes = ClassModel::all();

        return view('students', ['list' => $students, 'classes' => $classes]);
    }

    public function student_form(){
        $classes = ClassModel::all(); 
        return view('students-create', ['classes' => $classes]);
    }


    public function student_create(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'surname' => ['required', 'string', 'max:255'],
                'first_name' => ['required', 'string', 'max:255'],
                'patronymic' => ['required', 'string', 'max:255'],
                'birthdate' => ['required', 'date'],
                'class_id' => ['required', 'integer'],
                new UniqueStudent,
            ]);

            Student::create($validatedData);

            return redirect()->route('students');
        } catch (QueryException  $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { 
                $errorMessage = 'Ученик с такими ФИО и датой рождения уже существует.';
                return redirect()->back()->withErrors([$errorMessage]);
            }

            return redirect()->back()->withErrors(['Ошибка при добавлении студента.']);
        }
    }

    public function studentsByClass($class_id){
        $students = Student::with('class')->where('class_id', $class_id)->get();
        return response()->json($students);
    }


    public function destroy($id){

        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students')->with('success', 'Учащийся успешно удален');
    }


    public function feedback_send(Request $request){
        // dd($request);
        $valid = $request->validate([
            'email' => 'required|min:4|max:100',
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500'
        ]);

        $feedback = new Feedback();
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->message = $request->message;
        $feedback->save();

        return redirect()->route('feedback');
    }
}
