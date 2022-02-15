<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>Unilorin VLE</title>
</head>
<body>
    <section class="home home-index">
        <img src="{{ asset('images/logo.png') }}" alt="Go">
        <h1>University of Ilorin Virtual Learning Environment</h1>

        <div class="home-btns">
            <a href="{{ Route('student_login') }}" class="normal-btn">I'm a Student</a>
            <a href="{{ Route('lecturer_login') }}" class="normal-btn">I'm a Lecturer</a>
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>