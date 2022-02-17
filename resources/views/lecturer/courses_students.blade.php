@extends('layouts.lecturer_default')
@php ($page = 'courses')

@section('page-content')
    <div class="courses-menu">
        <div class="courses-menu-frame">
            <h1>{{ $courseCode }} Students</h1>
            <img src="{{ asset('images/right-arrow2.svg') }}" alt="">
        </div>
        <ul class="courses-menu-dropdown">
            <li><a href="{{ Route('lecturer_students', ['courseCode' => $courseCode]) }}"><h3>{{ $courseCode }} Students</h3></a></li>
            <li><a href="{{ Route('lecturer_library_cm', ['courseCode' => $courseCode]) }}"><h3>{{ $courseCode }} Library</h3></a></li>
            <li><a href="{{ Route('lecturer_assignments_d', ['courseCode' => $courseCode]) }}"><h3>{{ $courseCode }} Assignments</h3></a></li>
        </ul>
    </div>


    <div class="team-meambers table">
        <p class="show-on-phone">Connect on a larger device to see more details.</p>

        <div class="table-header table-row">
            <div class="table-col"><h3>Matric No</h3></div>
            <div class="table-col"><h3>First Name</h3></div>
            <div class="table-col"><h3>Middle Name</h3></div>
            <div class="table-col"><h3>Last Name</h3></div>
            <div class="table-col hide-on-phone"><h3>Attendance</h3></div>
            <div class="table-col hide-on-phone"><h3>Assignments</h3></div>
            <div class="table-col hide-on-phone"><h3>Tests</h3></div>
        </div>

        @foreach ($courseStudents as $courseStudent)
            <div class="member table-row">
                <div class="table-col name"><p>{{ $courseStudent[0]->StudentID }}</p></div>
                <div class="table-col name"><p>{{ $courseStudent[0]->StudentFirstname }}</p></div>
                <div class="table-col name"><p>{{ $courseStudent[0]->StudentMiddlename }}</p></div>
                <div class="table-col name"><p>{{ $courseStudent[0]->StudentLastname }}</p></div>
                <div class="table-col name hide-on-phone"><p>25%</p></div>
                <div class="table-col name hide-on-phone"><p>0/40</p></div>
                <div class="table-col name hide-on-phone"><p>3/60</p></div>
            </div>
        @endforeach
    </div>
@endsection