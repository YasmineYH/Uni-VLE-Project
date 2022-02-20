<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\AssignmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
}) -> name('home');





Route::get('/lecturer/login', [LecturerController::class, 'login']) -> name('lecturer_login');
Route::post('lecturer/check', [LecturerController::class, 'check']) -> name('lecturer_login_check');
Route::get('lecturer_profile', [LecturerController::class, 'lecturer_profile']) -> name('lecturer');
Route::get('/lecturer/logout', [LecturerController::class, 'logout']) -> name('lecturer_logout');

Route::get('/lecturer/start_class', [LecturerController::class, 'start_class']) -> name('lecturer_start_class');

Route::get('/lecturer/courses', [LecturerController::class, 'courses']) -> name('lecturer_courses');

Route::get('/lecturer/{courseCode}/students', [LecturerController::class, 'courses_students']) -> name('lecturer_students');

Route::post('/lecturer/{courseCode}/library/materials/add', [LecturerController::class, 'add_material']) -> name('lecturer_add_material');
Route::delete('/lecturer/{courseCode}/library/materials/{materialID}/delete', [LecturerController::class, 'delete_material']) -> name('lecturer_delete_material');
Route::get('/lecturer/{courseCode}/library/materials/{materialPath}/download', [LecturerController::class, 'download_material']) -> name('lecturer_download_material');
Route::get('/lecturer/{courseCode}/library/materials', [LecturerController::class, 'courses_library_cm']) -> name('lecturer_library_cm');
Route::get('/lecturer/{courseCode}/library/classes', [LecturerController::class, 'courses_library_rc']) -> name('lecturer_library_rc');

Route::get('/lecturer/{courseCode}/assignments/drafts', [AssignmentController::class, 'assignments_d']) -> name('lecturer_assignments_d');
Route::get('/lecturer/{courseCode}/assignments/add/step1', [AssignmentController::class, 'assignments_add1']) -> name('add_assignment_step1');
Route::get('/lecturer/{courseCode}/assignments/add/step2/{assignID}/{lecturerData}/theory', [AssignmentController::class, 'assignments_add2_theory']) -> name('add_assignment_step2_theory');
Route::get('/lecturer/{courseCode}/assignments/add/step2/{assignID}/{lecturerData}/essay', [AssignmentController::class, 'assignments_add2_essay']) -> name('add_assignment_step2_essay');
Route::get('/lecturer/{courseCode}/assignments/add/step2/{assignID}/{lecturerData}/objective', [AssignmentController::class, 'assignments_add2_obj']) -> name('add_assignment_step2_obj');
Route::get('/lecturer/{courseCode}/assignments/add/step2/subjective', [AssignmentController::class, 'assignments_add2_subj']) -> name('add_assignment_step2_subj');
Route::get('/lecturer/{courseCode}/assignments/add/step3', [AssignmentController::class, 'assignments_add3']) -> name('add_assignment_step3');
Route::get('/lecturer/{courseCode}/assignments', [AssignmentController::class, 'assignments']) -> name('lecturer_assignments_as');

Route::get('/lecturer/{courseCode}/assignments/{assignID}/submissions', [AssignmentController::class, 'submissions']) -> name('submissions');
Route::get('/lecturer/{courseCode}/assignments/{assignID}/grade/{submissionID}', [AssignmentController::class, 'grade_assignment']) -> name('grade_assignment');
Route::put('/lecturer/{courseCode}/assignments/{assignTotal}/grade/{submissionID}/save', [AssignmentController::class, 'save_grade']) -> name('save_grade_assignment');
Route::get('/lecturer/assignments/grade/{answerID}/download/essay', [AssignmentController::class, 'download_essay']) -> name('lecturer_download_essay');

Route::get('lecturer/message', function() {
    return view('lecturer.message');
})-> name('assignment_message');

Route::post('lecturer/{courseCode}/add/step1', [AssignmentController::class, 'add1']) -> name('add1');
Route::post('lecturer/{courseCode}/add/step2/{assignID}/theory', [AssignmentController::class, 'add2_theory']) -> name('add2_theory');
Route::post('lecturer/{courseCode}/add/step2/{assignID}/essay', [AssignmentController::class, 'add2_essay']) -> name('add2_essay');
Route::post('lecturer/{courseCode}/add/step2/{assignID}/obj', [AssignmentController::class, 'add2_obj']) -> name('add2_obj');

Route::put('/lecturer/{courseCode}/assignments/{assignID}/sendtostudents', [AssignmentController::class, 'send_assignment']) -> name('lecturer_send_assignment');
Route::delete('/lecturer/{courseCode}/assignments/{assignID}/delete', [AssignmentController::class, 'delete_assignment']) -> name('lecturer_delete_assignment');

Route::get('/lecturer/notifications', [LecturerController::class, 'notifications'])-> name('lecturer_notifications');





Route::get('/student/login', [StudentController::class, 'login']) -> name('student_login');
Route::post('student/check', [StudentController::class, 'check']) -> name('student_login_check');
Route::get('student_profile', [StudentController::class, 'student_profile']) -> name('student');
Route::get('/student/logout', [StudentController::class, 'logout']) -> name('student_logout');

Route::get('/student/class', [StudentController::class, 'class']) -> name('student_class');
Route::post('/student/class/chat', [StudentController::class, 'chat']) -> name('chat');

Route::get('/student/library/materials', [StudentController::class, 'library_cm']) -> name('student_library_cm');
Route::get('/student/library/materials/{materialPath}/download', [StudentController::class, 'download_material']) -> name('download_material');
Route::get('/student/library/classes', [StudentController::class, 'library_rc']) -> name('student_library_rc');

Route::get('/student/assignments/pending', [StudentController::class, 'assignments_ps']) -> name('student_assignments_ps');
Route::get('/student/assignments/submitted', [StudentController::class, 'assignments_rs']) -> name('student_assignments_rs');

Route::get('/student/assignments/submit/{courseCode}/{assignID}', [StudentController::class, 'theory_submit']) -> name('theory_submit');
Route::post('/student/assignments/submit/{courseCode}/{assignID}/{studentData}/save', [StudentController::class, 'save_theory']) -> name('save_theory');
Route::get('/student/assignments/view/{courseCode}/{assignID}/{studentData}', [StudentController::class, 'theory_view']) -> name('theory_view');

Route::get('/student/assignments/submit/essay/{courseCode}/{assignID}', [StudentController::class, 'essay_submit']) -> name('essay_submit');
Route::post('/student/assignments/submit/essay/{courseCode}/{assignID}/{studentData}/save', [StudentController::class, 'save_essay']) -> name('save_essay');
Route::get('/student/assignments/view/essay/{courseCode}/{assignID}/{studentData}', [StudentController::class, 'essay_view']) -> name('essay_view');
Route::get('/student/assignments/essay/{materialPath}/download', [StudentController::class, 'download_essay']) -> name('download_essay');

Route::get('/student/assignments/submit/obj/{courseCode}/{assignID}', [StudentController::class, 'obj_submit']) -> name('obj_submit');
Route::post('/student/assignments/submit/obj/{courseCode}/{assignID}/{studentData}/{questions}/save', [StudentController::class, 'save_obj']) -> name('save_obj');
Route::get('/student/assignments/view/obj/{courseCode}/{assignID}/{studentData}', [StudentController::class, 'obj_view']) -> name('obj_view');

Route::get('/student/notifications', [StudentController::class, 'notifications']) -> name('student_notifications');