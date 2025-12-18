<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use Illuminate\Http\Request;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Regions');
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
    public function edit(Regions $regions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Regions $regions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regions $regions)
    {
        //
    }
}
