<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Course;
use App\Models\Enrollment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/student/create', function (Request $request) {
    $data = $request->all();

    if (!Student::where('StudentID', '=', $data['StudentID'])->exists()) {
        $student = Student::create([
            "studentid" => $data["StudentID"],
            "studentfirstname" => $data["StudentFirstname"],
            "studentmiddlename" => $data["StudentMiddlename"],
            "studentlastname" => $data["StudentLastname"],
            "level" => $data["Level"],
            "phone" => $data["Phone"],
            "email" => $data["Email"],
            "profile" => $data["Profile"],
            "password" => Hash::make($data["StudentLastname"])
        ]);

        if (empty($student->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured"
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "student" => $student
                ]
            ];
        }
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "This student already exists"
            ]
        ];
    }
});


Route::post('/lecturer/create', function (Request $request) {
    $data = $request->all();

    if (!Lecturer::where('LecturerID', '=', $data['LecturerID'])->exists()) {
        $lecturer = Lecturer::create([
            "LecturerID" => $data["LecturerID"],
            "LecturerFirstname" => $data["LecturerFirstname"],
            "LecturerMiddlename" => $data["LecturerMiddlename"],
            "LecturerLastname" => $data["LecturerLastname"],
            "Phone" => $data["Phone"],
            "Email" => $data["Email"],
            "Status" => $data["Status"],
            "Profile" => $data["Profile"],
            "Password" => Hash::make($data["LecturerLastname"])
        ]);

        if (empty($lecturer->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured"
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "lecturer" => $lecturer
                ]
            ];
        }
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "This lecturer already exists"
            ]
        ];
    }
});


Route::post('/course/create', function (Request $request) {
    $data = $request->all();

    if (!Course::where('CourseID', '=', $data['CourseID'])->exists()) {
        $course = Course::create([
            "CourseID" => $data["CourseID"],
            "CourseCode" => $data["CourseCode"],
            "CourseTitle" => $data["CourseTitle"],
            "LecturerID" => $data["LecturerID"]
        ]);

        if (empty($course->id)) {
            return [
                "success" => false,
                "response" => [
                    "error" => "An unexpected error has occured"
                ]
            ];
        } else {
            return [
                "success" => true,
                "response" => [
                    "course" => $course
                ]
            ];
        }
    } else {
        return [
            "success" => false,
            "response" => [
                "error" => "This course already exists"
            ]
        ];
    }
});

Route::post('/enrollment/create', function (Request $request) {
    $data = $request->all();

    $enrollment = Enrollment::create([
        "CourseID" => $data["CourseID"],
        "StudentID" => $data["StudentID"]
    ]);

    if (empty($enrollment->id)) {
        return [
            "success" => false,
            "response" => [
                "error" => "An unexpected error has occured"
            ]
        ];
    } else {
        return [
            "success" => true,
            "response" => [
                "enrollment" => $enrollment
            ]
        ];
    }
});