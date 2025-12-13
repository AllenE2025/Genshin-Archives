<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Characters', [
            'characters' => Characters::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Characters/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required|string'
        ]);

        Characters::create($validated);

        return redirect()->route('characters.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Characters $characters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Characters $character)
    {
        return Inertia::render('Characters/Edit', [
            'character' => $character,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Characters $character)
    {
        $validated=$request->validate([
            'name'=>'required|string'
        ]);

        $character->update($validated);

        return redirect()->route('characters.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Characters $character)
    {
        $character->delete();

        return redirect()->route('characters.index');
    }
}
