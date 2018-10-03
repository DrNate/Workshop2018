<!doctype html>
<html lang="en">

<head>
    
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <!-- Required meta tags -->
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" type="text/css" href="mystyle.css">


    <title>HEP Campus Grenoble</title>
</head>

<body>
<?php
include ('navbar.html')
?>

<div class="epsititlebg">
    <h2>Nous contacter</h2>
</div>

<div id="container-form" class="container border border-primary rounded mt-3">
    <p>N'hésiter pas à nous envoyer vos questions en remplissent ce formulaire.</p>
    <form>
        <div class="form-group">
            <label for="inputnom">Nom</label>
            <input type="text" class="form-control" id="inputnom" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="inputprenom">Prenom</label>
            <input type="text" class="form-control" id="inputprenom" placeholder="Prenom">
        </div>
        <div class="form-group">
            <label for="inputemail">Email address</label>
            <input type="email" class="form-control" id="inputemail" aria-describedby="emailHelp" placeholder="Address email">
        </div>
        <div class="form-group">
            <label for="inputtext">Message</label>
            <textarea class="form-control" id="inputtext" rows="3" placeholder="Message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>