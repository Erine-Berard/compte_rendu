@extends('navBar')
@section('contenu')
    <h1>RAPPORTS DE VISITE</h1>
    <div class=" ps-4 text-start">
        <form action="/rapportdevisite" method="POST">
            {{csrf_field()}}
            <fieldset disabled>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Numéro Rapport :</label>
                    <input type="text" class="form-control w-25 ms-3" placeholder="(Nouv.)">
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Praticien :</label>
                <select class="form-select w-25 ms-3" aria-label="Default select example " name="praticien">
                    @foreach ($praticiens as $praticien)
                        <option value="{{$praticien['id']}}">{{$praticien['nom']}} {{$praticien['prenom']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Date Rapport :</label>
                <input type="date" class="form-control w-25 ms-3" name="dateRapport">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Motif Visite :</label>
                <input type="text" class="form-control w-25 ms-3" name ="motif" placeholder="max : 30 mots">
            </div>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Bilan  : </label>
                <textarea class="form-control w-25 ms-3" name="bilan"></textarea>
            </div>
            <div class="mb-3">
                <h4>Offre d'échantillons</h4>
                <div id="btnAjout">
                    <button type="button" id="Ajout" class="btn btn-success" >Ajouter un médicament</button>
                </div>
                <div id="groupe">
                </div>
            </div>
            <input class=" btn btn-primary  w-25" type="submit" value="Ajouter">
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){ // S'exécute quand la page est  complètement chargée 
            $('#Ajout').click(function(){ // S'exécute quand le bouton avec l'id "ajout" est cliqué 
                var div = document.getElementById("groupe"); // Récupère la div "groupe"
                var taille = div.childNodes.length; // Récupère le nombre d'enfants de la div 
                if(taille == 1){ // S'il y a un enfant
                    var i = 1;
                    $('#btnAjout').append( // On ajoute un bouton supprimé 
                        '<button type="button" onclick="Supprimer()" class="btn btn-danger">Supprimer un médicament</button>'
                    )
                }
                else{
                    var i = taille;
                }
                $('#groupe').append( // Ajoute les champs medicament et quantité
                    '<div class="mt-3">' +
                        '<label for="disabledTextInput" class="form-label">Médicament N°'+i+' :</label>' +
                        '<div class="row">' +
                            '<select class="form-select w-25 ms-3 col-6"  name="medicament'+i+'">' +
                                '@foreach ($medicaments as $medicament)' +
                                    '<option value="{{$medicament["id"]}}">{{$medicament["nom"]}}</option>' +
                                '@endforeach' +
                            '</select>' +
                            '<input type="number" class="form-control col-6 w-25 ms-3" name ="quantite'+i+'" placeholder="Quantité">' +
                        '</div>' +
                    '</div>'
                )
            })
        })
        function Supprimer(){ // Fonction qui s'exécute quand on clique sur le bouton supprimer grace à l'attribut onclick
            var div = document.getElementById("groupe"); // Récupère la div "groupe"
            var btn = document.getElementById("btnAjout"); // Récupère le bouton "btnAjout"
            var taille = div.childNodes.length; // Récupère le nombre d'enfants de la div 
            if(taille == 1){
                var i = 1;
            }
            else{
                var i = taille;
            }
            if (i == 2){ // S' il y a deux enfants
                btn.removeChild(btn.lastChild); // Supprime le bouton suprimer medicament
                div.removeChild(div.lastChild); // Supprime le dernier enfant
                                   
            }
            else if (i != 1){ // S'il y a autre que un enfant 
                div.removeChild(div.lastChild);
            }
        }
    </script>
@endsection