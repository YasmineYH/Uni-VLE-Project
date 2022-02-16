@extends('layouts.vle_home')

@section('page-content')
    <section class="home home-index">
        <img src="{{ asset('images/logo.png') }}" alt="Go">
        <h1>University of Ilorin Virtual Learning Environment</h1>

        <div class="home-btns">
            <a href="{{ Route('student_login') }}" class="normal-btn">I'm a Student</a>
            <a href="{{ Route('lecturer_login') }}" class="normal-btn">I'm a Lecturer</a>
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection