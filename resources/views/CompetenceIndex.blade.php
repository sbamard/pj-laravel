@extends('cvtheque')

@section('contenu')


    <div class="row">
        <div class="col-md-12 space">
            <h1>Liste des compétences</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 space mb-5">
            <a href="{{ route('competence.create') }}" class="btn btn-outline-danger">
                    Créer une compétence
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
                <th>Libellé des compétences</th>
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
        @foreach($competences as $competence)
            <tr>
                <td>{{ $competence->id }}</td>
                <td><strong>{{ $competence->libelle }}</strong></td>
                <td class="button">
                    <form action="{{ route('competence.show', $competence->id) }}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-dark btn-sm">Consulter</button>
                    </form>

                    <form action="{{ route('competence.edit', $competence->id) }}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-dark btn-sm">Modifier</button>
                    </form>

                    <form action="{{ route('competence.destroy', $competence->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
