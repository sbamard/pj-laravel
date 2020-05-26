{{--directive blade specifiant l'heritage--}}
@extends('cvtheque')
{{--directivbe blade permettant l'injection du contenu de la section--}}
@section('contenu')

    <div class="row">
        <div class="col-md-9 d-none d-md-block">
            <h4>Liste des compétences</h4>
        </div>
        <div class="offset-md-1 col-md-2">
            <a href="{{route('competence.create')}}" class="btn btn-primary btn-sm">
                Créer une compétence
            </a>
        </div>
    </div>

    {{--            directive de type alternative if . --}}
    @if(session()->has('information'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    {{ session('information') }}
                </div>
            </div>
        </div>
    @endif

    <main>
        <table class="table container">
            <thead class="thead-dark row">
            <tr class="col-md-12">
                <th class="col-md-1">
                    #
                </th>
                <th class="col-md-auto">
                    Libellé des compétences
                </th>
                <th class="col-md-7"></th>
                <th class="col-md-4">
                    ACTIONS
                </th>
            </tr>
            </thead>

            <tbody class="row">
            @foreach($competences as $competence)
                <tr class="col-md-12">
                    <td class="col-md-1">{{ $competence->id }}</td>
                    <td class="col-md-9">{{ $competence->libelle }}</td>
                    <td class="col-md-2">
                        <form action="{{route('competence.show', $competence->id)}}" method="post">
                            @csrf
                            @method('GET')

                            <button type="submit" class="btn-primary btn-sm">Consulter</button>
                        </form>
                    </td>
                    <td class="col-md-2">
                        <form action="{{route('competence.edit', $competence->id)}}" method="post">
                            @csrf
                            @method('GET')

                            <button type="submit" class="btn-primary btn-sm">Modifier</button>
                        </form>
                    </td>
                    <td class="col-md-2">
                        <form action="{{route('competence.destroy', $competence->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-primary btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection
