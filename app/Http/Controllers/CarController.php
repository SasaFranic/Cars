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
        //return 'radi index';
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
        $validatedData = $request->validate(
            [
                'make' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'year' => 'required|integer|min:1886|max:' . (date('Y') + 1),
                'color' => 'required|string|max:50',
                'user_id' => 'required|exists:users,id',
            ],
            [
                'make.required' => 'Molimo unesite marku vozila.',
                'model.required' => 'Molimo unesite model vozila.',
                'year.required' => 'Molimo unesite godinu proizvodnje.',
                'color.required' => 'Molimo unesite boju vozila.',
                'user_id.required' => 'Molimo prijavite se.',
            ]
        );

        Car::create([
            'make' => $validatedData['make'],
            'model' => $validatedData['model'],
            'year' => $validatedData['year'],
            'color' => $validatedData['color'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('cars.index')->with('success', 'Vozilo je uspješno dodano.');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
