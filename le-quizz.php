<!doctype html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/logo.PNG" />
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Le quizz</title>
</head>

<body>
<?php
include ('navbar.html')
?>

<div id="container-form" class="text-center">
    <div class="epsititlebg">
        <h2 id="question">Bienvenue à L'EPSI</h2>
    </div>
    <form>
        <div class="radio">
            <input type="radio" name="optradio" checked><label id="rep1">opt1</label>
        </div>
        <div class="radio">
            <input type="radio" name="optradio"><label id="rep2">opt2</label>
        </div>
        <div class="radio">
            <input type="radio" name="optradio"><label id="rep3">opt3</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script>
    $.getJSON('Q-R.json', function(data) {
        console.log(data);
        $("#question").text(data.question1["text"]);
        $("#rep1").text(data.question1["r1"]);
        $("#rep2").text(data.question1["r2"]);
        $("#rep3").text(data.question1["r3"]);
    });
</script>


