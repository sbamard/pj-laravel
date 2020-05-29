<?php

namespace App\Http\Controllers;

use App\Metier;

//Formulaire de requête utilisé (noter l'alias)
use App\Http\Requests\Metier as MetierRequest;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metiers = Metier::all();
        return view('MetierIndex', compact('metiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MetierCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Metier  $MetierRequest
     * @return \Illuminate\Http\Response
     */
    public function store(MetierRequest $metierRequest)
    {
        Metier::create($metierRequest->all());

        return redirect()->route('metier.index')->with('information','Enregistrement effectué avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  object modèle métier $metier
     * @return \Illuminate\Http\Response
     */
    public function show(Metier $metier)
    {
        return view('MetierShow', compact('metier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object modèle métier $metier
     * @return \Illuminate\Http\Response
     */
    public function edit(Metier $metier)
    {
        return view('MetierEdit', compact('metier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Metier  $MetierRequest
     * @param  object modèle métier $metier
     * @return \Illuminate\Http\Response
     */
    public function update(MetierRequest $metierRequest, Metier $metier)
    {
        $metier->update($metierRequest->all());
        return redirect()->route('metier.index')->with('information','Modification effectuée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object modèle métier $metier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metier $metier)
    {
        $metier->delete();
        return redirect()->route('metier.index')->with('information','Suppression effectuée avec succès.');
    }


    /**
     * Appel formulaire en suppression.
     *
     * @param  Metier $metier
     * @return \Illuminate\Http\Response
     */

    public function showDestroy(Metier $metier)
    {
        return view('MetierDestroy', compact('metier'));
    }

}
