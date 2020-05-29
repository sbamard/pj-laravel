@extends('cvtheque')

@section('contenu')

    <div class="row mt-5 mb-5">
        <div class="col-md-12 space">
            <div><h4>Modification d'une compétence</h4></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('competence.update', $competence->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="libelle"> Compétence :</label>
                    <input type="text" id="libelle" name="libelle"
                           class="form-control  @error('libelle') border-danger @enderror"
                           value="{{ old('libelle', $competence->libelle) }}" placeholder="Libellé de la compétence">

                    @error('libelle')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description"> Descriptif :</label>
                    <textarea type="text" id="description" name="description"
                              class="form-control  @error('libelle') border-danger @enderror"
                              placeholder="Descriptif de la compétence">
                        {{ old('description', $competence->description) }}
                    </textarea>

                    @error('description')
                    <p class="text-danger" role="alert">{{$message}}</p>
                    @enderror
                </div>

                <a href="{{ route('competence.index') }}" class="btn btn-outline-danger"> Retour</a>
                <button type="submit" class="btn btn-outline-danger float-right"> Modifier </button>
            </form>
        </div>
    </div>
@endsection
