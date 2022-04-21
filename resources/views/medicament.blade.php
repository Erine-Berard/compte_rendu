
@extends('navBar')
@section('contenu')
    <h1>MEDICAMENTS</h1>
    <div class=" ps-4 text-start">
        <fieldset disabled>
            <div class="mb-3 mt-5">
                <label for="disabledTextInput" class="form-label">ID :</label>
                <input type="number" class="form-control w-25 ms-3" placeholder="{{$medicament['id']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Famille :</label>
                <input type="text" class="form-control w-50 ms-3" placeholder="{{$famille['nom']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Composition :</label>
                <input type="text" class="form-control w-50 ms-3" placeholder="{{$medicament['composition']}}">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Effets indésirables :</label>
                <textarea class="form-control w-50 ms-3" >{{$medicament['effetsIndesirables']}}</textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Contre indications :</label>
                <textarea class="form-control w-50 ms-3" >{{$medicament['contreIndications']}}</textarea>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Prix echantillon :</label>
                <input type="number" class="form-control w-25 ms-3" placeholder="{{$medicament['prix']}}">
            </div>
        </fieldset>

        <a class="btn btn-outline-secondary" href="/medicament/precedent/{{$medicament['id']}}">Précédent</a>
        <a class="btn btn-outline-secondary" href="/medicament/suivant/{{$medicament['id']}}">Suivant</a>
    </div>
@endsection