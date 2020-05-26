{{--directive blade specifiant l'heritage--}}
@extends('cvtheque')
{{--directivbe blade permettant l'injection du contenu de la section(liaison @yield)--}}
@section('contenu')
    <main>
        <div class="row">
            <div class="col-sm-12">
                <div><h4>Edition d'une compétence</h4></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{route('competence.update', $competence->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="libelle">Compétence :</label>
                        <input type="text" id="libelle" name="libelle"
                               class="form-control @error('libelle') border-danger @enderror"
                               value="{{old('libelle', $competence->libelle)}}" placeholder="Libellé de la compétence">
                        @error('libelle')
                        <p class="text-danger" role="alert">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description"
                                  class="form-control @error('description') border-danger @enderror"
                                  placeholder="Description de la compétence">{{old('description', $competence->description)}}</textarea>
                        @error('description')
                        <p class="text-danger" role="alert">{{$message}}</p>
                        @enderror
                    </div>

                    <a href="{{route('competence.index')}}" class="btn btn-primary">Return</a>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>

    </main>
@endsection
