@extends('layouts.lecturer_default')
@php ($page = 'courses')

@section('page-content')
    <div class="courses-menu">
        <div class="courses-menu-frame">
            <h1>{{ $courseCode }} Library</h1>
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
            <li class="sec-active"><a href="{{ Route('lecturer_library_cm', ['courseCode' => $courseCode]) }}"><h3>Course Materials</h3></a></li>
            <li><a href="{{ Route('lecturer_library_rc', ['courseCode' => $courseCode]) }}"><h3>Recorded Classes</h3></a></li>
        </ul>
    </nav>

    <div class="form-error" style="position: absolute; top: 290px">
        <p>@error('file') {{ $message }} @enderror</p>
        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif

        @if ($message = Session::get('fail'))
            <p>{{ $message }}</p>
        @endif
    </div>

    <ul class="library-cards lecturer-library-cards lecturer-course-material">
        <li class="normal-card add-new-material">
            <div class="card-a" onclick="openModal()">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0H12V12H0V18H12V30H18V18H30V12H18V0Z" fill="#002865"/>
                </svg>
            </div>
        </li>
        @foreach ($courseMaterials as $courseMaterial)
            <li class="normal-card menu">
                <div class="card-a">
                    <h3>{{ $courseMaterial->materialid }}</h3>
                </div>
                <div class="floating-menu">
                    <div class="floating-menu-shadow"></div>
                    <ul>
                        <li><a href="{{ Route('lecturer_download_material', ['courseCode' => $courseCode, 'materialPath' => $courseMaterial->materialid]) }}"><h3>Download</h3></a></li>
                        
                        <form action="{{ Route('lecturer_delete_material', ['courseCode' => $courseCode, 'materialID' => $courseMaterial->materialid]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{method_field('DELETE')}}
                            <input name="_method" type="hidden" value="DELETE">
                            <li><button type="submit" name="delete" style="border: none; background: none"> <h3>Delete</h3></button></li>
                        </form>
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>

    @include('modals.add_material')
@endsection