<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Lista vozila</h1>
    <br><br>
    <ul>
        @forelse($cars as $car)
            <li>{{ $car->make }} {{ $car->model }} ({{ $car->year }}) - {{ $car->color }} - Vlasnik: {{ $car->user->name }}
                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color:red; border:none; background:none; cursor:pointer"
                        onclick="return confirm('Jeste li sigurni da želite obrisati ovo vozilo?')">Obriši</button>
                </form>
            </li>
        @empty
            <li>Nema dostupnih vozila u bazi.</li>
        @endforelse
    </ul>

    <br><br>

    <a href="{{ route('cars.create') }}" style="color:blue">Dodaj novo vozilo</a>

</body>

</html>