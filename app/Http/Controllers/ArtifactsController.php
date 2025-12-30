<?php

namespace App\Http\Controllers;

use App\Models\Artifacts;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class ArtifactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Artifacts', [
            'artifacts' => Artifacts::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Artifacts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:artifacts,name',
            'two_piece_bonus' => 'required|string|max:255',
            'four_piece_bonus' => 'required|string|max:255',
            'rarity'=>'required|integer|in:3,4,5',
        ]);

        Artifacts::create($validated);

        return redirect()->route('artifacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artifacts $artifacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artifacts $artifact)
    {
        return inertia('Artifacts/Edit', [
            'artifact' => $artifact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artifacts $artifact)
    {
         $validated=$request->validate([
            'name'=>['required','string', Rule::unique('artifacts')->ignore($artifact->id)],
            'two_piece_bonus'=>'required|string',
            'four_piece_bonus'=>'required|string',
            'rarity'=>'required|integer|in:3,4,5',
        ]);

        $artifact->update($validated);

        return redirect()->route('artifacts.index');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artifacts $artifact)
    {
        $artifact->delete();

        return redirect()->route('artifacts.index');
    }
}
