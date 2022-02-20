@extends('layouts.message')

@section('page-content')
    <div class="modal message" style="display: grid; width: 100%; left: 0; height: calc(var(--vh) * 100)">
        <div class="modal-box">
            <div class="modal-content modal-content-confirm">
                @if ($success == 'step 1')
                    <h3 style="margin-top: -10px; margin-bottom: 40px; text-align: center">First step completed! Click OK to move to the next steps.</h3>
                    @if ($type == 'Theory')
                        <a href="{{ route('add_assignment_step2_theory', ['assignID' => $assignID, 'courseCode' => $courseCode, 'lecturerData' => $lecturerData]) }}" class="normal-btn">OK</a>
                    @endif

                    @if ($type == 'Essay')
                        <a href="{{ route('add_assignment_step2_essay', ['assignID' => $assignID, 'courseCode' => $courseCode, 'lecturerData' => $lecturerData]) }}" class="normal-btn">OK</a>
                    @endif

                    @if ($type == 'Multiple Choice')
                        <a href="{{ route('add_assignment_step2_obj', ['assignID' => $assignID, 'courseCode' => $courseCode, 'lecturerData' => $lecturerData]) }}" class="normal-btn">OK</a>
                    @endif

                    @if ($type == 'Subjective')
                        <a href="{{ route('add_assignment_step2_subj', ['assignID' => $assignID, 'courseCode' => $courseCode, 'lecturerData' => $lecturerData]) }}" class="normal-btn">OK</a>
                    @endif
                @endif

                @if ($success == 'step 2')
                    <h3 style="margin-top: -10px; margin-bottom: 40px">Assignment addition complete!</h3>
                    <a href="{{ route('lecturer_assignments_d', ['courseCode' => $courseCode, 'lecturerData' => $lecturerData]) }}" class="normal-btn">End</a>
                @endif
            </div>
        </div>
    </div>
@endsection

                    