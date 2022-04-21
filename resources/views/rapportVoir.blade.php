@extends('navBar')
@section('contenu')
    <h1>RAPPORTS DE VISITE</h1>
    <div class=" ps-4 text-start ">
        <table class="table table-striped table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Motif</th>
                    <th scope="col">Date</th>
                    <th scope="col">Praticien</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapports as $rapport)
                    <tr>
                        <th>{{$rapport->id}}</th>
                        <td>{{$rapport->motif}}</td>
                        <td>{{$rapport->dateRapport}}</td>
                        @foreach ($praticiens as $praticien)
                            @if ($praticien['id'] == $rapport->idPraticien)
                                <td>{{$praticien['nom']}} {{$praticien['prenom']}}</td>
                            @endif
                        @endforeach
                        <td>
                            <a class="btn btn-outline-secondary" href="/rapportdevisite/voir/{{$rapport->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                    <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection