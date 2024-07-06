// Password Visibility Toggle
document.addEventListener('DOMContentLoaded', function() {
    let eyeIcons = document.querySelectorAll(".eye-toggle, .eye-toggle-confirm");
    let passwordInputs = document.querySelectorAll("input[type='password']");

    eyeIcons.forEach(function(eyeIcon, index) {
        eyeIcon.addEventListener("click", function() {
            if (passwordInputs[index].type === "password") {
                passwordInputs[index].type = "text";
                eyeIcon.src = "assets/eye-slash-solid.svg";
            } else {
                passwordInputs[index].type = "password";
                eyeIcon.src = "assets/eye-solid.svg";
            }
        })
    })
})