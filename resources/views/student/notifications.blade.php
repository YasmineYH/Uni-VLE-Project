@extends('layouts.student_default')
@php ($page = 'notifications')

@section('page-content')
    <h1>Notifications</h1>

    <div class="notif-box">
        <div class="notif holding-now">
            <div class="img"></div>
            <div>
                <h3>CSC 441 class is holding now. Click to join.</h3>
                <p>Today - NOW</p>
            </div>
        </div>
        <div class="notif">
            <div class="img"></div>
            <div>
                <h3>Mr. S.A. Mojeed started a class for CSC 441.</h3>
                <p>Today - 10:00am </p>
            </div>
        </div>
        <div class="notif">
            <div class="img"></div>
            <div>
                <h3>Mrs. S.A. Salihu gave out a new assignment.</h3>
                <p>Yesterday - 12:30pm</p>
            </div>
        </div>
        <div class="notif">
            <div class="img"></div>
            <div>
                <h3>CSC 447 assignment is due today.</h3>
                <p>06/08/2021 - 7:30am</p>
            </div>
        </div>
        <div class="notif">
            <div class="img"></div>
            <div>
                <h3>CSC 447 assignment’s due date is in 2 days.</h3>
                <p>04/08/2021 - 1:45pm</p>
            </div>
        </div>
    </div>
@endsection