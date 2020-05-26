<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
/*
 * Formulaire de requête utilisé (avec un alias 'as MetierRequest')
 */

use App\Http\Requests\Metier as MetierRequest;
use App\Metier;
use function Sodium\add;

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
        //dd($metiers);
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
     * @param \Illuminate\Http\Request $Metierrequest
     * @return \Illuminate\Http\Response
     */
    public function store(MetierRequest $metierRequest)
    {
        Metier::create($metierRequest->all());
        return redirect()->route('metier.index')->with('information', 'Enregistrement effectué avec succès');
    dd($metierRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param object modèle compétence $metier
     * @return \Illuminate\Http\Response
     */
    public function show(Metier $metier)
    {
        return view('MetierShow', compact('metier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Metier $metier)
    {
        return view('MetierEdit', compact('metier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MetierRequest $metierRequest
     * @param Metier $metier
     * @return \Illuminate\Http\Response
     */
    public function update(MetierRequest $metierRequest, Metier $metier)
    {
        $metier->update($metierRequest->all());
        return redirect()->route('metier.index')->with('information', 'Modification effectué avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param object modèle compétence $metier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metier $metier)
    {
        $metier->delete();
        return back()->with('information', 'Suppression effectué avec succès');
    }
}
