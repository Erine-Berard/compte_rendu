
@extends('navBar')
@section('contenu')
    <h1>Bienvenue sur votre espace personnel</h1>
    <div class=" ps-4 text-start">
        <h5>Vos informations : </h5>
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Nom :</label>
                <input type="text" id="disabledTextInput" class="form-control w-25 ms-3" placeholder="{{$visiteur['nom' ]}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Prénom :</label>
                <input type="text" id="disabledTextInput" class="form-control w-25 ms-3" placeholder="{{$visiteur['prenom' ]}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Login :</label>
                <input type="text" id="disabledTextInput" class="form-control w-25 ms-3" placeholder="{{$visiteur['login' ]}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Adresse :</label>
                <input type="text" id="disabledTextInput" class="form-control w-25 ms-3" placeholder="{{$visiteur['adresse' ]}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Code postal :</label>
                <input type="text" id="disabledTextInput" class="form-control w-25 ms-3" placeholder="{{$visiteur['cp' ]}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Ville :</label>
                <input type="text" id="disabledTextInput" class="form-control w-25 ms-3" placeholder="{{$visiteur['ville' ]}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Date d'embauche :</label>
                <input type="text" id="disabledTextInput" class="form-control w-25 ms-3" placeholder="{{$visiteur['dateEmbauche' ]}}">
            </div>
        </fieldset>
    </div>
@endsection