<!doctype html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" type="text/css" href="styleEPSI.css">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Le quizz</title>
</head>

<body>
<?php
include 'navbar.html'
?>

<div class="epsititlebg">
    <h2 id="question">Quizz</h2>
</div>
<div class="text-center" id="beforestart">
    <p class="mt-3 text-center">Petit quizz pour déterminer votre niveau afin de candidater pour l'EPSI.</p>
    <button id="start" class="btn btn-primary">Commencer</button>
</div>
<div id="afterstart" class="row p-0 m-0 mt-3 mb-3">
    <div class="col-sm-3 text-center">
        <label id="score">
        </label>
    </div>
    <div class="col-sm-6 text-center">
        <div class="row border" id="frm">
        </div>
        <div id="info" class="mx-auto mt-3">

        </div>
    </div>
    <div id="timer" class="col-sm-3 text-center">
    </div>

</div>

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="quizz.js"></script>

<?php
include 'footer.html'
?>