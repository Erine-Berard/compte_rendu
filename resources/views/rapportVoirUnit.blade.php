@extends('navBar')
@section('contenu')
    <h1>RAPPORTS DE VISITE</h1>
    <div class=" ps-4 text-start ">
        <table class="table table-striped table-primary">
            <tbody>
                <tr>
                    <td class='w-25'>ID :</td>
                    <td>{{$rapport->id}}</td>
                </tr>
                <tr>
                    <td>Praticient :</td>
                    <td>{{$praticien['nom']}} {{$praticien['prenom']}}</td>
                </tr>
                <tr>
                    <td>date du rapport :</td>
                    <td>{{$rapport->dateRapport}}</td>
                </tr>
                <tr>
                    <td>motif:</td>
                    <td>{{$rapport->motif}}</td>
                </tr>
                <tr>
                    <td>bilan :</td>
                    <td>{{$rapport->bilan}}</td>
                </tr>
                <tr>
                    <td>Createur du rapport :</td>
                    <td>{{$visiteurRapport['nom']}} {{$visiteurRapport['prenom']}}</td>
                </tr>
            </tbody>
        </table>
        <h4>Les Médicaments: </h4>
        @foreach ($liensMedocs as $liensMedoc)
            @foreach ($medicaments as $medicament)
                @if ($liensMedoc->idMedicament == $medicament->id)
                    <table class="table table-striped table-primary">
                        <tbody>
                            <tr>
                                <td class='w-25'>ID :</td>
                                <td>{{$medicament->id}}</td>
                            </tr>
                            <tr>
                                <td>Nom :</td>
                                <td>{{$medicament->nom}}</td>
                            </tr>
                            <tr>
                                <td>Famille :</td>
                                @foreach ($familles as $famille)
                                    @if ($medicament->famille == $famille->id)
                                        <td>{{$famille->nom}}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>Composition :</td>
                                <td>{{$medicament->composition}}</td>
                            </tr>
                            <tr>
                                <td>Effets indésirables :</td>
                                <td>{{$medicament->effetsIndesirables}}</td>
                            </tr>
                            <tr>
                                <td>Contre indications :</td>
                                <td>{{$medicament->contreIndications}}</td>
                            </tr>
                            <tr>
                                <td>Prix :</td>
                                <td>{{$medicament->prix}}</td>
                            </tr>
                            <tr>
                                <td>Quantité :</td>
                                <td>{{$liensMedoc->quantite}}</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection