<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlineRequest;
use App\Http\Requests\UpdateAirlineRequest;
use App\Models\Airline;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Airline::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAirlineRequest $request)
    {
        $airline = new Airline();
        $airline->fill($request->all());
        $airline->save();

        return response()->json($airline, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Airline::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirlineRequest $request, $id)
    {
        $airline = Airline::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $airline = Airline::find($id);
        $airline->delete();

        return response()->json(null, 204);
    }
}
