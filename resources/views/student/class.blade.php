@extends('layouts.student_default')
<?php
    use App\Models\Student;
    $page = 'class';

    function getName($id) {
        $student = Student::where('studentid', '=', $id)->first();
        return $student->studentlastname . ' ' . $student->studentfirstname;
    }
?>

@section('page-content')
    <div class="classroom-ctn">
        <h1>Classroom</h1>

        <div class="class-content">
            <div class="participants hide-on-tablet">
                <p id="now-active">Participants</p>
    
                <div class="participants-ctn">
                    @foreach ($students as $student)
                        <div class="profile-info">
                            <div class="img" style="background-image: url('{{ asset($studentData->profile) }}')"></div>
                            <div>
                                <h3>You</h3>
                                <p> {{ $studentData->studentid}} </p>
                            </div>
                        </div>

                        @if ($student->studentid != $studentData->studentid)
                            <div class="profile-info">
                                <div class="img" style="background-image: url('{{ asset($student->profile) }}')"></div>
                                <div>
                                    <h3> {{ $student->studentlastname . ' ' . $student->studentfirstname }} </h3>
                                    <p> {{ $student->studentid}} </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="tablet-now-active show-on-tablet">
                <div class="tablet-now-active-ctn">
                    <h3>Now active:</h3>
                    <p>You</p>
                    @for ($i = 0; $i < 3; $i++)
                        @if ($students[$i]->studentid == $studentData->studentid)
                            <p></p>
                        @else
                            <p> , {{ $students[$i]->studentfirstname }} </p>
                        @endif
                    @endfor
                    <p>...</p>
                </div>

                <button onclick="openParticipants()">Show more</button>
            </div>

            <div class="participants show-on-tablet">
                <svg class="modal-close" onclick="closeParticipants()" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_di_377_3526)">
                    <path d="M18 1.5C15.5277 1.5 13.111 2.23311 11.0554 3.60663C8.99976 4.98015 7.39761 6.93238 6.45151 9.21645C5.50542 11.5005 5.25787 14.0139 5.74019 16.4386C6.2225 18.8634 7.41301 21.0907 9.16117 22.8388C10.9093 24.587 13.1366 25.7775 15.5614 26.2598C17.9861 26.7421 20.4995 26.4946 22.7835 25.5485C25.0676 24.6024 27.0199 23.0002 28.3934 20.9446C29.7669 18.889 30.5 16.4723 30.5 14C30.5 12.3585 30.1767 10.733 29.5485 9.21645C28.9203 7.69989 27.9996 6.3219 26.8388 5.16116C25.6781 4.00043 24.3001 3.07969 22.7835 2.45151C21.267 1.82332 19.6415 1.5 18 1.5ZM21.3875 15.6125C21.5047 15.7287 21.5977 15.867 21.6611 16.0193C21.7246 16.1716 21.7573 16.335 21.7573 16.5C21.7573 16.665 21.7246 16.8284 21.6611 16.9807C21.5977 17.133 21.5047 17.2713 21.3875 17.3875C21.2713 17.5047 21.133 17.5976 20.9807 17.6611C20.8284 17.7246 20.665 17.7572 20.5 17.7572C20.335 17.7572 20.1716 17.7246 20.0193 17.6611C19.867 17.5976 19.7287 17.5047 19.6125 17.3875L18 15.7625L16.3875 17.3875C16.2713 17.5047 16.133 17.5976 15.9807 17.6611C15.8284 17.7246 15.665 17.7572 15.5 17.7572C15.335 17.7572 15.1716 17.7246 15.0193 17.6611C14.867 17.5976 14.7287 17.5047 14.6125 17.3875C14.4953 17.2713 14.4024 17.133 14.3389 16.9807C14.2754 16.8284 14.2428 16.665 14.2428 16.5C14.2428 16.335 14.2754 16.1716 14.3389 16.0193C14.4024 15.867 14.4953 15.7287 14.6125 15.6125L16.2375 14L14.6125 12.3875C14.3771 12.1521 14.2449 11.8329 14.2449 11.5C14.2449 11.1671 14.3771 10.8479 14.6125 10.6125C14.8479 10.3771 15.1671 10.2449 15.5 10.2449C15.8329 10.2449 16.1521 10.3771 16.3875 10.6125L18 12.2375L19.6125 10.6125C19.8479 10.3771 20.1671 10.2449 20.5 10.2449C20.8329 10.2449 21.1521 10.3771 21.3875 10.6125C21.6229 10.8479 21.7551 11.1671 21.7551 11.5C21.7551 11.8329 21.6229 12.1521 21.3875 12.3875L19.7625 14L21.3875 15.6125Z" fill="white"/>
                    </g>
                    <defs>
                    <filter id="filter0_di_377_3526" x="0.5" y="0.5" width="35" height="35" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="4"/>
                    <feGaussianBlur stdDeviation="2.5"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_377_3526"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_377_3526" result="shape"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.156863 0 0 0 0 0.392157 0 0 0 0.65 0"/>
                    <feBlend mode="normal" in2="shape" result="effect2_innerShadow_377_3526"/>
                    </filter>
                    </defs>
                </svg>
    
                <div class="participants-ctn">
                    <div class="profile-info">
                        <div class="img" style="background-image: url('{{ asset($studentData->profile) }}')"></div>
                        <div>
                            <h3>You</h3>
                            <p> {{ $studentData->studentid}} </p>
                        </div>
                    </div>

                    @foreach ($students as $student)
                        @if ($student->studentid != $studentData->studentid)
                        <div class="profile-info">
                            <div class="img" style="background-image: url('{{ asset($student->profile) }}')"></div>
                            <div>
                                <h3> {{ $student->studentlastname . ' ' . $student->studentfirstname }} </h3>
                                <p> {{ $student->studentid}} </p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
    
            <div class="chatroom student-chatroom">
                <div class="chats">
                    @foreach ($chats as $chat)
                        @if ($chat->sender == $studentData->studentid)
                            <div class="chat you">
                                <p class="sender">You</p>
                                <p>{{ $chat->message }}</p>
                                <span>{{ substr($chat->time, 0, 5) }}</span>
                            </div>
                        @else
                            <div class="chat">
                                <p class="sender">{{ getName($chat->sender) }}</p>
                                <p>{{ $chat->message }}</p>
                                <span>{{ substr($chat->time, 0, 5) }}</span>
                            </div>
                        @endif
                        
                    @endforeach
                    
                </div>
    
                <form action="{{ route('chat') }}" method="post" enctype="multipart/form-data" class="send-message">
                    @csrf
    
                    <svg width="1284" height="1284" viewBox="0 0 1284 1284" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M642 1284C812.269 1284 975.564 1216.36 1095.96 1095.96C1216.36 975.564 1284 812.269 1284 642C1284 471.731 1216.36 308.436 1095.96 188.037C975.564 67.6391 812.269 0 642 0C471.731 0 308.436 67.6391 188.037 188.037C67.6391 308.436 0 471.731 0 642C0 812.269 67.6391 975.564 188.037 1095.96C308.436 1216.36 471.731 1284 642 1284V1284ZM561.75 521.625C561.75 561.83 548.589 553.404 528.446 540.484C515.205 531.977 498.994 521.625 481.5 521.625C464.006 521.625 447.795 532.058 434.554 540.484C414.411 553.404 401.25 561.75 401.25 521.625C401.25 455.178 437.202 401.25 481.5 401.25C525.798 401.25 561.75 455.178 561.75 521.625ZM989.563 762.375C996.606 774.575 1000.31 788.413 1000.31 802.5C1000.31 816.587 996.606 830.425 989.563 842.625C954.352 903.644 903.691 954.312 842.677 989.532C781.663 1024.75 712.449 1043.28 642 1043.25C571.564 1043.26 502.367 1024.73 441.368 989.512C380.37 954.293 329.721 903.632 294.518 842.625C287.478 830.431 283.77 816.6 283.766 802.521C283.762 788.441 287.463 774.608 294.497 762.411C301.531 750.213 311.65 740.082 323.838 733.032C336.026 725.983 349.854 722.264 363.934 722.25H920.066C934.153 722.25 947.991 725.959 960.19 733.002C972.389 740.045 982.52 750.176 989.563 762.375ZM849.446 540.484C836.205 531.977 819.994 521.625 802.5 521.625C785.006 521.625 768.795 532.058 755.554 540.484C735.411 553.404 722.25 561.75 722.25 521.625C722.25 455.178 758.202 401.25 802.5 401.25C846.798 401.25 882.75 455.178 882.75 521.625C882.75 561.83 869.589 553.404 849.446 540.484V540.484Z" fill="#002865"/>
                    </svg>
    
                    <input type="text" name="message" id="message" placeholder="Type a message..">
    
                    <button type="submit">
                        <svg width="1344" height="1319" viewBox="0 0 1344 1319" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1330.29 639.533L35.8502 2.53237C30.5889 -0.0496577 24.5538 -0.657188 18.8283 0.709766C5.67497 3.89932 -2.52651 16.9613 0.723132 30.0233L134.113 564.958C136.125 573.008 142.16 579.539 150.206 582.121L378.764 659.126L150.361 736.131C142.315 738.865 136.279 745.244 134.423 753.294L0.723132 1288.99C-0.66957 1294.61 -0.0505845 1300.53 2.58007 1305.54C8.61512 1317.54 23.4706 1322.4 35.8502 1316.48L1330.29 683.123C1335.09 680.845 1338.96 676.896 1341.43 672.34C1347.47 660.189 1342.51 645.608 1330.29 639.533ZM153.301 1136.8L231.138 824.527L687.944 670.669C691.503 669.454 694.443 666.72 695.681 663.075C697.848 656.696 694.443 649.861 687.944 647.583L231.138 493.876L153.611 182.818L1125.41 661.1L153.301 1136.8Z" fill="#002865"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection