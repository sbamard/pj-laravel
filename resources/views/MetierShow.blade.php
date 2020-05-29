@extends('cvtheque')

@section('contenu')

    <div class="row mt-5 mb-5">
        <div class="col-md-12 space">
            <div><h4>Consultation d'un Métier</h4></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="">
                <div class="form-group">
                    <label for="libelle">Métier :</label>
                    <input type="text" class="form-control" name="libelle" id="libelle" value="{{ $metier->libelle }}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Descriptif :</label>
                    <textarea class="form-control" name="description" id="description" readonly>{{ $metier->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="slug">Slug :</label>
                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $metier->slug }}" readonly>
                </div>

                <div class="col-md-11 mt-5 mb-5">
                    <a href="{{ route('metier.index') }}" class="btn btn-outline-danger"> Retour </a>
                </div>
            </form>
        </div>
    </div>



@endsection
