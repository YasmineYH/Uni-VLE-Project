@extends('layouts.student_default')
<?php
    use App\Models\Course;
    use App\Models\Assignment_Submission;
    $page = 'assignments';

    function getCode($id) {
        $course = Course::where('CourseID', '=', $id)->first();
        return $course->CourseCode;
    }

    $submitted = array();

    foreach ($assignments as $key => $assignment) {
        foreach ($assignment as $key => $assignment_single) {
            $submission = Assignment_Submission::where('AssignmentID', '=', $assignment_single->id)->first();

            if (empty($submission)) {
                $submitted[] = $assignment_single;
            }
        }
    }
?>

@section('page-content')
    <h1>Assignments</h1>

    <nav class="sec-nav">
        <ul>
            <li class="sec-active"><a href="{{ Route('student_assignments_ps') }}"><h3>Pending Submissions</h3></a></li>
            <li><a href="{{ Route('student_assignments_rs') }}"><h3>Recently Submitted</h3></a></li>
        </ul>
    </nav>

    <ul class="library-cards">
        @foreach ($submitted as $assignment_single)
            <li class="normal-card student-assign-card">
                @if ($assignment_single->Assignment_Type == 'Theory')
                    <a class="card-a" href="{{ route('theory_submit', ['courseCode' => getCode($assignment_single->CourseID), 'assignID' => $assignment_single->id])}}">
                @endif

                @if ($assignment_single->Assignment_Type == 'Essay')
                    <a class="card-a" href="{{ route('essay_submit', ['courseCode' => getCode($assignment_single->CourseID), 'assignID' => $assignment_single->id])}}">
                @endif

                @if ($assignment_single->Assignment_Type == 'Multiple Choice')
                    <a class="card-a" href="{{ route('obj_submit', ['courseCode' => getCode($assignment_single->CourseID), 'assignID' => $assignment_single->id])}}">
                @endif
                    <div>
                        <h3>{{ getCode($assignment_single->CourseID)}} - {{ $assignment_single->AssignmentType}}</h3>
                        <p>Due Date: <span>{{ $assignment_single->SubmissionDeadline}}</span></p>
                    </div>
    
                    <h3 class="assign-button">Click to Submit</h3>
                </a>
            </li>
        @endforeach
    </ul>
@endsection