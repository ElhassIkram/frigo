<?php

namespace App\Http\Controllers;

use App\Models\Conditionnement;
use Illuminate\Http\Request;
use App\Http\Requests\ConditionnementRequest;

class ConditionnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditionnements = Conditionnement::all();
        return view('conditionnements.index', compact('conditionnements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conditionnements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConditionnementRequest $request)
    {
        Conditionnement::create($request->validated());
        return redirect()->route('conditionnements.index')->with('success', 'Conditionnement créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
    public function show(Conditionnement $conditionnement)
    {
        return view('conditionnements.show', compact('conditionnement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
    public function edit(Conditionnement $conditionnement)
    {
        return view('conditionnements.edit', compact('conditionnement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
 // Méthode update
public function update(ConditionnementRequest $request, Conditionnement $conditionnement)
{
    $conditionnement->update($request->validated());
    return redirect()->route('conditionnements.index')->with('success', 'Conditionnement mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conditionnement  $conditionnement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conditionnement $conditionnement)
    {
        $conditionnement->delete();
        return redirect()->route('conditionnements.index')->with('success', 'Conditionnement supprimé avec succès.');
    }
}
