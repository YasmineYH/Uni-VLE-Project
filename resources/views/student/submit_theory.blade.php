@extends('layouts.student_default')
@php ($page = 'assignments')

@section('page-content')
    <h1>Assignments</h1>
    
    <nav class="sec-nav">
        <ul>
            <li class="sec-active"><a href="{{ Route('student_assignments_ps') }}"><h3>Pending Submissions</h3></a></li>
            <li><a href="{{ Route('student_assignments_rs') }}"><h3>Recently Submitted</h3></a></li>
        </ul>
    </nav>

    <div class="label">
        <h2>{{ $courseCode}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <h2>{{ $assignment[0]->Assignment_Type}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>{{ $assignment[0]->Submission_Deadline}}</p>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>Submit</p>
    </div>

    <div class="form-error">
        @if (Session::get('fail'))
            <p>{{ Session::get('fail') }}</p>
        @endif

        @if (Session::get('success'))
            <p>{{ Session::get('success') }}</p>
        @endif

        @if (Session::get('answer'))
            <p>{{ Session::get('answer') }}</p>
        @endif

        @if (Session::get('exists'))
            <p>{{ Session::get('exists') }}</p>
        @endif
    </div>

    <form action="{{ Route('save_theory', ['studentData' => $studentData, 'courseCode' => $courseCode, 'assignID' => $assignment[0]->id]) }}" method="post" enctype="multipart/form-data" class="frame frame-theory">
        @csrf
        @foreach ($questions as $key => $question)
            <div class="question-box">
                <label for="">Question {{ $key+1 }}: <span> {{ $question->Question_Title }} </span></label>
                <textarea name="answer[]" class="frame-input" value="{{ old('answer[]')}}"></textarea>
                <input type="number" name="id[]" value="{{ $question->id }}" style="display: none">
            </div>
        @endforeach
        
        <button class="normal-btn" type="submit">Submit</button>
    </form>
@endsection