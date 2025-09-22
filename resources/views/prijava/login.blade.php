<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @auth
        <h1>Dobrodošli, {{$user}}</h1>
        <br><br>
        <nav>
            <ul>
                <li><a href="/cars" style="color:blue">Vaši Automobili</a></li>
            </ul>
        </nav>
    @else
        <h1>Prijava</h1>
        <br><br>
        @if (session('success'))
            <div style="color: green; margin: 10px 0">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div style="color: red; margin: 10px 0">{{ session('error') }}</div>
        @endif
        <br><br>
        <form action="{{  url('/obrada') }}" method="post" style="border 1px solid black; max-width:400px; margin: auto">
            @csrf
            <div>
                <label>Email: <br>
                    <input type="email" name="email" id="email" value="{{ old('email')  }}">
                </label>
                @error('email')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>Lozinka: <br>
                    <input type="password" name="password" id="password" value="{{ old('password') }}">
                </label>
                @error('password')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">Prijava</button>
            </div>
        </form>

    @endauth
    <br><br>
    @auth
        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit">Odjava</button>
        </form>
    @endauth



</body>

</html>