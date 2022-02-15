@extends('layouts.student_default')
@php ($page = 'library')

@section('page-content')
    <h1>Library</h1>

    <nav class="sec-nav">
        <ul>
            <li><a href="{{ Route('student_library_cm') }}"><h3>Course Materials</h3></a></li>
            <li class="sec-active"><a href="{{ Route('student_library_rc') }}"><h3>Recorded Classes</h3></a></li>
        </ul>
    </nav>

    <ul class="library-cards ">
        <li class="normal-card">
            <div class="card-a" onclick="openModal()">
                <div>
                    <h3>CSC 431</h3>
                    <p>06/08/2021</p>
                </div>
                <img class="recorded-class-svg" src="{{ asset('images/play.svg') }}" alt="">
            </div>
        </li>
    </ul>

    @include('modals.play_class')
@endsection