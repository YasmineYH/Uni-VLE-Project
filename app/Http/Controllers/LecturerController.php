<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Course;
use App\Models\Course_Material;
use App\Models\Assignment;
use App\Models\Assignment_Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class LecturerController extends Controller {
    public function getLecturerInfo() {
        if (session()->has('LoggedLecturer')) {
            $data = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
        }

        return $data;
    }

    public function getCourses($lecturerData) {
        $data = DB::select('select * from courses where lecturerid = ?', [$lecturerData->lecturerid]);

        return $data;
    }





    public function login() {
        return view('lecturer.login');
    }

    public function start_class() {
        $lecturerData = $this.getLecturerInfo();
        $lecturerCourses = $this.getCourses($lecturerData);

        return view('lecturer.start_class')->with('lecturerData', $lecturerData)->with('lecturerCourses', $lecturerCourses);
    }

    public function courses() {
        $lecturerData = $this.getLecturerInfo();
        $lecturerCourses = $this.getCourses($lecturerData);

        return view('lecturer.courses')->with('lecturerData', $lecturerData)->with('lecturerCourses', $lecturerCourses);
    }

    public function courses_students($courseCode) {
        $lecturerData = $this.getLecturerInfo();
        $lecturerCourses = $this.getCourses($lecturerData);

        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
        $courseEnrollments = DB::select('select * from enrollments where courseid = ?', [$courseID->first()]);
        $courseStudents = array();

        foreach ($courseEnrollments as $property => $courseEnrollment) {
            $courseStudent = DB::select('select * from students where studentid = ?', [$courseEnrollment->studentid]);
            $courseStudents[] = $courseStudent;
        }

        return view('lecturer.courses_students')->with('lecturerData', $lecturerData)->with('lecturerCourses', $lecturerCourses)->with('courseStudents', $courseStudents)->with('courseCode', $courseCode);
    }

    public function courses_library_cm($courseCode) {
        $lecturerData = $this.getLecturerInfo();
        $lecturerCourses = $this.getCourses($lecturerData);

        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
        $courseMaterials = DB::select('select * from course__materials where courseid = ?', [$courseID->first()]);

        return view('lecturer.library_materials')->with('lecturerData', $lecturerData)->with('lecturerCourses', $lecturerCourses)->with('courseMaterials', $courseMaterials)->with('courseCode', $courseCode)->with('returningMaterial', false);
    }

    public function courses_library_rc($courseCode) {
        $lecturerData = $this.getLecturerInfo();
        $lecturerCourses = $this.getCourses($lecturerData);

        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
        $courseMaterials = DB::select('select * from course__materials where courseid = ?', [$courseID->first()]);

        return view('lecturer.library_classes')->with('lecturerData', $lecturerData)->with('lecturerCourses', $lecturerCourses)->with('courseMaterials', $courseMaterials)->with('courseCode', $courseCode);
    }

    public function notifications() {
        $lecturerData = $this.getLecturerInfo();

        return view('lecturer.notifications')->with('lecturerData', $lecturerData);
    }





    function check(Request $request) {
        // Validate requests
        $request->validate([
            'Lecturer_ID' => 'required',
            'Password' => 'required'
        ]);

        //Validate successfullly
        $lecturer = Lecturer::where('lecturerid', '=', $request->Lecturer_ID)->first();
        if ($lecturer) {
            if (Hash::check($request->Password, $lecturer->password)) {
                $request->session()->put('LoggedLecturer', $lecturer->id);
                return redirect('lecturer_profile');
            } else {
                return back()->with('fail', 'Invalid password');
            }
        } else {
            return back()->with('fail', 'No lecturer found with this Staff ID');
        }
    }

    function lecturer_profile() {
        if (session()->has('LoggedLecturer')) {
            $lecturer = Lecturer::where('id', '=', session('LoggedLecturer'))->first();
            $data = [
                'lecturerData' => $lecturer
            ];
        }

        return view('lecturer.home', $data);
    }

    function logout() {
        if (session()->has('LoggedLecturer')) {
            session()->pull('LoggedLecturer');
            return redirect('/lecturer/login');
            return;
        }
    }





    function add_material($courseCode, Request $request) {
        $courseID = DB::table('courses')->where('coursecode', '=', [$courseCode])->pluck('courseid');
        
        $this->validate($request, [
            'file' => 'required',
            'file.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        ]);

        $chosenFile = new Course_Material;

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $fileExists = DB::select('select * from course__materials where materialid = ?', [$fileName]);

            if (empty($fileExists)) {
                if ($extension == 'pdf') {
                    $file->storeAs('uploads', $fileName, 'public');
                    $chosenFile->courseid = $courseID->first();
                    $chosenFile->materialid = $fileName;
                    $chosenFile->materialfile = '/storage/' . $filePath;
                    $chosenFile->save();
    
                    return back()->with('success', 'Material successfully added')->with('file', $fileName);
                } else {
                    return back()->with('fail', 'This file already exists');
                }
            }
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function download_material($courseCode, $materialPath) {
        $download = 'uploads/' . $materialPath;

        $infoPath = pathinfo($download);
        $extension = $infoPath['extension'];

        $file = Storage::disk('public')->get($download);

        return (new Response($file, 200))->header('Content-Type', 'application/pdf');
    }

    function delete_material($courseCode, $materialID, Request $request) {
        $material = Course_Material::where('materialid', '=', $materialID);

        if (empty($material)) {
            $success = false;
            return back()->with('fail', 'Course material could not be deleted');
        } else {
            $success = $material->delete();
            return back()->with('success', 'Course material successfully deleted');
        }
    }
}
