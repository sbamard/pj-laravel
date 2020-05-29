@extends('cvtheque')

@section('contenu')

    <div class="row mt-5 mb-5">
        <div class="col-md-12 space">
            <div><h4>Création d'un métier</h4></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('metier.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="libelle"> Métier :</label>
                    <input type="text" id="libelle" name="libelle"
                           class="form-control  @error('libelle') border-danger @enderror"
                           value="{{ old('libelle') }}" placeholder="Libellé du métier">

                    @error('libelle')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description"> Descriptif :</label>
                    <textarea type="text" id="description" name="description"
                              class="form-control  @error('libelle') border-danger @enderror"
                              placeholder="Descriptif du métier">
                        {{ old('description') }}
                    </textarea>

                    @error('description')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug"> Slug :</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control  @error('slug') border-danger @enderror"
                           value="{{ old('slug') }}" placeholder="Slug du métier">

                    @error('slug')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <a href="{{ route('metier.index') }}" class="btn btn-outline-danger"> Retour</a>
                <button type="submit" class="btn btn-outline-danger float-right"> Créer </button>
            </form>
        </div>
    </div>
@endsection
