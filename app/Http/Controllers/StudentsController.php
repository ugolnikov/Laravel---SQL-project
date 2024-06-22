<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Feedback;

class StudentsController extends Controller
{
    public function students_show(){
        $students = new Student();
        // dd($students->all());
        return view('students', ['list' => $students->all()]);

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
