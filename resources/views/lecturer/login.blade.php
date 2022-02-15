<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>Unilorin VLE | Lecturer Login</title>
</head>
<body>
    <section class="home">
        <div style="display: grid; place-items: center">
            <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px"></a>
            <h1>Lecturer Login</h1>
        </div>

        <form action="{{ route('lecturer_login_check') }}" method="post" class="login-form">
            <div class="form-error">
                @if (Session::get('fail'))
                    <p>{{ Session::get('fail') }}</p>
                @endif
            </div>
            @csrf
            <span class="input-error">@error('Lecturer_ID') {{ $message }} @enderror</span>
            <label for="Lecturer_ID"><h3>Staff ID:</h3></label>
            <input type="text" name="Lecturer_ID" id="Lecturer_ID" value="{{ old('Lecturer_ID') }}">

            <span class="input-error">@error('Password') {{ $message }} @enderror</span>
            <label for="Password"><h3>Password:</h3></label>
            <input type="password" name="Password" id="Password">

            <button type="submit" class="normal-btn">Login</button>
        </form>
    </section>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>