<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
</html>
<body class="text-center d-flex justify-content-center">
    <main class="form-signin w-50 mt-5 ">
        <form action="/" method="POST">
            {{csrf_field()}}
            <img class="mb-4" src="/images/logo-gsb.png" alt="" width='20%'>
            <h1 class="h3 mb-3 fw-normal mt-4">Identifiez vous :</h1>
            @if ($erreur != null)
                <div class="alert alert-danger" role="alert">
                    {{$erreur}}
                </div>
            @endif
            <div class="mb-3 text-start">
                <label for="login" class="form-label">Login : </label>
                <input type="login" class="form-control" id="login" name="login" placeholder="Login">
            </div>
            <div class="mb-3 text-start">
                <label for="mp" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="mp" name="mp" placeholder="***********">
            </div>
            <input class="w-100 btn btn-lg btn-primary" type="submit" value="CONNEXION">
        </form>
</body>