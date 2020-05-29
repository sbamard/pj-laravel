<?php

namespace App\Http\Controllers;

use App\Competence;

//Formulaire de requête utilisé (noter l'alias)
use App\Http\Requests\Competence as CompetenceRequest;

use App\User;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pour recup la valeur name='recherche' : $request->input('recherche')
        if ($request->input('recherche')) {
            $val = $request->input('recherche');
            $competences = Competence::where('libelle', 'LIKE', '%' . $val . '%')->oldest('libelle')->paginate(5);
            } else {
            $competences = Competence::oldest('libelle')->paginate(5);
        }
        return view('CompetenceIndex', compact('competences'));
    }
//
//        $competences = Competence::oldest('libelle')->paginate(5);
//        //dd($competences); //Pour faire un vardump
//        return view('CompetenceIndex', compact('competences'));


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
     * @param App\Http\Requests\Competence $CompetenceRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CompetenceRequest $competenceRequest)
    {
        Competence::create($competenceRequest->all());

        return redirect()->route('competence.index')->with('information', 'Enregistrement effectué avec succès.');
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
     * @param object modèle compétence $competence
     * @return \Illuminate\Http\Response
     */
    public function edit(Competence $competence)
    {
        return view('CompetenceEdit', compact('competence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests\Competence $CompetenceRequest
     * @param object modèle compétence $competence
     * @return \Illuminate\Http\Response
     */
    public function update(CompetenceRequest $competenceRequest, Competence $competence)
    {
        $competence->update($competenceRequest->all());
        return redirect()->route('competence.index')->with('information', 'Modification effectuée avec succès.');

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
        return back()->with('information', 'Supression effectuée avec succès.');
    }
}
