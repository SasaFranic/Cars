<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portum - Prijava</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
        }

        h1 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            font-weight: 700;
            font-size: 1.2rem;
            color: #3498db;
            padding: 12px 30px;
            border-radius: 10px;
            transition: 0.3s;
        }

        nav ul li a:hover {
            background-color: #3498db;
            color: #fff;
            transform: scale(1.05);
        }

        form {
            background: #fff;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 20px 0;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .message {
            font-size: 0.95rem;
            margin-bottom: 10px;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }

        .logout-button {
            margin-top: 20px;
        }

    </style>
</head>

<body>
    @auth
        <h1>Dobrodošli, {{$user}}</h1>

        <nav>
            <ul>
                <li><a href="/cars">Vaši Automobili</a></li>
            </ul>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="logout-button">
            @csrf
            <button type="submit">Odjava</button>
        </form>
    @else
        <h1>Prijava</h1>

        @if (session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        <form action="{{ url('/obrada') }}" method="post">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="message error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Lozinka:</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}">
                @error('password')
                    <div class="message error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">Prijava</button>
            </div>
        </form>
    @endauth
</body>

</html>
