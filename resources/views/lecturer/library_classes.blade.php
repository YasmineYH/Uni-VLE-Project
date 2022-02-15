@extends('layouts.lecturer_default')
@php ($page = 'courses')

@section('page-content')
    <div class="courses-menu">
        <div class="courses-menu-frame">
            <h1>{{ $courseCode }} Library</h1>
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
            <li><a href="{{ Route('lecturer_library_cm', ['courseCode' => $courseCode]) }}"><h3>Course Materials</h3></a></li>
            <li class="sec-active"><a href="{{ Route('lecturer_library_rc', ['courseCode' => $courseCode]) }}"><h3>Recorded Classes</h3></a></li>
        </ul>
    </nav>

   

    <ul class="library-cards lecturer-library-cards lecturer-recorded-class">
        @foreach ($courseMaterials as $courseMaterial)
            
        @endforeach
    </ul>

    @include('modals.play_class')
@endsection