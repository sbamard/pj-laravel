<?php

namespace App\Http\Controllers;

use App\Professionnel;
use App\Metier;
use App\Http\Requests\Professionnel as ProfessionnelRequest;

//noter l'alias

//use Illuminate\Http\Request;


class ProfessionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($slug = null)
    {
        //creer un objet unique pour les 2 cas : avec ou sans slug
        $obProfessionnels = $slug ?
            Metier::where('slug','=', $slug)->firstOrFail()->professionnels:
            Professionnel::query();
        //recuperation de la liste
        $professionnels = $obProfessionnels->get();

        $metiers = Metier::all();
        //enfin en réponse la vue
        return view('professionnelIndex', compact('professionnels', 'metiers', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
