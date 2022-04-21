<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
</html>
<body class="row container-fluid vh-100 m-0 p-0">
    <div class="col-2 mh-100 text-center" style="background-color : #A6D5F6 ">
        <img class="mb-4" src="/images/logo-gsb.png" alt="" width='75%'>  
        <div class=" ps-4 text-start" >
            <p>
                Information : {{$visiteur['nom']}} {{$visiteur['prenom']}}
            </p>    
            <a class="btn btn-outline-dark" href="/rapportdevisite">
                Comptes-Rendus
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="">
                Visiteurs
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="">
                Praticiens
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="/medicament">
                Médicaments
            </a><br>
            <a class="btn btn-outline-dark mt-2" href="">
                Quiter
            </a><br> 
        </div>
    </div>
    <main class="col-10 text-center p-5">
    @yield('contenu')
    </main>
</body>


