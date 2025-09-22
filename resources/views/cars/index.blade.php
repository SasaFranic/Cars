<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portum - Lista vozila</title>
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

        .message {
            font-size: 1rem;
            margin: 10px 0;
            padding: 10px 15px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        ul {
            list-style: none;
            padding: 0;
            width: 100%;
            max-width: 600px;
        }

        li {
            background: #fff;
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .actions form {
            margin: 0;
        }

        .car-info {
            flex: 1;
        }

        li form {
            margin: 0;
        }

        li .edit-button {
            background-color: #19dc6aff;
            color: #fff
        }

        li button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        li button:hover {
            background-color: #c0392b;
        }

        .logout-button {
            margin-top: 20px;
        }

        a.add-car {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        a.add-car:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>

    <h1>Lista vozila</h1>

    @if (session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="message error">{{ session('error') }}</div>
    @endif

    <ul>
        @forelse($cars as $car)
            <li>
                <span class="car-info">{{ $car->make }} {{ $car->model }} ({{ $car->year }}) - {{ $car->color }} - Vlasnik:
                    {{ $car->user->name }}</span>

                <div class="actions">
                    <form action="{{ route('cars.edit', $car->id) }}" method="GET">
                        @csrf
                        @method('PUT')
                        <button class="edit-button" type="submit">Uredi</button>
                    </form>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Jeste li sigurni da želite obrisati ovo vozilo?')">Obriši</button>
                    </form>
                </div>
            </li>
        @empty
            <li>Nema dostupnih vozila u bazi.</li>
        @endforelse
    </ul>

    @auth
        <form action="{{ route('logout') }}" method="POST" class="logout-button">
            @csrf
            <button type="submit">Odjava</button>
        </form>
    @endauth

    <a href="{{ route('cars.create') }}" class="add-car">Dodaj novo vozilo</a>


</body>

</html>