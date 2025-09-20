<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @auth
        <form action="{{  route('cars.store') }}" method="post"
            style="border 1px solid black; max-width:400px; margin: auto; padding: 20px;">
            @csrf
            <div>
                <label>Make: <br>
                    <input type="text" name="make" id="make" value="{{ old('make')  }}">
                </label>
                @error('make')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <label>Model: <br>
                    <input type="text" name="model" id="model" value="{{ old('model')  }}">
                </label>
                @error('model')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <label>Year: <br>
                    <input type="number" name="year" id="year" value="{{ old('year')  }}">
                </label>
                @error('year')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <label>Color: <br>
                    <input type="text" name="color" id="color" value="{{ old('color')  }}">
                </label>
                @error('color')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <button type="submit">Dodaj vozilo</button>
            </div>
        </form>
    @else
        <p>Molimo prijavite se.</p>
        <br><br>
        <a href="{{ route('login') }}" style="color:blue">Prijava</a>

    @endauth



</body>

</html>