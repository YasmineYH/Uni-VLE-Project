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

    <form action="{{ Route('add1', ['courseCode' => $courseCode]) }}" method="post" enctype="multipart/form-data" class="assignment-form">
        @csrf

        <div class="form-error" style="position: absolute; top: 295px">
            @if ($message = Session::get('success'))
                <p>{{ $message }}</p>
            @endif
    
            @if ($message = Session::get('fail'))
                <p>{{ $message }}</p>
            @endif
        </div>

        <span class="input-error">@error('type') {{ $message }} @enderror</span>
        <div class="input-group">
            <select name="type" id="type" class="input-full" value="{{ old('type') }}">
                <option value="">Assignment type</option>
                <option value="Theory">Theory</option>
                <option value="Essay">Essay</option>
                <option value="Multiple Choice">Multiple Choice</option>
            </select>
        </div>

        <span class="input-error">@error('sd') {{ $message }} @enderror</span>
        <div class="input-group">
            <input type="text" name="sd" id="sd" placeholder="Submission date (Y-m-d)" value="{{ old('sd') }}">
            <input type="text" name="esd" id="esd" placeholder="Extended submission date (Y-m-d) (optional)" value="{{ old('esd') }}">
        </div>

        <div class="input-group">
            <input type="text" name="mark" id="mark" placeholder="Total marks (optional)" value="{{ old('mark') }}">
            <select name="draft" id="draft" value="{{ old('draft') }}">
                <option value="">Save as draft?</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="button-group">
            <button type="submit" class="normal-btn">Next</button>
        </div>
    </form>
@endsection