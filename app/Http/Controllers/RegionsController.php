<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Regions', [
            'regions' => Regions::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Regions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated=$request->validate([
            'name'=>'required|string|unique:regions,name',
            'description'=>'required|string',
            'local_specialty'=>'required|string',
            'elite_boss'=>'required|string',
            'world_boss'=>'required|string'
        ]);

        Regions::create($validated);

        return redirect()->route('regions.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Regions $regions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regions $region)
    {
        return inertia('Regions/Edit', [
            'region' => $region,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regions $region)
    {
        $validated=$request->validate([
            'name'=>['required','string',Rule::unique('regions')->ignore($region->id)],
            'description'=>'required|string',
            'local_specialty'=>'required|string',
            'elite_boss'=>'required|string',
            'world_boss'=>'required|string'
        ]);
        $region->update($validated);
        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regions $region)
    {
        $region->delete();

        return redirect()->route('regions.index');
    }
}
