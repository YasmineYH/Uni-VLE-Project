@extends('layouts.lecturer_default')
<?php
    use App\Models\Assignment_Question;
    $page = 'assignments';

    function getQuestion($id) {
        $question = Assignment_Question::where('id', '=', $id)->first();
        return $question->QuestionTitle;
    }

?>

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
            <li><a href="{{ Route('lecturer_assignments_d', ['courseCode' => $courseCode]) }}"><h3>Drafts</h3></a></li>
            <li class="sec-active"><a href="{{ Route('lecturer_assignments_as', ['courseCode' => $courseCode]) }}"><h3>Assignments</h3></a></li>
        </ul>
    </nav>

    
    <div class="label">
        <h2>{{ $assignment[0]->AssignmentType}}</h2>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>{{ $assignment[0]->SubmissionDeadline}}</p>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>Grade</p>
        <img src="{{ asset('/images/right-arrow2.svg') }}" alt="">
        <p>{{ $submissions[0]->StudentID}}</p>
    </div>

    <form action="{{ Route('save_grade_assignment', ['courseCode' => $courseCode, 'assignTotal' => $assignment[0]->TotalMark, 'submissionID' => $submissions[0]->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}

        <div class="frame frame-theory">
            <div class="form-error" style="position: absolute; top: 355px">
                <p>@error('question') {{ $message }} @enderror</p>
                @if ($message = Session::get('success'))
                    <p>{{ $message }}</p>
                @endif
        
                @if ($message = Session::get('fail'))
                    <p>{{ $message }}</p>
                @endif
            </div>

            <input name="_method" type="hidden" value="PUT">

            @if ($assignment[0]->Assignment_Type == 'Theory')
            @foreach ($questions as $key => $question)
                <div class="question-box">
                    <label for="">Question {{ $key + 1 }}: <span>{{ getQuestion($question->QuestionID) }}</span></label>
                    <div class="frame-input">
                        <p style="font-size: 15px">{{ $question->Answer}}</p>
                    </div>
                    <input class="insert-grade" type="number" name="grade[]" id="" placeholder="Insert grade here" value="{{ old('grade[]') }}">
                </div>
            @endforeach
            @endif

            @if ($assignment[0]->Assignment_Type == 'Essay')
            @foreach ($questions as $key => $question)
                <div class="question-box">
                    <label for="">Question {{ $key + 1 }}: <span>{{ getQuestion($question->QuestionID) }}</span></label>
                    <a class="normal-btn" style="display: block; height: 45px; text-align:center; padding-top: 11px; width: 80%; margin: 30px auto" href="{{ route('lecturer_download_essay', ['answerID' => $question->id]) }}">Click here to download {{  $submissions[0]->StudentID }}'s assignment file' </a>
                    <input class="insert-grade" type="number" name="grade[]" id="" placeholder="Insert grade here" value="{{ old('grade[]') }}">
                </div>
            @endforeach
            @endif
            
        </div>

        
        <div class="grade-total">
            <p id="grade-error" style="color: red"></p>
            <h3>Total grade: <span>0</span>/<span id="total">{{ $assignment[0]->TotalMark }}</span></h3>
            <button type="submit" name="form-submit" value="theory" class="normal-btn">Save</button>
        </div>
    </form>

    <script>
        var gradeInsert = document.querySelectorAll('.insert-grade')
        var totalGrade = document.querySelector('.grade-total h3 span')
        var intendedTotal = document.querySelector('#total').innerText
        var error = document.querySelector('#grade-error')
        var total = 0

        gradeInsert.forEach(grade => {
            grade.addEventListener('change', function () {
                total = parseInt(grade.value) + parseInt(total)

                totalGrade.innerText = total
                console.log(total)

                if (total > intendedTotal) {
                    error.innerText = 'Grade cannot be greater than total.'
                }
            })
        })
    </script>
@endsection