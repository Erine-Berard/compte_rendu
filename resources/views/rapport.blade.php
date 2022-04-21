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
            <input class=" btn btn-lg btn-primary  w-25" type="submit" value="CONNEXION">
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#Ajout').click(function(){
                var div = document.getElementById("groupe");
                var taille = div.childNodes.length; 

                if(taille == 1){
                    var i = 1;
                }
                else{
                    var i = taille;
                }

                if (i == 1){
                    $('#btnAjout').append(
                        '<button type="button" onclick="Supprimer()" class="btn btn-danger">Supprimer un médicament</button>'
                    )
                }

                $('#groupe').append(
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
        function Supprimer(){
            console.log('coucou');
            var div = document.getElementById("groupe");
            var btn = document.getElementById("btnAjout");
            var taille = div.childNodes.length; 

            if(taille == 1){
                var i = 1;
            }
            else{
                var i = taille;
            }

            console.log(i);
            if (i == 2){
                btn.removeChild(btn.lastChild); 
                div.removeChild(div.lastChild);
                                   
            }
            else if (i != 1){
                div.removeChild(div.lastChild);
            }
        }
    </script>
@endsection