@extends('cvtheque')

@section('contenu')

    <div class="row">
        <div class="col-md-12 space">
            <h1>Liste des professionnels</h1>
        </div>
    </div>

    <div class="col-md-4 d-none d-md-block titre mb-5 mt-5 float-right">
        <select onchange="window.location.href = this.value" class="form-control border-primary">

            <option value="{{ route('professionnel.index') }}" @unless($slug) selected @endunless >Tous les métiers</option>

            @foreach($metiers as $metier)
                <option value="{{ route('professionnel.metier', $metier->slug) }}" {{ $slug == $metier->slug ? 'selected' : ''}}>
                    {{$metier->libelle}}
                </option>
            @endforeach

        </select>
    </div>


    <div class="row">
        <div class="col-md-2 space mb-5">
            <a href="{{ route('professionnel.create') }}" class="btn btn-outline-danger">
                Créer un professionnel
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
            <th>Prénom Nom</th>
            <th>Métier</th>
            <th>Domiciliation</th>
            <th>Activités de formation</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($professionnels as $professionnel)
            <tr>
                <td>{{ $professionnel->id }}</td>
                <td><strong>{{ $professionnel->prenom }} {{$professionnel->nom}}</strong></td>
                <td>{{ $professionnel->metier->libelle }}</td>
                <td>{{ $professionnel->cp }} {{ $professionnel->ville }}</td>
                <td> @if( $professionnel->formation == 0) NON @else OUI @endif</td>
                <td>
                    <form action="{{ route('professionnel.show', $professionnel->id) }}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-dark btn-sm">Consulter</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('professionnel.edit', $professionnel->id) }}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-dark btn-sm">Modifier</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('professionnel.destroy', $professionnel->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Il n'y a pas de professionnels correspondant à votre demande.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
