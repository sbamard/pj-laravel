@extends('cvtheque')

@section('contenu')

    <div class="row mt-5 mb-5">
        <div class="col-md-5 d-none d-md-block titre">
            <h4>Consultation d'un professionnel</h4>
        </div>
    </div>

    <div class="row">
        <form class="row col-md-12" action="">
            <div class="col-md-10">

                <div class="form-group row mb-2">
                    <label for="metier" class="col-md-2 col-form-label text-left">Métier principal :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="metier"
                                name="metier" value="{{ $professionnel->metier->libelle }}" readonly>
                    </div>
                </div>
                <!-- Fin select metier -->


                <div class="form-group row mt-2">
                    <div class="form-group col">
                        <label for="prenom" class="col-form-label">Prénom :</label>
                        <div class="col">
                            <input type="text" class="form-control"id="prenom" name="prenom" value="{{ $professionnel->prenom }}" readonly>
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="nom" class="col-form-label">Nom :</label>
                        <div class="col">
                            <input type="text" class="form-control" id="nom" name="nom" value="{{ $professionnel->nom }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cp" class="col-md-2 col-form-label text-left">Code postal :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="cp" name="cp" value="{{ $professionnel->cp }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ville" class="col-md-2 col-form-label text-left">Ville :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="ville" name="ville" value="{{ $professionnel->ville }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="telephone" class="col-md-2 col-form-label text-left">N° téléphone :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $professionnel->telephone }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-left">Adresse email :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $professionnel->email }}" readonly>
                    </div>
                </div>

                <div class="form-check form-check-inline">
                    <label for="formation"><strong>Actions de formation déjà effectuées ?</strong></label>
                </div>
                <div class="form-check form-check-inline">
                    @if($professionnel->formation==1) Oui @else Non (jamais ou trop peu) @endif
                </div>

                <div class="form-group row">
                    <div class="form-check form-check-inline">
                        <label for="domaine"><strong>Domaines de formation possibles :</strong></label>
                    </div>
                    <div class="form-check form-check-inline">
                            @if(is_array($professionnel->domaine) && in_array('S', $professionnel->domaine)) Systèmes @endif &nbsp;
                            @if(is_array($professionnel->domaine) && in_array('R', $professionnel->domaine)) Réseaux @endif &nbsp;
                            @if(is_array($professionnel->domaine) && in_array('D', $professionnel->domaine)) Développement @endif &nbsp;
                    </div>
                </div>

                <div class="form-group row">
                    <label for="source" class="col-md-2 col-form-label text-left">Source :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="source" name="source" value="{{ $professionnel->source }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="observation" class="col-md-2 col-form-label text-left">Commentaires :</label>
                    <div class="col-md-10">
                        <textarea name="observation" id="observation" class="form-control" readonly>
                            {{ $professionnel->observation }}
                        </textarea>
                    </div>
                </div>

                <div class="col-md-11 mt-5 mb-5">
                    <a href="{{ route('professionnel.index') }}" class="btn btn-outline-danger"> Retour </a>
                </div>



        </div>
            <div class="col-md-2">

                <h4>Compétences</h4>
                @foreach($professionnel->competences as $proCompetences)
                    - {{ $proCompetences->libelle }}<br>
                @endforeach

            </div>
        </form>
    </div>

@endsection
