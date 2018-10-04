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
    var radioHtml = '<div class="radio custom-control custom-radio col-sm-6"><input id="' + value + '" class="custom-control-input" type="radio" value="' + value + '" name="' + name + '"';
    if ( checked == true ) {
        radioHtml += ' checked="checked"';
    }
    radioHtml += '/><label class="custom-control-label" for="' + value + '">' + text + "</label></div>";

    var radioFragment = document.createElement('div');
    radioFragment.innerHTML = radioHtml;

    return radioFragment.firstChild;
}
function createTextElement() {
    var textHtml = '<div><input type="text" name="resfield"';
    textHtml += '/> </div>';

    var textFragment = document.createElement('div');
    textFragment.innerHTML = textHtml;

    return textFragment.firstChild;
}

function initQ() {
    $.getJSON('Q-R.json', function(data) {
        $("#frm").empty();
        pickedQ = data[getRandomInt(Object.keys(data).length)];
        $("#question").text(pickedQ["text"]);
        if(pickedQ.type == "qcm") {
            var shuffled = shuffle(Object.keys(pickedQ.ans));
            for(var i = 0;i<shuffled.length;i++) {
                if(i>0) {
                    $("#frm").append(createRadioElement("resfield", shuffled[i], pickedQ.ans[shuffled[i]], true));
                } else {
                    $("#frm").append(createRadioElement("resfield", shuffled[i], pickedQ.ans[shuffled[i]], false));
                }
            }
        } else {
            $("#frm").prepend(createTextElement());
        }
        clearInterval(timerI);
        timerI = initTimer();
    });
}

function initTimer(){
    // Set the date we're counting down to
    var countDownDate = new Date().getTime()+120000;

// Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (minutes < 10) { minutes = '0' + minutes }
        if (seconds < 10) { seconds = '0' + seconds }

        $("#timer").text(minutes + "m " + seconds + "s ");

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            $("#timer").text("EXPIRED");
        }
    }, 500);

    return x;
}

var timerI;
var pickedQ;
var score;
if (typeof score == 'undefined') {
    score = 0;
}

$("#score").text(score);

$("#submit").click(function() {
    if(pickedQ.type == "qcm") {
        var val = $('input[name=resfield]:checked').val();
        if(val == 0) {
            alert("won");
            score++;
            $("#score").text(score);
        } else {
            alert("lost");
        }
        initQ();
    } else {
        var val = $('input[name=resfield]').val();
        if(val == pickedQ.ans) {
            alert("won");
            score++;
            $("#score").text(score);
        } else {
            alert("lost");
        }
        initQ();
    }
});

initQ();

