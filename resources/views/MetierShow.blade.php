{{--directive blade specifiant l'heritage--}}
@extends('cvtheque')
{{--directivbe blade permettant l'injection du contenu de la section(liaison @yield)--}}
@section('contenu')
    <main>
        <div class="row">
            <div class="col-sm-12">
                <form>
                    <div class="form-group">
                        <label for="libelle">Compétence :</label>
                        <input type="text" class="form-control" name="libelle" id="libelle"
                               value="{{$metier->libelle}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea class="form-control" name="description" id="description"
                                  readonly>{{$metier->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug :</label>
                        <textarea class="form-control" name="slug" id="slug"
                                  readonly>{{$metier->slug}}</textarea>
                    </div>
                    <a href="{{route('metier.index')}}" class="btn btn-primary">Return</a>
                </form>
            </div>
        </div>
    </main>
@endsection
