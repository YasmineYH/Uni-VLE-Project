@extends('layouts.lecturer_default')
@php ($page = 'courses')

@section('page-content')
    <h1>Courses</h1>

    <ul class="library-cards lecturer-library-cards">
        @foreach ($lecturerCourses as $lecturerCourse)
            <li class="normal-card menu">
                <div class="card-a">
                    <h3>{{ $lecturerCourse->coursecode }}</h3>
                </div>
                <div class="floating-menu">
                    <div class="floating-menu-shadow"></div>
                    <ul>
                        <li><a href="{{ Route('lecturer_students', ['courseCode' => $lecturerCourse->coursecode]) }}"><h3>{{ $lecturerCourse->coursecode }} Students</h3></a></li>
                        <li><a href="{{ Route('lecturer_library_cm', ['courseCode' => $lecturerCourse->coursecode]) }}"><h3>{{ $lecturerCourse->coursecode }} Library</h3></a></li>
                        <li><a href="{{ Route('lecturer_assignments_d', ['courseCode' => $lecturerCourse->coursecode]) }}"><h3>{{ $lecturerCourse->coursecode }} Assignments</h3></a></li>
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
@endsection