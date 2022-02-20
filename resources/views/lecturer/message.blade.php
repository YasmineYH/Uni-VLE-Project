<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css" />
    <title>Message</title>
</head>
<body>
    <main>
        <div class="modal message" style="visibility: visible; width: 100%; left: 0; height: calc(var(--vh) * 100)">
            <div class="modal-box">
                <div class="modal-content modal-content-confirm">
                    <h3 style="margin-top: -10px; margin-bottom: 40px; text-align: center">First step completed! Click OK to move to the next steps.</h3>
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
    </main>
</body>
</html>