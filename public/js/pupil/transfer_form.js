// Example starter JavaScript for disabling form submissions if there are invalid fields
// (function() {
//     'use strict'

//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.querySelectorAll('.needs-validation')

//     // Loop over them and prevent submission
//     Array.prototype.slice.call(forms)
//         .forEach(function(form) {
//             form.addEventListener('submit', function(event) {
//                 if (!form.checkValidity()) {
//                     event.preventDefault()
//                     event.stopPropagation()
//                 }
//                 document.getElementById("myForm").addEventListener("submit", myFuction);

//                 function myFuction(e) {
//                     let message = document.getElementById('myMessage');
//                     message.style.display = "block";
//                     e.preventDefault();
//                 }
//                 form.classList.add('was-validated')
//             }, false)
//         })
// })()

function validateForm() {
    let x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}