
@extends('navBar')
@section('contenu')
    <h1>PRATICIENS</h1>
    <div class=" ps-4 text-start">
        <form action="/praticien" method="POST">
            {{csrf_field()}}
            <div class='row mb-3 text-start'>
                <div class="col-2">
                    <label for="login" class="form-label">Recherche : </label>
                </div>
                <div class="col-4">
                    <select class="form-select ms-3" aria-label="Default select example " name="praticien">
                        @foreach ($praticiens as $praticienUnit)
                            <option value="{{$praticienUnit['id']}}">{{$praticienUnit['nom']}} {{$praticienUnit['prenom']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input class="w-100 btn btn-primary" type="submit" value="CONNEXION">
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class=" ps-4 text-start">
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">ID :</label>
                <input type="number" class="form-control w-25 ms-3" placeholder="{{$praticien['id']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Nom :</label>
                <input type="text" class="form-control w-25 ms-3" placeholder="{{$praticien['nom']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Prenom :</label>
                <input type="text" class="form-control w-25 ms-3" placeholder="{{$praticien['prenom']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Adresse :</label>
                <input type="text" class="form-control w-50 ms-3" placeholder="{{$praticien['adresse']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Ville :</label>
                <div class="row w-50 ms-3">
                    <div class="col-4 p-0">
                        <input type="number" class="form-control col-4" placeholder="{{$praticien['cp']}}">
                    </div>
                    <div class="col-8 p-0 ps-3">
                        <input type="text" class="form-control col-8" placeholder="{{$praticien['ville']}}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Coeff. notorie :</label>
                <input type="number" class="form-control w-25 ms-3" placeholder="{{$praticien['coeff']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">LieuxExercice :</label>
                <input type="number" class="form-control w-25 ms-3" placeholder="{{$lieu['nom']}}">
            </div>
        </fieldset>

        <a class="btn btn-outline-secondary" href="/praticien/precedent/{{$praticien['id']}}">Précédent</a>
        <a class="btn btn-outline-secondary" href="/praticien/suivant/{{$praticien['id']}}">Suivant</a>
    </div>
@endsection