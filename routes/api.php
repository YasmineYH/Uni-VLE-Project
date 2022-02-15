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

    if (!Student::where('Student_ID', '=', $data['Student_ID'])->exists()) {
        $student = Student::create([
            "Student_ID" => $data["Student_ID"],
            "Student_Firstname" => $data["Student_Firstname"],
            "Student_Middlename" => $data["Student_Middlename"],
            "Student_Lastname" => $data["Student_Lastname"],
            "Level" => $data["Level"],
            "Phone" => $data["Phone"],
            "Email" => $data["Email"],
            "Profile" => $data["Profile"],
            "Password" => Hash::make($data["Student_Lastname"])
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

    if (!Lecturer::where('Lecturer_ID', '=', $data['Lecturer_ID'])->exists()) {
        $lecturer = Lecturer::create([
            "Lecturer_ID" => $data["Lecturer_ID"],
            "Lecturer_Firstname" => $data["Lecturer_Firstname"],
            "Lecturer_Middlename" => $data["Lecturer_Middlename"],
            "Lecturer_Lastname" => $data["Lecturer_Lastname"],
            "Phone" => $data["Phone"],
            "Email" => $data["Email"],
            "Status" => $data["Status"],
            "Profile" => $data["Profile"],
            "Password" => Hash::make($data["Lecturer_Lastname"])
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

    if (!Course::where('Course_ID', '=', $data['Course_ID'])->exists()) {
        $course = Course::create([
            "Course_ID" => $data["Course_ID"],
            "Course_Code" => $data["Course_Code"],
            "Course_Title" => $data["Course_Title"],
            "Lecturer_ID" => $data["Lecturer_ID"]
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
        "Course_ID" => $data["Course_ID"],
        "Student_ID" => $data["Student_ID"]
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