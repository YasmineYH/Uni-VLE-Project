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
            <li class="sec-active"><a href="{{ Route('lecturer_assignments_d', ['courseCode' => $courseCode]) }}"><h3>Drafts</h3></a></li>
            <li><a href="{{ Route('lecturer_assignments_as', ['courseCode' => $courseCode]) }}"><h3>Assignments</h3></a></li>
        </ul>
    </nav>

    <form action="" class="assignment-form">
        <div class="input-group">
            <input type="text" name="question" id="question" placeholder="Question 1" class="input-full">
        </div>

        <div class="input-group">
            <input type="text" name="option_c" id="option_c" placeholder="Answer" class="input-full">
        </div>

        <div class="button-group">
            <button type="submit" name="back" class="normal-btn">Back</button>
            <button type="submit" name="next" class="normal-btn">Next question</button>
            <button type="submit" name="done" class="normal-btn">Done</button>
        </div>
    </form>
@endsection