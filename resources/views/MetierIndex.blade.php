{{--directive blade specifiant l'heritage--}}
@extends('cvtheque')
{{--directivbe blade permettant l'injection du contenu de la section--}}
@section('contenu')

    <div class="row">
        <div class="col-md-9 d-none d-md-block">
            <h4>Liste des métiers</h4>
        </div>
        <div class="offset-md-1 col-md-2">
            <a href="{{route('metier.create')}}" class="btn btn-primary btn-sm">
                Créer un métier
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
                    Libellé des métiers
                </th>
                <th class="col-md-7"></th>
                <th class="col-md-4">
                    ACTIONS
                </th>
            </tr>
            </thead>

            <tbody class="row">
            @forelse($metiers as $metier)
                <tr class="col-md-12">
                    <td class="col-md-1">{{ $metier->id }}</td>
                    <td class="col-md-9">{{ $metier->libelle }}</td>
                    <td class="col-md-2">
                        <form action="{{route('metier.show', $metier->id)}}" method="post">
                            @csrf
                            @method('GET')

                            <button type="submit" class="btn-primary btn-sm">Consulter</button>
                        </form>
                    </td>
                    <td class="col-md-2">
                        <form action="{{route('metier.edit', $metier->id)}}" method="post">
                            @csrf
                            @method('GET')

                            <button type="submit" class="btn-primary btn-sm">Modifier</button>
                        </form>
                    </td>
                    <td class="col-md-2">
                        <form action="{{route('metier.destroy', $metier->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn-primary btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Il n'y a pas de métier</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </main>
@endsection
