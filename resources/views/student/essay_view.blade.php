@extends('layouts.student_default')
<?php
    use App\Models\Assignment_Question;
    $page = 'assignments';

    function getQuestion($id) {
        $question = Assignment_Question::where('id', '=', $id)->first();
        return $question->questiontitle;
    }
?>

@section('page-content')
    <h1>Assignments</h1>

    <nav class="sec-nav">
        <ul>
            <li><a href="{{ Route('student_assignments_ps') }}"><h3>Pending Submissions</h3></a></li>
            <li class="sec-active"><a href="{{ Route('student_assignments_rs') }}"><h3>Recently Submitted</h3></a></li>
        </ul>
    </nav>

    <div class="label">
        <h2>{{ $courseCode}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <h2>{{ $assignment[0]->assignmenttype}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>{{ $assignment[0]->submissiondeadline}}</p>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>View</p>
    </div>

    <form action="{{ Route('download_material', ['materialPath' => substr($questions[0]->answer, 17)]) }}" class="frame" method="get" enctype="multipart/form-data">
        @csrf

        @foreach ($questions as $key => $question)
            <div class="question-box">
                <label for="">Question {{ $key + 1 }}: <span>{{ getQuestion($question->questionid) }}</span></label>
                <div class="frame-input">
                    <p style="font-size: 15px">You submitted this file: {{ substr($question->answer, 17) }}</p>
                </div>
            </div>
        @endforeach
        
        <button class="normal-btn" type="submit">Download</button>
        </form>
@endsection