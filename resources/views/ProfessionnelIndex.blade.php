{{--directive blade specifiant l'heritage--}}
@extends('cvtheque')
{{--directivbe blade permettant l'injection du contenu de la section--}}
@section('contenu')

    {{-- id prenom . nom . metier . domicile . activité de formation--}}
    <table class="table container">
        <thead class="thead-dark">
        <tr class="col-md-12">
            <th class="col-md-1">
                # des pros
            </th>
            <th class="col-md-2">
                La liste des pros
            </th>
            <th class="col-md-7"></th>
            <th class="col-md-4" >
                les 3 boutons ^^
            </th>
        </tr>
        </thead>
        <tbody class="row">
        @forelse($professionnels as $professionnel)
            <tr class="col-md-12">
                    <td>{{ $professionnel->id }} </td>
                    <td>{{ $professionnel->prenom }} {{ $professionnel->nom }}</td>
                    <td> {{ $professionnel->metier->libelle }}</td>
                    <td>{{ $professionnel->cp }} {{ $professionnel->ville }}</td>
                    <td>@if($professionnel->formation == 0)Non @else Oui @endif</td>
                <td class="col-md-2">
                    <form action="{{route('professionnel.show', $professionnel->id)}}" method="post">
                        @csrf
                        @method('GET')

                        <button type="submit" class="btn-primary btn-sm">Consulter</button>
                    </form>
                </td>
                <td class="col-md-2">
                    <form action="{{route('professionnel.edit', $professionnel->id)}}" method="post">
                        @csrf
                        @method('GET')

                        <button type="submit" class="btn-primary btn-sm">Modifier</button>
                    </form>
                </td>
                <td class="col-md-2">
                    <form action="{{route('professionnel.destroy', $professionnel->id)}}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-primary btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>Il n'y a pas de pro</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
