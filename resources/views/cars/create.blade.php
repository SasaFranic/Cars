<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portum - Dodaj vozilo</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
        }

        h1 {
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            background: #fff;
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
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
            color: red;
        }

        .login-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;
            font-weight: 600;
            transition: 0.3s;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .logout-button {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    @auth
        <h1>Dodaj vozilo</h1>

        <form action="{{ route('cars.store') }}" method="post">
            @csrf

            <div>
                <label for="make">Make:</label>
                <input type="text" name="make" id="make" value="{{ old('make') }}">
                @error('make')
                    <div class="message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="model">Model:</label>
                <input type="text" name="model" id="model" value="{{ old('model') }}">
                @error('model')
                    <div class="message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="year">Year:</label>
                <input type="number" name="year" id="year" value="{{ old('year') }}">
                @error('year')
                    <div class="message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="color">Color:</label>
                <input type="text" name="color" id="color" value="{{ old('color') }}">
                @error('color')
                    <div class="message">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">Dodaj vozilo</button>
            </div>
        </form>
    @else
        <p>Molimo prijavite se.</p>
        <a href="{{ route('login') }}" class="login-link">Prijava</a>
    @endauth

    @auth
        <form action="{{ route('logout') }}" method="POST" class="logout-button">
            @csrf
            <button type="submit">Odjava</button>
        </form>
    @endauth

</body>

</html>
