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
    public function getLecturerInfo() {
        if (session()->has('LoggedLecturer')) {
            $data = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        return $data;
    }

    public function assignments_d($courseCode) {
        $lecturerData = $this->getLecturerInfo();

        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
        $assignDrafts = DB::select("select * from assignments where courseid = ? and draft = ?", [$courseID->first(), 'yes']);

        return view('lecturer.assignments_drafts')->with('lecturerData', $lecturerData)->with('assignDrafts', $assignDrafts)->with('courseCode', $courseCode);
    }



    public function assignments($courseCode) {
        $lecturerData = $this->getLecturerInfo();

        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
        $assignments = DB::select("select * from assignments where courseid = ? and draft = ?", [$courseID->first(), 'no']);

        return view('lecturer.assignments')->with('lecturerData', $lecturerData)->with('assignments', $assignments)->with('courseCode', $courseCode);
    }



    public function assignments_add1($courseCode) {
        $lecturerData = $this->getLecturerInfo();

        return view('lecturer.assignments_add1')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode);
    }



    public function assignments_add2_theory($courseCode, $assignID) {
        $lecturerData = $this->getLecturerInfo();

        return view('lecturer.assignments_add2_theory')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }



    public function assignments_add2_essay($courseCode, $assignID) {
        $lecturerData = $this->getLecturerInfo();

        return view('lecturer.assignments_add2_essay')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }



    public function assignments_add2_obj($courseCode, $assignID) {
        $lecturerData = $this->getLecturerInfo();

        return view('lecturer.assignments_add2_obj')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }



    public function assignments_add2_subj($courseCode, $assignID) {
        $lecturerData = $this->getLecturerInfo();

        return view('lecturer.assignments_add2_subj')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID);
    }



    public function submissions($courseCode, $assignID) {
        $lecturerData = $this->getLecturerInfo();

        $submissions = DB::select("select * from assignment__submissions where assignmentid = ?", [$assignID]);
        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);

        return view('lecturer.submissions')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID)->with('assignment', $assignment)->with('submissions', $submissions);
    }

    public function grade_assignment($courseCode, $assignID, $submissionID) {
        $lecturerData = $this->getLecturerInfo();

        $submissions = DB::select("select * from assignment__submissions where assignmentid = ?", [$assignID]);
        $assignment = DB::select('select * from assignments where id = ?', [$assignID]);
        $questions = DB::select("select * from question__answers where submissionid = ?", [$submissions[0]->id]);

        return view('lecturer.grade_assignment')->with('lecturerData', $lecturerData)->with('courseCode', $courseCode)->with('assignID', $assignID)->with('assignment', $assignment)->with('submissions', $submissions)->with('questions', $questions);
    }
    


    function add1(Request $request, $courseCode) {
        $lecturerData = $this->getLecturerInfo();

        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');

        // Validate requests
        $request->validate([
            'type' => 'required',
            'sd' => 'required'
        ]);

        $data = $request->all();
        $date = date("Y-m-d");

        $assignment = Assignment::create([
            "courseid" => $courseID->first(),
            "assignmenttype" => $data["type"],
            "dateadded" => $date,
            "submissiondeadline" => $data['sd'],
            "extendeddeadline" => $data['esd'],
            "totalmark" => $data["mark"],
            "draft" => $data["draft"]
        ]);

        if (empty($assignment->id)) {
            return back()->with('fail', 'Something went wrong');
        } else {
            return redirect()->route('assignment_message')->with('success', 'step 1')->with('assignID', $assignment->id)->with('type', $data["type"])->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
        }
    }

    function add2_theory(Request $request, $courseCode, $assignID) {
        $lecturerData = $this->getLecturerInfo();

        switch ($request->input('form-submit')) {
            case 'next':
                // Validate requests
                $request->validate([
                    'question' => 'required',
                ]);

                $data = $request->all();

                $question = Assignment_Question::create([
                    "questionid" => 'que/000',
                    "assignmentid" => $assignID,
                    "questiontitle" => $data["question"],
                ]);

                if (empty($question->id)) {
                    return back()->with('fail', 'Something went wrong');
                } else {
                    return view('lecturer.assignments_add2_theory')->with('success', 'Question successfully added to assignment')->with('assignID', $assignID)->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
                }
                break;
    
            case 'done':
                $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
                $assignDrafts = DB::select("select * from assignments where courseid = ? and draft = ?", [$courseID->first(), 'yes']);

                $data = $request->all();

                if (!empty($data['question'])) {
                    $question = Assignment_Question::create([
                        "questionid" => 'que/000',
                        "assignmentid" => $assignID,
                        "questiontitle" => $data["question"],
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
        $lecturerData = $this->getLecturerInfo();

        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
        $assignDrafts = DB::select("select * from assignments where courseid = ? and draft = ?", [$courseID->first(), 'yes']);

        $data = $request->all();

        if (!empty($data['question'])) {
            $question = Assignment_Question::create([
                "questionid" => 'que/000',
                "assignmentid" => $assignID,
                "questiontitle" => $data["question"],
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
        $lecturerData = $this->getLecturerInfo();

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
                    "questionid" => 'que/000',
                    "assignmentid" => $assignID,
                    "questiontitle" => $data["question"],
                    "optioncorrect" => $data["option_c"],
                    "option2" => $data["option_2"],
                    "option3" => $data["option_3"],
                    "option4" => $data["option_4"],
                    "option5" => $data["option_5"]
                ]);

                if (empty($question->id)) {
                    return back()->with('fail', 'Something went wrong');
                } else {
                    return view('lecturer.assignments_add2_obj')->with('success', 'Question successfully added to assignment')->with('assignID', $assignID)->with('courseCode', $courseCode)->with('lecturerData', $lecturerData);
                }
                break;
    
            case 'done':
                $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
                $assignDrafts = DB::select("select * from assignments where courseid = ? and draft = ?", [$courseID->first(), 'yes']);

                $data = $request->all();

                if (!empty($data['question'])) {
                    $question = Assignment_Question::create([
                        "questionid" => 'que/000',
                        "assignmentid" => $assignid,
                        "questiontitle" => $data["question"],
                        "optioncorrect" => $data["option_c"],
                        "option2" => $data["option_2"],
                        "option3" => $data["option_3"],
                        "option4" => $data["option_4"],
                        "option5" => $data["option_5"]
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

    function save_grade(Request $request, $courseCode, $assignTotal, $submissionID) {
        $lecturerData = $this->getLecturerInfo();

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

                        $submitted->grade = $total_Grade;

                        $submitted->save();

                        return back()->with('success', 'Grade added successfully!');
                    }
                    break;
            }
        }
    }

    

    function send_assignment($courseCode, $assignID, Request $request) {
        $data = $request->all();
        $assignment = Assignment::find($assignID);

        if (empty($assignment)) {
            $success = false;
            return back()->with('fail', 'Assignment could not be sent out');
        } else {
            $assignment['draft'] = 'no';
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

    function download_essay($answerID) {
        $answer = DB::select('select * from question__answers where id = ?', [$answerID]);
        $answerFile = substr($answer[0]->answer, 8);

        $infoPath = pathinfo($answerFile);
        $extension = $infoPath['extension'];

        $file = Storage::disk('public')->get($answerFile);
  
        return (new Response($file, 200))->header('Content-Type', 'application/pdf');
    }
}