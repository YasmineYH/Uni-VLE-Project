@extends('layouts.message')

@section('page-content')
    <div class="modal message" style="visibility: visible; width: 100%; left: 0; height: calc(var(--vh) * 100)">
        <div class="modal-box">
            <div class="modal-content modal-content-confirm">
                <h3 style="margin-top: -10px; margin-bottom: 40px; text-align: center">First step completed! Click OK to move to the next steps.</h3>
                
            </div>
        </div>
    </div>
@endsection