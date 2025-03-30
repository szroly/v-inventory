<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\First_Aids;

class FirstAidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return First_Aids::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return First_Aids::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return First_Aids::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $first_aid = First_Aids::find($id);
        $first_aid->update($request->all());
        return $first_aid;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return First_Aids::destroy($id);
    }
}
