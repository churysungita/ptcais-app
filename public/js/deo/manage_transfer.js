window.addEventListener('DOMContentLoaded', event => {


    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});
let tBody = document.getElementById('user_tbody');
let modal = document.getElementById('myModal');
let tr = tBody.getElementsByTagName('TR');
let span = document.getElementsByClassName("close")[0];


// When the user clicks on the button, open the modal 
for (let i = 0; i < tr.length; i++) {
    tr[i].onclick = function() {
        modal.style.display = "block";
        console.log(this.firstElementChild.innerHTML + ' Selected');
    };
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
document.onkeydown = function(evt) {
    if (evt.keyCode == 27) {
        modal.style.display = "none";
    }
};

//=====approved/pending/cancelled manage========//
var modalConfirm = function(callback) {

    $("#btn-confirm").on("click", function() {
        $("#mi-modal").modal('show');
    });

    $("#modal-btn-approved").on("click", function() {
        callback(true);
        $("#mi-modal").modal('hide');
    });


    $("#modal-btn-cancelled").on("click", function() {
        callback(false);
        $("#mi-modal").modal('hide');
    });
};

modalConfirm(function(confirm) {
    if (confirm) {

        $("#result").html("Approved");
    } else {
        $("#result").html("cancelled");
    }
});