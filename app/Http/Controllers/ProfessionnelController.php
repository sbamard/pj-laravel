<?php

namespace App\Http\Controllers;

use App\Professionnel;
use App\Competence;
use App\Metier;
use App\Http\Requests\Professionnel as ProfessionnelRequest; //Noter l'alias//
//use Illuminate\Http\Request;

class ProfessionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug=null)
    {
        //Créer un objet unique pour les deux cas de figure : avec ou sans slug
        $obProfessionnels = $slug ?
            Metier::where('slug', '=', $slug)->firstOrFail()->professionnels():
            Professionnel::query();

        //Récupération de la liste
        $professionnels = $obProfessionnels->get();
        $metiers = Metier::all()->sortBy('libelle');

        //enfin en réponse la vue
        return view('ProfessionnelIndex', compact('professionnels', 'metiers', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competences = Competence::all()->sortBy('libelle'); //Trier par ordre alphabétique
        $metiers = Metier::all();
        return view('ProfessionnelCreate', compact('metiers', 'competences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Professionnel $professionnelRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionnelRequest $professionnelRequest)
    {
        //Récupération des données validées dans un tableau
        $valeursDuFormulaire = $professionnelRequest->all();
        //Convertir la rubrique domaine de tableau vers une liste de valeur
        $laConversion = implode(',', $professionnelRequest->input('domaine'));
        //Affectation de la chaine ($laConversion) à la propriété domaine de $valeursDuFormulaire
        $valeursDuFormulaire['domaine'] = $laConversion;
        //Enregistrement en BD puis récupération principalement de l'identifiant créé
        $professionnel = Professionnel::create($valeursDuFormulaire);
        //Enregistrement dans la table pivot
        $professionnel->competences()->attach($professionnelRequest->comp);
        return redirect()->route('professionnel.index')->with('information', 'Le professionnel a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  objet $professionnel
     * @return \Illuminate\Http\Response
     */
    public function show(Professionnel $professionnel)
    {

        $tabDomaine = explode(',', $professionnel->domaine);
        $professionnel->domaine = $tabDomaine;
        $metier = $professionnel->metier->libelle;
//        dd($professionnel);
        return view('ProfessionnelShow', compact('professionnel', 'metier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  objet $professionnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Professionnel $professionnel)
    {
        $tabDomaine = explode(',', $professionnel->domaine);
        $professionnel->domaine = $tabDomaine;
        $metiers = Metier::all();
        return view('ProfessionnelEdit', compact('professionnel', 'metiers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Http\Requests\Professionnel $professionnelRequest
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionnelRequest $professionnelRequest, Professionnel $professionnel)
    {
        //Récupération des données validées dans un tableau
        $valeursDuFormulaire = $professionnelRequest->all();
        //Convertir la rubrique domaine de tableau vers une liste de valeur
        $laConversion = implode(',', $professionnelRequest->input('domaine'));
        //Affectation de la chaine ($laConversion) à la propriété domaine de $valeursDuFormulaire
        $valeursDuFormulaire['domaine'] = $laConversion;
        //Enregistrement en BD
        $professionnel->update($valeursDuFormulaire);
        return redirect()->route('professionnel.index')->with('information', 'Le professionnel a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object modèle compétence $professionnel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professionnel $professionnel)
    {
        $professionnel->delete();
        return back()->with('information','Supression effectuée avec succès.');
    }
}
