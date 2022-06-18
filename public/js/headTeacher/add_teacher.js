// class one
function standardOne() {
    var e = document.getElementById("standardOneSubjects");
    var choiceValue = e.value; // to get value only
    var choicetext = e.options[e.selectedIndex].text;
    alert(choiceValue + " " + choicetext);

    var newDiv = document.createElement('span');
    newDiv.setAttribute("class", "badge badge-primary");
    newDiv.innerHTML = choicetext + " ";
    var spanDiv = document.createElement('i');
    spanDiv.setAttribute("class", "fa fa-close");
    spanDiv.setAttribute("onclick", 'closeDiv(this)');
    //clsbtn.appendChild(spanDiv)
    newDiv.appendChild(spanDiv);
    var displaydiv = document.getElementById('standard_one');
    displaydiv.appendChild(newDiv);

}

function closeDiv(y) {
    var parentDiv = y.parentNode.parentNode;
    parentDiv.removeChild(y.parentNode);
}

// class two
function standardTwo() {
    var e = document.getElementById("standardTwoSubjects");
    var choiceValue = e.value; // to get value only
    var choicetext = e.options[e.selectedIndex].text;
    alert(choiceValue + " " + choicetext);

    var newDiv = document.createElement('span');
    newDiv.setAttribute("class", "badge badge-primary");
    newDiv.innerHTML = choicetext + " ";
    var spanDiv = document.createElement('i');
    spanDiv.setAttribute("class", "fa fa-close");
    spanDiv.setAttribute("onclick", 'closeDiv(this)');
    //clsbtn.appendChild(spanDiv)
    newDiv.appendChild(spanDiv);
    var displaydiv = document.getElementById('standard_two');
    displaydiv.appendChild(newDiv);

}

function closeDiv(y) {
    var parentDiv = y.parentNode.parentNode;
    parentDiv.removeChild(y.parentNode);
}



// class three
function standardThree() {
    var e = document.getElementById("standardThreeSubjects");
    var choiceValue = e.value; // to get value only
    var choicetext = e.options[e.selectedIndex].text;
    alert(choiceValue + " " + choicetext);

    var newDiv = document.createElement('span');
    newDiv.setAttribute("class", "badge badge-primary");
    newDiv.innerHTML = choicetext + " ";
    var spanDiv = document.createElement('i');
    spanDiv.setAttribute("class", "fa fa-close");
    spanDiv.setAttribute("onclick", 'closeDiv(this)');
    //clsbtn.appendChild(spanDiv)
    newDiv.appendChild(spanDiv);
    var displaydiv = document.getElementById('standard_three');
    displaydiv.appendChild(newDiv);

}

function closeDiv(y) {
    var parentDiv = y.parentNode.parentNode;
    parentDiv.removeChild(y.parentNode);
}


// class four
function standardFour() {
    var e = document.getElementById("standardFourSubjects");
    var choiceValue = e.value; // to get value only
    var choicetext = e.options[e.selectedIndex].text;
    alert(choiceValue + " " + choicetext);

    var newDiv = document.createElement('span');
    newDiv.setAttribute("class", "badge badge-primary");
    newDiv.innerHTML = choicetext + " ";
    var spanDiv = document.createElement('i');
    spanDiv.setAttribute("class", "fa fa-close");
    spanDiv.setAttribute("onclick", 'closeDiv(this)');
    //clsbtn.appendChild(spanDiv)
    newDiv.appendChild(spanDiv);
    var displaydiv = document.getElementById('standard_four');
    displaydiv.appendChild(newDiv);

}

function closeDiv(y) {
    var parentDiv = y.parentNode.parentNode;
    parentDiv.removeChild(y.parentNode);
}



// class five
function standardFive() {
    var e = document.getElementById("standardFiveSubjects");
    var choiceValue = e.value; // to get value only
    var choicetext = e.options[e.selectedIndex].text;
    alert(choiceValue + " " + choicetext);

    var newDiv = document.createElement('span');
    newDiv.setAttribute("class", "badge badge-primary");
    newDiv.innerHTML = choicetext + " ";
    var spanDiv = document.createElement('i');
    spanDiv.setAttribute("class", "fa fa-close");
    spanDiv.setAttribute("onclick", 'closeDiv(this)');
    //clsbtn.appendChild(spanDiv)
    newDiv.appendChild(spanDiv);
    var displaydiv = document.getElementById('standard_five');
    displaydiv.appendChild(newDiv);

}

function closeDiv(y) {
    var parentDiv = y.parentNode.parentNode;
    parentDiv.removeChild(y.parentNode);
}


// class six
function standardSix() {
    var e = document.getElementById("standardSixSubjects");
    var choiceValue = e.value; // to get value only
    var choicetext = e.options[e.selectedIndex].text;
    alert(choiceValue + " " + choicetext);

    var newDiv = document.createElement('span');
    newDiv.setAttribute("class", "badge badge-primary");
    newDiv.innerHTML = choicetext + " ";
    var spanDiv = document.createElement('i');
    spanDiv.setAttribute("class", "fa fa-close");
    spanDiv.setAttribute("onclick", 'closeDiv(this)');
    //clsbtn.appendChild(spanDiv)
    newDiv.appendChild(spanDiv);
    var displaydiv = document.getElementById('standard_six');
    displaydiv.appendChild(newDiv);

}

function closeDiv(y) {
    var parentDiv = y.parentNode.parentNode;
    parentDiv.removeChild(y.parentNode);
}


// class seven
function standardSeven() {
    var e = document.getElementById("standardSevenSubjects");
    var choiceValue = e.value; // to get value only
    var choicetext = e.options[e.selectedIndex].text;
    alert(choiceValue + " " + choicetext);

    var newDiv = document.createElement('span');
    newDiv.setAttribute("class", "badge badge-primary");
    newDiv.innerHTML = choicetext + " ";
    var spanDiv = document.createElement('i');
    spanDiv.setAttribute("class", "fa fa-close");
    spanDiv.setAttribute("onclick", 'closeDiv(this)');
    //clsbtn.appendChild(spanDiv)
    newDiv.appendChild(spanDiv);
    var displaydiv = document.getElementById('standard_seven');
    displaydiv.appendChild(newDiv);

}

function closeDiv(y) {
    var parentDiv = y.parentNode.parentNode;
    parentDiv.removeChild(y.parentNode);
}


var $select1 = $('#subjects'),
    $select2 = $('#subjects'),
    $select3 = $('#subjects'),
    $select4 = $('#subjects'),
    $select5 = $('#subjects'),
    $select6 = $('#subjects'),
    $select7 = $('#subjects'),
    $options = $select2.find('option');

$select1.on('change', function() {
    $select2.html($options.filter('[value="' + this.value + '"]'));
}).trigger('change');