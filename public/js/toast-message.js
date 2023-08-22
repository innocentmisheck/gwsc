$(document).ready(function() {
    setTimeout(function() {
        $('.message').fadeOut();
        $('.toast').fadeOut();
    }, 5000); // 5 seconds = 5000 milliseconds
});

$(document).ready(function() {
    setTimeout(function() {
        $('.passmessagematch').fadeOut();
        $('.passmessagemismatch').fadeOut();
    }, 2000); // 5 seconds = 5000 milliseconds
});


//function convertToUppercase() {
//  var inputElement = document.getElementById("national_id_input");
//inputElement.value = inputElement.value.toUpperCase();

// Now you can submit the form or perform any other action with the uppercase value
// For example, you might want to use AJAX to send the value to the server
// or proceed with form submission.
//}

// $(document).ready(function() {
//     setTimeout(function() {
//         $('.customer-register-form').fadeOut();
//     }, 2000);
// });