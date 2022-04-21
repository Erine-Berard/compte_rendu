
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
                    <input class="w-100 btn btn-primary" type="submit" value="Recherche">
                </div>
            </div>
            <hr>
            <div>
                <div class="mb-3">
                    <label class="form-label">Nom :</label>
                    <input type="text" class="form-control w-25 ms-3" name="nom" placeholder="{{$visiteur['nom']}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Prenom :</label>
                    <input type="text" class="form-control w-25 ms-3" name="prenom" placeholder="{{$visiteur['prenom']}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Adresse :</label>
                    <input type="text" class="form-control w-50 ms-3" name="adresse" placeholder="{{$visiteur['adresse']}}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ville :</label>
                    <div class="row w-50 ms-3">
                        <div class="col-4 p-0">
                            <input type="number" class="form-control col-4" name="cp" placeholder="{{$visiteur['cp']}}">
                        </div>
                        <div class="col-8 p-0 ps-3">
                            <input type="text" class="form-control col-8" name="ville" placeholder="{{$visiteur['ville']}}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Secteur :</label>
                    <input type="number" class="form-control w-25 ms-3" name="Secteur" placeholder="">
                </div>
                <div class="mb-3">
                    <label class="form-label">Labo :</label>
                    <input type="number" class="form-control w-25 ms-3" name="Labo" placeholder="">
                </div>
                <input class=" btn-outline-secondary" type="submit" value="Precedent">
                <input class=" btn-outline-secondary" type="submit" value="Suivant">
            </div>
        </form>
    </div>
@endsection