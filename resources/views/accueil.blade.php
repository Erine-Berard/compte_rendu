<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
</html>
<body class="row container-fluid vh-100 m-0 p-0">
    <div class="col-2 mh-100 text-center" style="background-color : #A6D5F6 ">
        <img class="mb-4" src="/images/logo-gsb.png" alt="" width='75%'>  
        <div class=" ps-4 text-start" >
            <p>
                Information : {{$visiteur['nom']}} {{$visiteur['prenom']}}}
            </p>    
            <a class="btn btn-outline-dark" href="">
                Comptes-Rendus
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="">
                Visiteurs
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="">
                Praticiens
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="">
                Médicaments
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="">
                Quiter
            </a><br> 
        </div>
    </div>
    <main class="col-10 text-center p-5">
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
    </main>
</body>