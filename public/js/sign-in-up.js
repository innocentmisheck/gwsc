const loginButton = document.getElementById("loginButton");

loginButton.addEventListener("click", () => {
    // Redirect to the registration page
    window.alert("HELLO");
    window.location.href = "views/customer-login.html"; // Replace with the actual URL of your registration page
});

const registrationButton = document.getElementById("registrationButton");

registrationButton.addEventListener("click", () => {
    // Redirect to the registration page
    window.location.href = "../gwsc.html"; // Replace with the actual URL of your registration page
});