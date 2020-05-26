<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
/*
 * Formulaire de requête utilisé (avec un alias 'as CompetenceRequest')
 */

use App\Http\Requests\Competence as CompetenceRequest;
use App\Competence;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competences = Competence::all();
        //dd($competences);
        return view('CompetenceIndex', compact('competences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CompetenceCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $Competencerequest
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceRequest $competenceRequest)
    {
        Competence::create($competenceRequest->all());
        return redirect()->route('competence.index')->with('information', 'Enregistrement effectué avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param object modèle compétence $competence
     * @return \Illuminate\Http\Response
     */
    public function show(Competence $competence)
    {
        return view('CompetenceShow', compact('competence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competence $competence)
    {
        return view('CompetenceEdit', compact('competence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request\Competence $CompetenceRequest
     * @param object modèle compétence $competence
     * @return \Illuminate\Http\Response
     */
    public function update(CompetenceRequest $competenceRequest, Competence $competence)
    {
        $competence->update($competenceRequest->all());
        return redirect()->route('competence.index')->with('information', 'Modification effectué avec succès');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param object modèle compétence $competence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return back()->with('information','Suppression effectué avec succès');
    }
}
