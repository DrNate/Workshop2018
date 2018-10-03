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
        <h2 id="question"></h2>
    </div>
    <form id="frm">
        <button id="submit" class="btn btn-primary">Submit</button>
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
    function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
    }
    function shuffle(a) {
        var j, x, i;
        for (i = a.length - 1; i > 0; i--) {
            j = Math.floor(Math.random() * (i + 1));
            x = a[i];
            a[i] = a[j];
            a[j] = x;
        }
        return a;
    }
    function createRadioElement(name, value, text, checked) {
        var radioHtml = '<div class="radio"><input type="radio" value="' + value + '" name="' + name + '"';
        if ( checked == true ) {
            radioHtml += ' checked="checked"';
        }
        radioHtml += '/>' + text + "</div>";

        var radioFragment = document.createElement('div');
        radioFragment.innerHTML = radioHtml;

        return radioFragment.firstChild;
    }
    function createTextElement() {
        var textHtml = '<div><input type="text" name="textfield"';
        textHtml += '/> </div>';

        var textFragment = document.createElement('div');
        textFragment.innerHTML = textHtml;

        return textFragment.firstChild;
    }
    var pickedQ;
    $.getJSON('Q-R.json', function(data) {
        pickedQ = data[getRandomInt(Object.keys(data).length)];
        $("#question").text(pickedQ["text"]);
        if(pickedQ.type == "qcm") {
            var shuffled = shuffle(Object.keys(pickedQ.ans));
            for(var i = 0;i<shuffled.length;i++) {
                if(i>0) {
                    $("#frm").prepend(createRadioElement("radio", shuffled[i], pickedQ.ans[shuffled[i]], true));
                } else {
                    $("#frm").prepend(createRadioElement("radio", shuffled[i], pickedQ.ans[shuffled[i]], false));
                }
            }
        } else {
            $("#frm").prepend(createTextElement());
        }
    });
    $("#submit").click(function() {
        if(pickedQ.type == "qcm") {
            var val = $('input[name=radio]:checked').val();
            if(val == 0) {
                alert("won");
            } else {
                alert("lost");
            }
        } else {
            var val = $('input[name=textfield]').val();
            if(val == pickedQ.ans) {
                alert("won");
            } else {
                alert("lost");
            }
        }
    });
</script>


