<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'make.required' => 'Molimo unesite marku vozila.',
            'model.required' => 'Molimo unesite model vozila.',
            'year.required' => 'Molimo unesite godinu proizvodnje.',
            'color.required' => 'Molimo unesite boju vozila.',
            'user_id.required' => 'Molimo prijavite se.',
        ];

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Molimo prijavite se.');
        }

        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1886|max:' . (date('Y') + 1),
            'color' => 'required|string|max:50',
        ], $messages);

        $validatedData['user_id'] = Auth::id();

        Car::create($validatedData);

        return redirect()->route('cars.index')->with('success', 'Novo vozilo je uspješno dodano.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        if ($car->user_id !== Auth::id()) {
            abort(403);
        }

        return view('cars.edit', compact('car'));

    }


    public function update(Request $request, Car $car)
    {
        if ($car->user_id !== Auth::id()) {
            abort(403);
        }

        $messages = [
            'make.required' => 'Molimo unesite marku vozila.',
            'model.required' => 'Molimo unesite model vozila.',
            'year.required' => 'Molimo unesite godinu proizvodnje.',
            'color.required' => 'Molimo unesite boju vozila.',
        ];

        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1886|max:' . (date('Y') + 1),
            'color' => 'required|string|max:50',
        ], $messages);

        $car->update($validatedData);

        return redirect()->route('cars.index')->with('success', 'Vozilo uspješno ažurirano.');
    }

    public function destroy(Car $car)
    {
        if ($car->user_id !== Auth::id()) {
            abort(403);
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Vozilo uspješno obrisano.');
    }
}
