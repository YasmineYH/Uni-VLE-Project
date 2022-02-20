@extends('layouts.lecturer_default')
@php ($page = 'courses')

@section('page-content')
    <div class="courses-menu">
        <div class="courses-menu-frame">
            <h1>{{ $courseCode }} Assignments</h1>
            <img src="{{ asset('images/right-arrow2.svg') }}" alt="">
        </div>
        <ul class="courses-menu-dropdown">
            <li><a href="{{ Route('lecturer_students', ['courseCode' => $courseCode]) }}"><h3>{{ $courseCode }} Students</h3></a></li>
            <li><a href="{{ Route('lecturer_library_cm', ['courseCode' => $courseCode]) }}"><h3>{{ $courseCode }} Library</h3></a></li>
            <li><a href="{{ Route('lecturer_assignments_d', ['courseCode' => $courseCode]) }}"><h3>{{ $courseCode }} Assignments</h3></a></li>
        </ul>
    </div>

    <nav class="sec-nav">
        <ul>
            <li><a href="{{ Route('lecturer_assignments_d', ['courseCode' => $courseCode]) }}"><h3>Drafts</h3></a></li>
            <li class="sec-active"><a href="{{ Route('lecturer_assignments_as', ['courseCode' => $courseCode]) }}"><h3>Assignments</h3></a></li>
        </ul>
    </nav>

    
    <div class="label">
        <h2>{{ $assignment[0]->assignmenttype}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>{{ $assignment[0]->submissiondeadline}}</p>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>Submissions</p>
    </div>

    @if (empty($submissions))
        <h2 style="margin-top: 50px">No submissions yet...</h2>
    @else
        <div class="submitted-table table">
            <div class="table-header table-row">
                <div class="table-col"><h3>Matric No</h3></div>
                <div class="table-col"><h3>Submission Deadline</h3></div>
                <div class="table-col"><h3>Date/Time Submitted</h3></div>
                <div class="table-col"><h3>Grade</h3></div>
            </div>

            @foreach ($submissions as $submission)
                <div class="member table-row">
                    <div class="table-col name"><p>17/52HA103</p></div>
                    <div class="table-col name"><p>{{ $assignment[0]->submissiondeadline }}</p></div>
                    <div class="table-col name"><p>{{ $submission->created_at }}</p></div>
                    <div class="table-col name table-grades">
                        @if ($submission->grade)
                            <p>{{ $submission->grade . '/' . $assignment[0]->totalmark }}</p>
                            @if ($assignment[0]->assignmenttype != 'Multiple Choice')
                                <a href="{{ Route('grade_assignment', ['courseCode' => $courseCode, 'assignID' => $assignment[0]->id, 'submissionID' => $submission->id]) }}" class="normal-btn">Re-grade script</a>
                            @endif
                        @else
                            <a href="{{ Route('grade_assignment', ['courseCode' => $courseCode, 'assignID' => $assignment[0]->id, 'submissionID' => $submission->id]) }}" class="normal-btn">Grade script</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif


@endsection