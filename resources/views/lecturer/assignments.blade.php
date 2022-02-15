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

   

    <ul class="library-cards lecturer-library-cards lecturer-assignment">
        @foreach ($assignments as $assignment)
            <li class="normal-card menu">
                <a href="{{ Route('submissions', ['courseCode' => $courseCode, 'assignID' => $assignment->id]) }}" class="card-a">
                    <h3>{{ $assignment->Assignment_Type }}</h3>
                    <p>{{ $assignment->Submission_Deadline }}</p>
                </a>
            </li>
        @endforeach
    </ul>
@endsection