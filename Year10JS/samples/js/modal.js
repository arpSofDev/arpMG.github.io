// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementById("modal-close");

// When the user clicks the button, open the modal
// btn.onclick = function() {
//     modal.style.display = "block";
// }

function closeModal(){
  modal.style.display = "none";
  var id = document.getElementById('re-focus').value;
  document.getElementById(id).focus();
}

// When the user clicks on <span> (x), close the modal
span.onclick = closeModal();

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}
