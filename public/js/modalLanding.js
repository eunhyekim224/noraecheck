var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');
window.onclick = function(event) {
    if (event.target == modal || event.target == modal2) {
        modal.style.display = "none";
        modal2.style.display = "none";
    }

}

// give new name
// clean up the js file
// make the function readable by others
// change the name