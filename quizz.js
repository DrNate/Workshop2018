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