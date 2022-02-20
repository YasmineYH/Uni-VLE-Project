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
        <h2>{{ $assignment[0]->assignmenttype}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>{{ $assignment[0]->submissiondeadline}}</p>
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

    <form action="{{ Route('save_essay', ['studentData' => $studentData, 'courseCode' => $courseCode, 'assignID' => $assignment[0]->id]) }}" method="post" enctype="multipart/form-data" class="frame frame-essay">
        @csrf

        <div class="question-box">
            <label for="">Question: <span>{{ $questions[0]->questiontitle}}</span></label>
            <span class="input-error">@error('answer') {{ $message }} @enderror</span>
            <div>
                <p>Drag your file here or click to upload</p>
                <input class="frame-input" type="file" name="answer" onchange="filenames()">
                <input type="number" name="id" value="{{ $questions[0]->id }}" style="display: none">
            </div>
        </div>
        
        <button class="normal-btn" type="submit">Submit</button>
    </form>

    <script>
        function filenames() {
            document.querySelector('.question-box p').innerText = document.querySelector('.question-box input').value
        }
    </script>
@endsection