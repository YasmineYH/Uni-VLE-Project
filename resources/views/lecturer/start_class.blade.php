@extends('layouts.lecturer_default')
@php ($page = 'start_class')

@section('page-content')
    <h1 class="h1-cener">Pick a Course</h1>


    <ul class="lecturer-class-cards">
        @foreach ($lecturerCourses as $lecturerCourse)
            <li class="normal-card">
                <a class="card-a" onclick="openModal()">
                    <h3>{{ $lecturerCourse->Course_Code }}</h3>
                </a>
            </li>
        @endforeach
    </ul>

    @include('modals.confirm_start_class')
@endsection