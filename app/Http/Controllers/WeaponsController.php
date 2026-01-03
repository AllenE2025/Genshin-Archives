<?php

namespace App\Http\Controllers;

use App\Models\Weapons;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WeaponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Weapons', ['weapons' => Weapons::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Weapons/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:weapons,name',
            'weapon_type' => 'required|string',
            'base_attack' => 'required|integer',
            'sub_stat_type' => 'required|string',
            'sub_stat' => 'required|integer',
            'rarity' => 'required|integer|in:3,4,5',
            'passive' => 'required|string',
        ]);

        Weapons::create($validated);

        return redirect()->route('weapons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weapons $weapons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weapons $weapon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Weapons $weapon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weapons $weapon)
    {
        $weapon->delete();

        return redirect()->route('weapons.index');
    }
}
