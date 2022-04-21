
@extends('navBar')
@section('contenu')
    <h1>VISITEURS</h1>
    <div class=" ps-4 text-start">
        <form action="/visiteur" method="POST">
            {{csrf_field()}}
            <div class='row mb-3 text-start'>
                <div class="col-2">
                    <label for="login" class="form-label">Recherche : </label>
                </div>
                <div class="col-4">
                    <select class="form-select ms-3" aria-label="Default select example " name="visiteur">
                        @foreach ($visiteurs as $visiteurUnit)
                            <option value="{{$visiteurUnit['id']}}">{{$visiteurUnit['nom']}} {{$visiteurUnit['prenom']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input class="w-100 btn btn-primary" type="submit" name="btn" value="Recherche">
                </div>
            </div>
            <hr>
            <div>
                <input style="display: none;" name="id" value="{{$visiteurSelect['id']}}">
                <div class="mb-3">
                    <label class="form-label">Nom :</label>
                    <input type="text" class="form-control w-25 ms-3" name="nom" placeholder="{{$visiteurSelect['nom']}}" value="{{$visiteurSelect['nom']}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Prenom :</label>
                    <input type="text" class="form-control w-25 ms-3" name="prenom" placeholder="{{$visiteurSelect['prenom']}}" value="{{$visiteurSelect['prenom']}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Adresse :</label>
                    <input type="text" class="form-control w-50 ms-3" name="adresse" placeholder="{{$visiteurSelect['adresse']}}" value="{{$visiteurSelect['adresse']}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ville :</label>
                    <div class="row w-50 ms-3">
                        <div class="col-4 p-0">
                            <input type="number" class="form-control col-4" name="cp" placeholder="{{$visiteurSelect['cp']}}" value="{{$visiteurSelect['cp']}}">
                        </div>
                        <div class="col-8 p-0 ps-3">
                            <input type="text" class="form-control col-8" name="ville" placeholder="{{$visiteurSelect['ville']}}" value="{{$visiteurSelect['ville']}}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Secteur :</label>
                    <select class="form-select w-25 ms-3" aria-label="Default select example " name="secteur">
                    @foreach ($secteurs as $secteurUnit)
                        @if ($secteur == $secteurUnit) 
                            <option value="{{$secteurUnit['id']}}" selected>{{$secteurUnit['nom']}}</option>
                        @else 
                            <option value="{{$secteurUnit['id']}}">{{$secteurUnit['nom']}}</option>
                        @endif
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Labo :</label>
                    <select class="form-select w-25 ms-3" aria-label="Default select example " name="labo">
                    @foreach ($labos as $laboUnit)
                        @if ($labo == $laboUnit) 
                            <option value="{{$laboUnit['id']}}" selected>{{$laboUnit['nom']}}</option>
                        @else 
                            <option value="{{$laboUnit['id']}}">{{$laboUnit['nom']}}</option>
                        @endif
                    @endforeach
                </div>
                <input class="btn btn-outline-secondary mt-3" type="submit" name="btn" value="Precedent">
                <input class="btn btn-outline-secondary mt-3" type="submit" name="btn" value="Suivant">
            </div>
        </form>
    </div>
@endsection