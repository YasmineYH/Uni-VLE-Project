@extends('layouts.student_default')
@php ($page = 'home')

@section('page-content')
    <div class="home-intro">
        <h1>Good Morning, {{ $studentData->Student_Firstname }}</h1>
        <ul>
            <li><a href=""><h3>Courses</h3></a></li>
            <li><a href=""><h3>Lecturers</h3></a></li>
            <li><a href=""><h3>Timetable</h3></a></li>
            <li><a href=""><h3>Board</h3></a></li>
        </ul>
    </div>

    <ul class="home-cards ">
        <li class="normal-card">
            <a class="card-a" href="">
                <h3>University of Ilorin Map</h3>
                <img src="{{ asset('images/right-arrow.svg') }}" alt="Go">
            </a>
        </li>
        <li class="normal-card">
            <a class="card-a" href="">
                <h3>University of Ilorin Faculties</h3>
                <img src="{{ asset('images/right-arrow.svg') }}" alt="Go">
            </a>
        </li>
        <li class="normal-card">
            <a class="card-a" href="">
                <h3>University of Ilorin Faculties</h3>
                <img src="{{ asset('images/right-arrow.svg') }}" alt="Go">
            </a>
        </li>
        <li class="normal-card">
            <a class="card-a" href="">
                <h3>Academic Timetable</h3>
                <img src="{{ asset('images/right-arrow.svg') }}" alt="Go">
            </a>
        </li>
    </ul>
@endsection