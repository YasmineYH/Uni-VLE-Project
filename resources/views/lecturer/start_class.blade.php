@extends('layouts.lecturer_default')
@php ($page = 'start_class')

@section('page-content')
    <h1 class="h1-cener">Which class would you like to start? {{ sizeof($lecturerCourses) }}</h1>

    <ul class="lecturer-class-cards">
        @foreach ($lecturerCourses as $lecturerCourse)
            <li class="normal-card">
                <a class="card-a" onclick="openModal()">
                    <h3>{{ $lecturerCourse->CourseCode }}</h3>
                </a>
            </li>
        @endforeach
    </ul>

    @include('modals.confirm_start_class')
@endsection