@extends('layouts.student_default')
<?php
    use Illuminate\Support\Arr;

    $page = 'assignments';
    $shuffled_questions = Arr::shuffle($questions);
?>

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

        @if (Session::get('exists'))
            <p>{{ Session::get('exists') }}</p>
        @endif
    </div>

    <form action="{{ Route('save_obj', ['studentData' => $studentData, 'courseCode' => $courseCode, 'assignID' => $assignment[0]->id, 'questions' => count($questions)]) }}" method="post" enctype="multipart/form-data" class="frame frame-objective">
        @csrf
        @foreach ($questions as $key => $question)
            <div class="question-box">
                <label for="">Question {{ $key+1 }}: <span>{{ $question->Question_Title }}</span></label>
                <span class="input-error">@error('answer{{ $key+1 }}') {{ $message }} @enderror</span class="input-error">
                <div class="question-options">
                    <div>
                        <input type="radio" name="answer{{ $key+1 }}" value="0">
                        <span class="radio"></span>
                        <span>{{ $question->Option_2 }}</span>
                    </div>
                    <div>
                        <input type="radio" name="answer{{ $key+1 }}" value="1">
                        <span class="radio"></span>
                        <span>{{ $question->Option_Correct }}</span>
                    </div>
                    <div>
                        <input type="radio" name="answer{{ $key+1 }}" value="0">
                        <span class="radio"></span>
                        <span>{{ $question->Option_4 }}</span>
                    </div>
                    <div>
                        <input type="radio" name="answer{{ $key+1 }}" value="0">
                        <span class="radio"></span>
                        <span>{{ $question->Option_3 }}</span>
                    </div>
                    @if ($question->Option_5)
                        <div>
                            <input type="radio" name="answer{{ $key+1 }}" value="0">
                            <span class="radio"></span>
                            <span>{{ $question->Option_5 }}</span>
                        </div>
                    @endif
                </div>
            </div>
            <input type="number" name="id{{ $key+1 }}" value="{{ $question->id }}" style="display: none">
        @endforeach
        
        <button class="normal-btn" type="submit">Submit</button>
    </form>
@endsection