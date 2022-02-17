@extends('layouts.student_default')
<?php
    use App\Models\Assignment_Question;
    $page = 'assignments';

    function getQuestion($id) {
        $question = Assignment_Question::where('id', '=', $id)->first();
        return $question->QuestionTitle;
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
        <h2>{{ $assignment[0]->AssignmentType}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>{{ $assignment[0]->SubmissionDeadline}}</p>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>View</p>
    </div>

    <div class="frame frame-objective" >
        @foreach ($questions as $key => $question)
            <div class="question-box">
                <label for="">Question {{ $key+1 }}: <span>{{ $question->QuestionTitle }}</span></label>
                <div class="question-options" style="pointer-events: none">
                    <div>
                        <input type="radio" name="option">
                        <span class="radio"></span>
                        <span>{{ $question->Option2 }}</span>
                    </div>
                    <div>
                        <input type="radio" name="option">
                        <span class="radio"></span>
                        <span>{{ $question->Option3 }}</span>
                    </div>
                    <div>
                        <input type="radio" name="option">
                        <span class="radio"></span>
                        <span>{{ $question->OptionCorrect }}</span>
                    </div>
                    <div>
                        <input type="radio" name="option">
                        <span class="radio"></span>
                        <span>{{ $question->Option4 }}</span>
                    </div>
                    @if ($question->Option5)
                        <div>
                            <input type="radio" name="answer{{ $key+1 }}" value="0">
                            <span class="radio"></span>
                            <span>{{ $question->Option5 }}</span>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection