@extends('cvtheque')

@section('contenu')

    <div class="row mt-5 mb-5">
        <div class="col-md-12 space">
            <div><h4>Suppression d'un métier</h4></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('metier.destroy', $metier->id) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <label for="libelle"> Compétence :</label>
                    <input type="text" id="libelle" name="libelle"
                           class="form-control  @error('libelle') border-danger @enderror"
                           value="{{ old('libelle', $metier->libelle) }}" placeholder="Libellé du métier" readonly>

                    @error('libelle')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description"> Descriptif :</label>
                    <textarea type="text" id="description" name="description"
                              class="form-control  @error('description') border-danger @enderror"
                              placeholder="Descriptif du métier" readonly>
                        {{ old('description', $metier->description) }}
                    </textarea>

                    @error('description')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug"> Slug :</label>
                    <input type="text" id="slug" name="slug"
                           class="form-control  @error('slug') border-danger @enderror"
                           value="{{ old('slug', $metier->slug) }}" placeholder="Slug du métier" readonly>

                    @error('slug')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <a href="{{ route('metier.index') }}" class="btn btn-outline-danger"> Retour</a>
                <button type="submit" class="btn btn-outline-danger float-right"> Supprimer </button>
            </form>
        </div>
    </div>
@endsection
