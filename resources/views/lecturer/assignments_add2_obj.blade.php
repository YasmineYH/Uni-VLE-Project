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

    <form action="{{ Route('add2_obj', ['courseCode' => $courseCode, 'assignID' => $assignID]) }}" method="post" enctype="multipart/form-data" class="assignment-form">
        @csrf

        <div class="form-error" style="position: absolute; top: 295px">
            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
    
            @if ($message = Session::get('fail'))
                <p>{{ $message }}</p>
            @endif
        </div>

        <span class="input-error">@error('question') {{ $message }} @enderror</span class="input-error">
        <div class="input-group">
            <input type="text" name="question" id="question" placeholder="Question" value="{{ old('question')}}" class="input-full">
        </div>

        <span class="input-error">@error('option_c') {{ $message }} @enderror</span class="input-error">
        <div class="input-group">
            <input type="text" name="option_c" id="option_c" placeholder="Correct option" value="{{ old('option_c')}}" class="input-full">
        </div>

        <span class="input-error">@error('option_2') {{ $message }} @enderror</span class="input-error">
        <span class="input-error">@error('option_3') {{ $message }} @enderror</span class="input-error">
        <div class="input-group">
            <input type="text" name="option_2" id="option_2" placeholder="Option 2" value="{{ old('option_2')}}">
            <input type="text" name="option_3" id="option_3" placeholder="Option 3" value="{{ old('option_3')}}">
        </div>

        <span class="input-error">@error('option_4') {{ $message }} @enderror</span class="input-error">
            <div class="input-group">
            <input type="text" name="option_4" id="option_4" placeholder="Option 4" value="{{ old('option_4')}}">
            <input type="text" name="option_5" id="option_4" placeholder="Option 5" value="{{ old('option_4')}}">
        </div>

        <div class="button-group">
            <button type="submit" name="form-submit" value="next" class="normal-btn">Next question</button>
            <button type="submit" name="form-submit" value="done" class="normal-btn">Done</button>
        </div>
    </form>
@endsection