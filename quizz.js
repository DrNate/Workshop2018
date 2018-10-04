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
    var radioHtml = '<div class="radio custom-control custom-radio col-sm-6 mb-2 mt-2"><input id="' + value + '" class="custom-control-input" type="radio" value="' + value + '" name="' + name + '"';
    if (checked == true) {
        radioHtml += ' checked="checked"';
    }
    radioHtml += '/><label class="custom-control-label" for="' + value + '">' + text + "</label></div>";

    var radioFragment = document.createElement('div');
    radioFragment.innerHTML = radioHtml;

    return radioFragment.firstChild;
}
function createTextElement() {
    var textHtml = '<input class="form-control ml-2 mr-2" type="text" name="resfield"';
    textHtml += '/>';

    var textFragment = document.createElement('div');
    textFragment.innerHTML = textHtml;

    return textFragment.firstChild;
}

Array.prototype.clean = function (deleteValue) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] == deleteValue) {
            this.splice(i, 1);
            i--;
        }
    }
    return this;
};

function initQ() {
    $("#score").text("Score : " + score);
    $.getJSON('Q-R.json', function (data) {
        if (typeof questionsLeft == 'undefined') {
            questionsLeft = $.map(data, function (el) {
                return el
            });
        }
        $("#frm").empty();
        var randomIndex = getRandomInt(questionsLeft.length);
        pickedQ = questionsLeft[randomIndex];
        $("#question").text(pickedQ["text"]);
        if (pickedQ.type == "qcm") {
            var shuffled = shuffle(Object.keys(pickedQ.ans));
            for (var i = 0; i < shuffled.length; i++) {
                if (i == 0) {
                    $("#frm").append(createRadioElement("resfield", shuffled[i], pickedQ.ans[shuffled[i]], true));
                } else {
                    $("#frm").append(createRadioElement("resfield", shuffled[i], pickedQ.ans[shuffled[i]], false));
                }
            }
        } else {
            $("#frm").append(createTextElement());
        }
        clearInterval(timerI);
        timerI = initTimer();
        delete questionsLeft[randomIndex];
        questionsLeft.clean(undefined);
    });
}

function getGoodAns(q) {
    if (q.type == "qcm") {
        return q.ans[0];
    } else {
        return q.ans;
    }
}

function initTimer() {
    // Set the date we're counting down to
    var countDownDate = new Date().getTime() + 30000; //30s

// Update the count down every 1 second
    var x = setInterval(function () {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (seconds < 10) {
            seconds = '0' + seconds
        }

        $("#timer").text(seconds + "s ");

        // If the count down is finished, write some text and do some things
        if (distance < 0) {
            stopTimer(x);
            $("#info").text("Temps écoulé; la bonne réponse était :" + getGoodAns(pickedQ));
            $("#info").addClass("alert-danger").removeClass("alert-sucess");
            checkEnd();
        }
    }, 500);

    return x;
}

function stopTimer(x) {
    clearInterval(x);
    $("#timer").text("");
}

function isGoodAns(ans) {
    if(pickedQ.type == "qcm") {
        return ans == 0;
    } else {
        return ans == getGoodAns(pickedQ);
    }
}

function checkEnd() {
    if (questionsLeft.length > 0) {
        console.log(questionsLeft);
        initQ();
    } else {
        stopTimer(timerI);
        $("#question").text("Résultats");
        $("#submit").addClass("disabled");
        $("#frm").empty();
        $("#info").empty();
        if (score >= 3) {
            $("#info").append('<p class="text-center">Vous avez répondu juste à la plupart des questions, vous êtes prêt à rejoindre l\'EPSI !</p>');
            $("#info").addClass("alert-success").removeClass("alert-danger");
        } else {
            $("#info").append('<p class="text-center">Vous n\'avez pas réussi à répondre juste à la plupart des questions, mais pas de soucis on peut vous apprendre !</p>');
            $("#info").addClass("alert-danger").removeClass("alert-sucess");
        }
        $("#info").append('<p class="text-center"><a href="http://www.epsi.fr/candidature-2/candidature-grenoble/">Rejoignez nous ici !</a></p>')
    }
}

var timerI;
var questionsLeft;
var pickedQ;
var score;
if (typeof score == 'undefined') {
    score = 0;
}

$("#start").click(function () {
    $("#beforestart").empty();
    $("#afterstart").append('<button id="submit" class="btn btn-primary mx-auto mt-3">Valider</button>');
    $("#submit").click(function () {
        var val;
        if (pickedQ.type == "qcm") {
            val = $('input[name=resfield]:checked').val();
        }
        else {
            val = $('input[name=resfield]').val();
        }
        if (isGoodAns(val)) {
            $("#info").text("Bonne réponse.");
            $("#info").addClass("alert-success").removeClass("alert-danger");
            score++;
        } else {
            $("#info").text("Mauvaise réponse, la bonne réponse était : " + getGoodAns(pickedQ));
            $("#info").addClass("alert-danger").removeClass("alert-sucess");
        }
        checkEnd();
    });
    initQ();
});

