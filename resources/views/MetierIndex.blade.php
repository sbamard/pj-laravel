@extends('cvtheque')

@section('contenu')


    <div class="row">
        <div class="col-md-12 space">
            <h1>Liste des métiers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 space mb-5">
            <a href="{{ route('metier.create') }}" class="btn btn-outline-danger">
                Créer un métier
            </a>
        </div>
    </div>


    {{--    directive de type alternative if .--}}

    @if(session()->has('information'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    {{ session('information') }}
                </div>
            </div>
        </div>
    @endif


    <table class="table">
        <thead class="">
        <tr>
            <th>#</th>
            <th>Libellé des métiers</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="6">
                <p>INFORMATIONS : ... </p>
            </td>
        </tr>

        </tfoot>
        <tbody>
        @forelse($metiers as $metier)
            <tr>
                <td>{{ $metier->id }}</td>
                <td><strong>{{ $metier->libelle }}</strong></td>
                <td class="button">
                    <form action="{{ route('metier.show', $metier->id) }}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-dark btn-sm">Consulter</button>
                    </form>

                    <form action="{{ route('metier.edit', $metier->id) }}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-dark btn-sm">Modifier</button>
                    </form>

                    <form action="{{ route('metier.showDestroy', $metier->id) }}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-dark btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Il n'y a pas de métier correspondant à votre demande.</td>
            </tr>
        @endforelse
        </tbody>
    </table>


@endsection
