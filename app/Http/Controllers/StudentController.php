<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Student;
use App\Models\Assignment_Question;
use App\Models\Assignment_Submission;
use App\Models\Question_Answers;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class StudentController extends Controller {
    public function login() {
        return view('student.login');
    }



    public function library_cm() {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $enrollments = array();
        $enrollmentsID = DB::select('select * from enrollments where Student_ID = ?', [$studentData->Student_ID]);

        foreach ($enrollmentsID as $enrollmentID) {
            $id = $enrollmentID->Course_ID;

            $courseEnrolled = DB::table('courses')->where('Course_ID', '=', [$id])->pluck('Course_Code');
            $enrollments[] = $courseEnrolled;
        }

        $courseMaterials = DB::select('select * from course__materials');

        return view('student.library_materials')->with('studentData', $studentData)->with('courseMaterials', $courseMaterials)->with('enrollments', $enrollments)->with('enrollmentsID', $enrollmentsID);
    }

    public function library_rc() {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        return view('student.library_classes')->with('studentData', $studentData);
    }



    public function class() {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $students = DB::select('select * from students');
        $chats = DB::select('select * from chats');

        return view('student.class')->with('studentData', $studentData)->with('students', $students)->with('chats', $chats);
    }



    public function assignments_ps() {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $courses = DB::select('select * from enrollments where Student_ID = ?', [$studentData['Student_ID']]);
        $assignments = array();

        foreach ($courses as $property => $course) {
            $assignment = DB::select('select * from assignments where Course_ID = ? and Draft = ?', [$course->Course_ID, 'no']);
            $assignments[] = $assignment;
        }

        return view('student.assignments_pending')->with('studentData', $studentData)->with('assignments', $assignments);
    }

    public function theory_submit($courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $questions = DB::select('select * from assignment__questions where Assignment_ID = ?', [$assignID]);

        return view('student.submit_theory')->with('studentData', $studentData)->with('assignment', $assignment)->with('courseCode', $courseCode)->with('questions', $questions);
    }

    public function essay_submit($courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $questions = DB::select('select * from assignment__questions where Assignment_ID = ?', [$assignID]);

        return view('student.submit_essay')->with('studentData', $studentData)->with('assignment', $assignment)->with('courseCode', $courseCode)->with('questions', $questions);
    }

    public function obj_submit($courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $questions = DB::select('select * from assignment__questions where Assignment_ID = ?', [$assignID]);

        return view('student.submit_obj')->with('studentData', $studentData)->with('assignment', $assignment)->with('courseCode', $courseCode)->with('questions', $questions);
    }

    public function assignments_rs() {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $courses = DB::select('select * from enrollments where Student_ID = ?', [$studentData['Student_ID']]);
        $assignments = array();

        foreach ($courses as $property => $course) {
            $assignment = DB::select('select * from assignments where Course_ID = ? and Draft = ?', [$course->Course_ID, 'no']);
            $assignments[] = $assignment;
        }

        return view('student.assignments_submitted')->with('studentData', $studentData)->with('assignments', $assignments);
    }

    public function theory_view($courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $submission = DB::select('select * from assignment__submissions where Assignment_ID = ?', [$assignID]);
        $questions = DB::select('select * from question__answers where Submission_ID = ?', [$submission[0]->id]);

        return view('student.theory_view')->with('studentData', $studentData)->with('courseCode', $courseCode)->with('submission', $submission)->with('assignment', $assignment)->with('questions', $questions);
    }

    public function essay_view($courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $submission = DB::select('select * from assignment__submissions where Assignment_ID = ?', [$assignID]);
        $questions = DB::select('select * from question__answers where Submission_ID = ?', [$submission[0]->id]);

        return view('student.essay_view')->with('studentData', $studentData)->with('courseCode', $courseCode)->with('submission', $submission)->with('assignment', $assignment)->with('questions', $questions);
    }

    public function obj_view($courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $submission = DB::select('select * from assignment__submissions where Assignment_ID = ?', [$assignID]);
        $questions = DB::select('select * from assignment__questions where Assignment_ID = ?', [$assignID]);

        return view('student.obj_view')->with('studentData', $studentData)->with('courseCode', $courseCode)->with('submission', $submission)->with('assignment', $assignment)->with('questions', $questions);
    }



    public function notifications() {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        return view('student.notifications')->with('studentData', $studentData);
    }


    
    function check(Request $request) {
        // Validate requests
        $request->validate([
            'Student_ID' => 'required',
            'Password' => 'required'
        ]);

        //Validate successfullly
        $student = Student::where('Student_ID', '=', $request->Student_ID)->first();
        if ($student) {
            if (Hash::check($request->Password, $student->Password)) {
                $request->session()->put('LoggedStudent', $student->id);
                return redirect('student_profile');
            } else {
                return back()->with('fail', 'Invalid password');
            }
        } else {
            return back()->with('fail', 'No student found with this Matric Number');
        }
    }

    function student_profile() {
        if (session()->has('LoggedStudent')) {
            $student = Student::where('id', '=', session('LoggedStudent'))->first();
            $data = [
                'studentData' => $student
            ];
        }

        return view('student.home', $data);
    }

    function logout() {
        if (session()->has('LoggedStudent')) {
            session()->pull('LoggedStudent');
            return redirect('/student/login');
            return;
        }
    }

    public function download_material($materialPath) {
        $download = 'uploads/' . $materialPath;

        $infoPath = pathinfo($download);
        $extension = $infoPath['extension'];

        $file = Storage::disk('public')->get($download);
  
        return (new Response($file, 200))->header('Content-Type', 'application/pdf');
    }

    function save_theory(Request $request, $courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $data = $request->all();
        $answers = $request->get('answer');
        $ids = $request->get('id');
        $date = date("Y-m-d");
      
        if (!(in_array(null, $answers))) {
            $submitted = DB::select('select * from assignment__submissions where Assignment_ID = ? and Student_ID = ?', [$assignID, $studentData->Student_ID]);

            if (empty($submitted)) {
                $submission = Assignment_Submission::create([
                    "Assignment_ID" => $assignID,
                    "Student_ID" => $studentData->Student_ID,
                    "Date_Submitted" => $date,
                    "Grade" => ''
                ]);
    
                if ($submission->id) {
                    foreach ($answers as $key => $answer) {
                        $assignment = Question_Answers::create([
                            "Submission_ID" => $submission->id,
                            "Question_ID" => $ids[$key],
                            "Answer" => $answer
                        ]);
    
                        if (empty($assignment->id)) {
                            return back()->with('fail', 'Something went wrong');
                        }
                    }
                }

                return back()->with('success', 'Assignment submitted successfully!')->with('assignID', $assignID)->with('courseCode', $courseCode)->with('studentData', $studentData);
            } else {
                return back()->with('exists', 'You have submitted this assignment already.');
            }
        } else {
            return back()->with('answer', 'Please fill all the fields.');
        }
    }

    function save_essay(Request $request, $courseCode, $assignID) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        //dd($request);
        $date = date("Y-m-d");

        $request->validate([
            'answer' => 'required'
        ]);

        if($request->hasFile('answer')) {
            $file = $request->file('answer');
            $fileName = $file->getClientOriginalName();
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            if ($extension == 'pdf') {
                $file->storeAs('uploads', $fileName, 'public');

                $submitted = DB::select('select * from assignment__submissions where Assignment_ID = ? and Student_ID = ?', [$assignID, $studentData->Student_ID]);

                if (empty($submitted)) {
                    $submission = Assignment_Submission::create([
                        "Assignment_ID" => $assignID,
                        "Student_ID" => $studentData->Student_ID,
                        "Date_Submitted" => $date,
                        "Grade" => ''
                    ]);
        
                    if ($submission->id) {
                        $assignment = Question_Answers::create([
                            "Submission_ID" => $submission->id,
                            "Question_ID" => $request->get('id'),
                            "Answer" => '/storage/' . $filePath
                        ]);

                        if (empty($assignment->id)) {
                            return back()->with('fail', 'Something went wrong');
                        }
                    }

                    return back()->with('success', 'Assignment submitted successfully!')->with('assignID', $assignID)->with('courseCode', $courseCode)->with('studentData', $studentData);
                } else {
                    return back()->with('exists', 'You have submitted this assignment already.');
                }
            } else {
                return back()->with('fail', 'The file must be a PDF');
            }
        } else {
            return back()->with('answer', 'Please upload a file.');
        }
    }

    function save_obj(Request $request, $courseCode, $assignID, $studentData, $questions) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $num_of_questions = (int)$questions;
        $data = $request->all();
        $date = date("Y-m-d");
        $answers = array();
        $grade = 0;
        $assign_total = DB::table('assignments')->where('id', '=', [$assignID])->pluck('Total_Mark');

        for ($i=0; $i < $num_of_questions; $i++) { 
            $answer_str = 'answer';
            $number = $answer_str . ($i+1);

            $request->validate([
                $number => 'required'
            ]);
        }

        for ($i=0; $i < $num_of_questions; $i++) { 
            $answer_str = 'answer';
            $number = $answer_str . ($i+1);

            $answers[] = (int)$data[$number];
        }

        for ($i=0; $i < count($answers); $i++) { 
            $grade = $answers[$i] + $grade;
        }

        $refined_grade = ($assign_total->first() * $grade) / count($answers);
      
        $submitted = DB::select('select * from assignment__submissions where Assignment_ID = ? and Student_ID = ?', [$assignID, $studentData->Student_ID]);

        if (empty($submitted)) {
            $submission = Assignment_Submission::create([
                "Assignment_ID" => $assignID,
                "Student_ID" => $studentData->Student_ID,
                "Date_Submitted" => $date,
                "Grade" => $refined_grade
            ]);

            if ($submission->id) {
                return back()->with('success', 'Assignment submitted successfully!')->with('assignID', $assignID)->with('courseCode', $courseCode)->with('studentData', $studentData);
            } else {
                return back()->with('fail', 'Something went wrong');
            }
        } else {
            return back()->with('exists', 'You have submitted this assignment already.');
        }
    }

    function chat(Request $request) {
        if (session()->has('LoggedStudent')) {
            $studentData = Student::where('id', '=', session('LoggedStudent'))->first();
        }

        $data = $request->all();
        $date = date("Y-m-d");
        $time = date("h:i");

        if (!empty($data['message'])) {
            $chat = Chat::create([
                "Message" => $data['message'],
                "Sender" => $studentData->Student_ID,
                "Date" => $date,
                "Time" => $time
            ]);

            if ($chat->id) {
                return back()->with('success', 'Message sent!');
            } else {
                return back()->with('fail', 'Something went wrong');
            }
        } else {
            return back();
        }
    }
}