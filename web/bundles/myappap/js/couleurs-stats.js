$(document).ready(function() {
var test;
var items = document.getElementsByClassName('currentMatch');

    for (var i = 0; i < items.length; i++){

        test = items[i].innerText;
    var array=[];
    array.push(test);

if (test > 3) {
	newColor = '#E9E581';

} else {
    newColor = "blue";
    
}
items[i].style.color = newColor;
}
        console.log(items);

});

//couleurs pour estimations


$(document).ready(function() {
var test;
var items = document.getElementsByClassName('currentMatchEstimation');

    for (var i = 0; i < items.length; i++){

        test = items[i].innerText;
    var array=[];
    array.push(test);

if (test > 3) {
    newColor = '#E9E581';

} else {
    newColor = "blue";
    
}
items[i].style.color = newColor;
}
        console.log(items);

});
