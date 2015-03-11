$(document).ready(function() {
    window.onerror = function(msg, url, line)
{
var test;

var items = document.getElementsByClassName('currentMatch');
var nbProductionObj = items.getAttribute("data-nbProductionObj"); 
alert(nbProductionObj);

    for (var i = 0; i < items.length; i++){
        test = items[i].innerText;
    var array=[];
    array.push(test);
alert(array);
if (test > 32) {
	newColor = '#E9E581';

} else {
    newColor = "black";
    
}
items[i].style.color = newColor;;
alert(items[i].style.color);
}

}
});


$(document).ready(function() {
var test;
var items = document.getElementsByClassName('currentMatch');

    for (var i = 0; i < items.length; i++){
        test = items[i].innerText;
    var array=[];
    array.push(test);
alert(array);
if (test > 32) {
	newColor = '#E9E581';

} else {
    newColor = "black";
    
}
items[i].style.color = newColor;;
alert(items[i].style.color);
}

});
