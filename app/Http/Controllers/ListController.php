<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Lists::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'url' => 'nullable|url'
        ]);

        return Lists::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Lists::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lists = Lists::findOrFail($id);
        $lists->update($request->all());

        return $lists;
    }

    /**
     * Search by name.
     */
    public function search($name)
    {
        return Lists::where('name', 'like', '%' . $name . '%')->get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Lists::destroy($id);
    }
}
