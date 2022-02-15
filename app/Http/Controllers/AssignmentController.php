<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Models\Course_Material;
use App\Models\Assignment;
use App\Models\Assignment_Question;
use App\Models\Assignment_Submission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller {
    public function assignments_d($courseCode) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        $courseID = DB::table('courses')->where('Course_Code', '=', [$courseCode])->pluck('Course_ID');
        $assignDrafts = DB::select('select * from assignments where Course_ID = ? and Draft = ?', [$courseID->first(), 'yes']);

        return view('lecturer.assignments_drafts')->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts)->with('courseCode', $courseCode);
    }



    public function assignments($courseCode) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        $courseID = DB::table('courses')->where('Course_Code', '=', [$courseCode])->pluck('Course_ID');
        $assignments = DB::select('select * from assignments where Course_ID = ? and Draft = ?', [$courseID->first(), 'no']);

        return view('lecturer.assignments')->with('lecturerData', $lecturerData)->with('assignments', $assignments)->with('courseCode', $courseCode);
    }



    public function assignments_add1($courseCode) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        return view('lecturer.assignments_add1')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode);
    }



    public function assignments_add2_theory($courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        return view('lecturer.assignments_add2_theory')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }



    public function assignments_add2_essay($courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        return view('lecturer.assignments_add2_essay')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }



    public function assignments_add2_obj($courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        return view('lecturer.assignments_add2_obj')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }



    public function assignments_add2_subj($courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        return view('lecturer.assignments_add2_subj')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }




    public function submissions($courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        $submissions = DB::select('select * from assignment__submissions where Assignment_ID = ?', [$assignID]);
        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);

        return view('lecturer.submissions')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID)->with('assignment', $assignment)->with('submissions', $submissions);
    }

    public function grade_assignment($courseCode, $assignID, $submissionID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        $submissions = DB::select('select * from assignment__submissions where Assignment_ID = ?', [$assignID]);
        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $questions = DB::select('select * from question__answers where Submission_ID = ?', [$submissions[0]->id]);

        return view('lecturer.grade_assignment')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID)->with('assignment', $assignment)->with('submissions', $submissions)->with('questions', $questions);
    }
    







    function add1(Request $request, $courseCode) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        $courseID = DB::table('courses')->where('Course_Code', '=', [$courseCode])->pluck('Course_ID');

        // Validate requests
        $request->validate([
            'type' => 'required',
            'sd' => 'required'
        ]);

        $data = $request->all();
        $date = date("Y-m-d");

        $assignment = Assignment::create([
            "Course_ID" => $courseID->first(),
            "Assignment_Type" => $data["type"],
            "Date_Added" => $date,
            "Submission_Deadline" => $data['sd'],
            "Extended_Deadline" => $data['esd'],
            "Total_Mark" => $data["mark"],
            "Draft" => $data["draft"]
        ]);

        if (empty($assignment->id)) {
            return back()->with('fail', 'Something went wrong');
        } else {
            if ($data["type"] == 'Theory') {
                return redirect()->route('assignment_message')->with('success', 'step 1')->with('assignID', $assignment->id)->with('type', $data["type"])->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
            } else if ($data["type"] == 'Multiple Choice') {
                return redirect()->route('assignment_message')->with('success', 'step 1')->with('assignID', $assignment->id)->with('type', $data["type"])->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
            } else if ($data["type"] == 'Subjective') {
                return redirect()->route('assignment_message')->with('success', 'step 1')->with('assignID', $assignment->id)->with('type', $data["type"])->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
            } else if ($data["type"] == 'Essay') {
                return redirect()->route('assignment_message')->with('success', 'step 1')->with('assignID', $assignment->id)->with('type', $data["type"])->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
            }
        }
    }

    function add2_theory(Request $request, $courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        switch ($request->input('form-submit')) {
            case 'next':
                // Validate requests
                $request->validate([
                    'question' => 'required',
                ]);

                $data = $request->all();

                $question = Assignment_Question::create([
                    "Question_ID" => 'que/000',
                    "Assignment_ID" => $assignID,
                    "Question_Title" => $data["question"],
                ]);

                if (empty($question->id)) {
                    return back()->with('fail', 'Something went wrong');
                } else {
                    return view('lecturer.assignments_add2_theory')->with('success', 'Question successfully added to assignment')->with('assignID', $assignID)->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
                }
                break;
    
            case 'done':
                $courseID = DB::table('courses')->where('Course_Code', '=', [$courseCode])->pluck('Course_ID');
                $assignDrafts = DB::select('select * from assignments where Course_ID = ? and Draft = ?', [$courseID->first(), 'yes']);

                $data = $request->all();

                if (!empty($data['question'])) {
                    $question = Assignment_Question::create([
                        "Question_ID" => 'que/000',
                        "Assignment_ID" => $assignID,
                        "Question_Title" => $data["question"],
                    ]);

                    if (empty($question->id)) {
                        return back()->with('fail', 'Something went wrong');
                    } else {
                        return redirect()->route('assignment_message')->with('success', 'step 2')->with('courseCode', $courseCode)->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts);
                    }
                } else {
                    return redirect()->route('assignment_message')->with('success', 'step 2')->with('courseCode', $courseCode)->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts);
                }
                break;
        }
    }

    function add2_essay(Request $request, $courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        $courseID = DB::table('courses')->where('Course_Code', '=', [$courseCode])->pluck('Course_ID');
        $assignDrafts = DB::select('select * from assignments where Course_ID = ? and Draft = ?', [$courseID->first(), 'yes']);

        $data = $request->all();

        if (!empty($data['question'])) {
            $question = Assignment_Question::create([
                "Question_ID" => 'que/000',
                "Assignment_ID" => $assignID,
                "Question_Title" => $data["question"],
            ]);

            if (empty($question->id)) {
                return back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->route('assignment_message')->with('success', 'step 2')->with('courseCode', $courseCode)->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts);
            }
        } else {
            return redirect()->route('assignment_message')->with('success', 'step 2')->with('courseCode', $courseCode)->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts);
        }
    }

    function add2_obj(Request $request, $courseCode, $assignID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        switch ($request->input('form-submit')) {
            case 'next':
                // Validate requests
                $request->validate([
                    'question' => 'required',
                    'option_c' => 'required',
                    'option_2' => 'required',
                    'option_3' => 'required',
                    'option_4' => 'required',
                ]);

                $data = $request->all();

                $question = Assignment_Question::create([
                    "Question_ID" => 'que/000',
                    "Assignment_ID" => $assignID,
                    "Question_Title" => $data["question"],
                    "Option_Correct" => $data["option_c"],
                    "Option_2" => $data["option_2"],
                    "Option_3" => $data["option_3"],
                    "Option_4" => $data["option_4"],
                    "Option_5" => $data["option_5"]
                ]);

                if (empty($question->id)) {
                    return back()->with('fail', 'Something went wrong');
                } else {
                    return view('lecturer.assignments_add2_obj')->with('success', 'Question successfully added to assignment')->with('assignID', $assignID)->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
                }
                break;
    
            case 'done':
                $courseID = DB::table('courses')->where('Course_Code', '=', [$courseCode])->pluck('Course_ID');
                $assignDrafts = DB::select('select * from assignments where Course_ID = ? and Draft = ?', [$courseID->first(), 'yes']);

                $data = $request->all();

                if (!empty($data['question'])) {
                    $question = Assignment_Question::create([
                        "Question_ID" => 'que/000',
                        "Assignment_ID" => $assignID,
                        "Question_Title" => $data["question"],
                        "Option_Correct" => $data["option_c"],
                        "Option_2" => $data["option_2"],
                        "Option_3" => $data["option_3"],
                        "Option_4" => $data["option_4"],
                        "Option_5" => $data["option_5"]
                    ]);

                    if (empty($question->id)) {
                        return back()->with('fail', 'Something went wrong');
                    } else {
                        return redirect()->route('assignment_message')->with('success', 'step 2')->with('courseCode', $courseCode)->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts);
                    }
                } else {
                    return redirect()->route('assignment_message')->with('success', 'step 2')->with('courseCode', $courseCode)->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts);
                }
                break;
        }
    }

    function send_assignment($courseCode, $assignID, Request $request) {
        $data = $request->all();
        $assignment = Assignment::find($assignID);

        if (empty($assignment)) {
            $success = false;
            return back()->with('fail', 'Assignment could not be sent out');
        } else {
            $assignment['Draft'] = 'no';
            var_dump($assignment);
            $assignment->save();
            return back()->with('success', 'Assignment successfully sent out');
        }
    }

    function delete_assignment($courseCode, $assignID, Request $request) {
        $data = $request->all();
        $assignment = Assignment::find($assignID);

        if (empty($assignment)) {
            $success = false;
            return back()->with('fail', 'Assignment could not be deleted');
        } else {
            $assignment->delete();
            return back()->with('success', 'Assignment successfully deleted');
        }
    }

    function save_grade(Request $request, $courseCode, $assignTotal, $submissionID) {
        if (session()->has('LoggedLecturer')) {
            $lecturerData = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        $grades = $request->get('grade');
        $refined_grades = array();
        $total_Grade = 0;

        foreach ($grades as $key => $grade) {
            $refined_grades[] = (int)$grade;
        }

        for ($i=0; $i < count($refined_grades); $i++) { 
            $total_Grade = $total_Grade + $refined_grades[$i];
        }

        if ($total_Grade > (int)$assignTotal) {
            return back()->with('fail', 'Grade cannot be greater than total mark');
        } else {
            switch ($request->input('form-submit')) {
                case 'theory':
                    if (in_array(null, $grades)) {
                        return back()->with('fail', 'Assign all grades, please');
                    } else {
                        $submitted = Assignment_Submission::find($submissionID);

                        $submitted->Grade = $total_Grade;

                        $submitted->save();

                        return back()->with('success', 'Grade added successfully!');
                    }
                    break;
            }
        }
    }

    function download_essay($answerID) {
        $answer = DB::select('select * from question__answers where id = ?', [$answerID]);
        $answerFile = substr($answer[0]->Answer, 8);

        $infoPath = pathinfo($answerFile);
        $extension = $infoPath['extension'];

        $file = Storage::disk('public')->get($answerFile);
  
        return (new Response($file, 200))->header('Content-Type', 'application/pdf');
    }
}
