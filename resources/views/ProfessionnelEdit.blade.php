@extends('cvtheque')

@section('contenu')

    <div class="row mt-5 mb-5">
        <div class="col-md-5 d-none d-md-block titre">
            <h4>Modification d'un professionnel</h4>
        </div>
    </div>

    <div class="row">
        <form action="{{ route('professionnel.update', $professionnel->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-sm-12">
                <div class="form-group row mb-2">
                    <label for="metier" class="col-md-2 col-form-label text-left">Métier principal :</label>
                    <div class="col-md-10">
                        <select name="metier_id" class="form-control">
                            @foreach($metiers as $metier)
                                <option value="{{ $metier->id }}"
                                        @if(old('metier_id')==$metier->id || $metier->id == $professionnel->metier_id) selected
                                    @endif>
                                    {{$metier->libelle}}
                                </option>
                            @endforeach
                        </select>
                        @error('metier_id')
                        <p class=" text-danger" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Fin select metier -->

                <div class="form-group row mt-2">
                    <div class="form-group col">
                        <label for="prenom" class="col-form-label">Prénom :</label>
                        <div class="col">
                            <input type="text" class="form-control @error('prenom') border-danger @enderror"
                                   id="prenom" name="prenom" value="{{old('prenom', $professionnel->prenom)}}"
                                   placeholder="Saisir un prénom">

                            @error('prenom')
                            <p class="text-danger" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col">
                        <label for="nom" class="col-form-label">Nom :</label>
                        <div class="col">
                            <input type="text" class="form-control @error('nom') border-danger @enderror"
                                   id="nom" name="nom" value="{{ old('nom', $professionnel->nom) }}"
                                   placeholder="Saisir un nom">

                            @error('nom')
                            <p class="text-danger" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cp" class="col-md-2 col-form-label text-left">Code postal :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('cp') border-danger @enderror"
                               id="cp" name="cp" value="{{ old('cp', $professionnel->cp) }}" placeholder="xxxxx">

                        @error('cp')
                        <p class="text-danger" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ville" class="col-md-2 col-form-label text-left">Ville :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('ville') border-danger @enderror"
                               id="ville" name="ville" value="{{ old('ville', $professionnel->ville) }}"
                               placeholder="Ville">

                        @error('ville')
                        <p class="text-danger" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telephone" class="col-md-2 col-form-label text-left">N° téléphone :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('telephone') border-danger @enderror"
                               id="telephone" name="telephone" value="{{ old('telephone', $professionnel->telephone) }}"
                               placeholder="Numéro téléphone">

                        @error('telephone')
                        <p class="text-danger" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-left">Adresse email :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('email') border-danger @enderror"
                               id="email" name="email" value="{{ old('email', $professionnel->email) }}"
                               placeholder="votreadresse@email.com">

                        @error('email')
                        <p class="text-danger" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-check form-check-inline">
                    <label for="formation"><strong>Actions de formation déjà effectuées ?</strong></label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="formation" name="formation"
                           value="1" @if(old('formation')==1) checked @endif>
                    <label for="formation" class="form-check-label">OUI (déjà effectuée)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="formation" name="formation"
                           value="0" @if(old('formation')==0) checked @endif>
                    <label for="formation" class="form-check-label">NON (jamais ou trop peu)</label>
                </div>

                <div class="form-group">
                    <label for="domaine"><strong>Domaines de formation possibles :</strong></label>

                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="domaine" name="domaine[]"
                               value="S" {{(is_array(old('domaine', $professionnel->domaine)) && in_array('S', old('domaine', $professionnel->domaine))) ? 'checked': ''}}>
                        <label for="domaine"
                               class="form-check-label @error('domaine') text-danger @enderror">Systèmes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="domaine" name="domaine[]"
                               value="R" {{(is_array(old('domaine', $professionnel->domaine)) && in_array('R', old('domaine', $professionnel->domaine))) ? 'checked': ''}}>
                        <label for="domaine"
                               class="form-check-label @error('domaine') text-danger @enderror">Réseaux</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="domaine" name="domaine[]"
                               value="D" {{(is_array(old('domaine', $professionnel->domaine)) && in_array('D', old('domaine', $professionnel->domaine))) ? 'checked': ''}}>
                        <label for="domaine"
                               class="form-check-label @error('domaine') text-danger @enderror">Développement</label>
                    </div>
                    @error('domaine')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="source" class="col-md-2 col-form-label text-left">Source :</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control @error('source') border-danger @enderror"
                               id="source" name="source" value="{{ old('source', $professionnel->source) }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="observation" class="col-md-2 col-form-label text-left">Commentaires :</label>
                    <div class="col-md-10">
                        <textarea name="observation" id="observation" class="form-control">
                            {{ old('observation', $professionnel->observation) }}
                        </textarea>
                    </div>
                </div>

                <a href="{{ route('professionnel.index') }}" class="btn btn-outline-danger"> Retour</a>
                <button type="submit" class="btn btn-outline-danger float-right"> Modifier</button>

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlSelect2"><strong>Compétences professionnelles</strong></label>
                    <select multiple data-none-selected-text="Choisir" data-style="btn-dark btn-block"
                            class="selectpicker" name="comp[]">
                        @foreach($competences as $competence)
                            <option
                                value="{{ $competence->id }}"
                                {{ in_array($competence->id, old('comp') ? : $professionnel->competences->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{$competence->libelle}}
                            </option>
                        @endforeach
                    </select>

                    @error('comp')
                    <p class="text-danger" role="alert">{{ $message }}</p>
                    @enderror

                </div>
            </div>



        </form>
    </div>

@endsection
