@extends('layouts.student_default')
<?php
    use App\Models\Course;
    use App\Models\Assignment_Submission;
    $page = 'assignments';

    function getCode($id) {
        $course = Course::where('courseid', '=', $id)->first();
        return $course->coursecode;
    }

    $submitted = array();

    foreach ($assignments as $key => $assignment) {
        foreach ($assignment as $key => $assignment_single) {
            $submission = Assignment_Submission::where('assignmentid', '=', $assignment_single->id)->first();

            if (!empty($submission)) {
                $submitted[] = $assignment_single;
            }
        }
    }
?>

@section('page-content')
    <h1>Assignments</h1>

    <nav class="sec-nav">
        <ul>
            <li><a href="{{ Route('student_assignments_ps') }}"><h3>Pending Submissions</h3></a></li>
            <li class="sec-active"><a href="{{ Route('student_assignments_rs') }}"><h3>Recently Submitted</h3></a></li>
        </ul>
    </nav>

    <ul class="library-cards">
        @foreach ($submitted as $assignment_single)
            <li class="normal-card student-assign-card">
                @if ($assignment_single->assignmenttype == 'Theory')
                    <a class="card-a" href="{{ route('theory_view', ['courseCode' => getCode($assignment_single->courseid), 'assignID' => $assignment_single->id, 'studentData' => $studentData])}}">
                @endif

                @if ($assignment_single->assignmenttype == 'Essay')
                    <a class="card-a" href="{{ route('essay_view', ['courseCode' => getCode($assignment_single->courseid), 'assignID' => $assignment_single->id, 'studentData' => $studentData])}}">
                @endif

                @if ($assignment_single->assignmenttype == 'Multiple Choice')
                    <a class="card-a" href="{{ route('obj_view', ['courseCode' => getCode($assignment_single->courseid), 'assignID' => $assignment_single->id, 'studentData' => $studentData])}}">
                @endif

                @if ($assignment_single->assignmenttype == 'Subjective')
                    <a class="card-a" href="{{ route('subj_view', ['courseCode' => getCode($assignment_single->courseid), 'assignID' => $assignment_single->id, 'studentData' => $studentData])}}">
                @endif
                    <div>
                        <h3>{{ getCode($assignment_single->courseid)}} - {{ $assignment_single->assignmenttype}}</h3>
                        <p>Due Date: <span>{{ $assignment_single->submissiondeadline}}</span></p>
                    </div>
    
                    <h3 class="assign-button">Click to View</h3>
                </a>
            </li>
        @endforeach
    </ul>
@endsection