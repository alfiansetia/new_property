<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('backend.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.city.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:50|unique:cities,name',
        ]);
        City::create([
            'name'      => $request->name,
        ]);
        return redirect()->route('backend.cities.index')->with('message', 'Success Add Data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('backend.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name'      => 'required|max:50|unique:cities,name,' . $city->id,
        ]);
        $city->update([
            'name'      => $request->name,
        ]);
        return redirect()->route('backend.cities.index')->with('message', 'Success Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('backend.cities.index')->with('message', 'Success Delete Data!');
    }
}
