document.addEventListener("DOMContentLoaded", function () {
    const signupForm = document.getElementById('signupForm');

    const validate = (event) => {
        const username = document.getElementById('username');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        const name = document.getElementById('emrimbiemri');
        const email = document.getElementById('emailadress');
        const birthday = document.getElementById('birthday');
        const gender = document.getElementById('gender');

        if (username.value === "" || password.value === "" || confirmPassword.value === "" || name.value === "" || email.value === "" || birthday.value === "" || gender.value === "" || confirmPassword.value !== password.value || !passwordValid(password.value) || !nameValid(name.value) || !emailValid(email.value)) {
            event.preventDefault(); 
            if (username.value === "") {
                alert("Shkruani username-in tuaj.");
                username.focus();
            } else if (password.value === "" || !passwordValid(password.value)) {
                alert("Passwordi duhet te kete me shume se 8 karaktere.");
                password.focus();
            } else if (confirmPassword.value === "" || confirmPassword.value !== password.value) {
                alert("Passwordi nuk perputhet!");
                confirmPassword.focus();
            } else if (name.value === "" || !nameValid(name.value)) {
                alert("Shenoni emrin tuaj (vetem shkronja).");
                name.focus();
            } else if (email.value === "" || !emailValid(email.value)) {
                alert("Shkruani nje email adrese valide.");
                email.focus();
            } else if (birthday.value === "") {
                alert("Shkruani ditelindjen tuaj.");
                birthday.focus();
            } else if (gender.value === "") {
                alert("Zgjedhni gjinine.");
                gender.focus();
            }
        }
    };

    function passwordValid(password) {
        return password.length >= 8;
    }

    function nameValid(name) {
        const nameRegex = /^[A-Za-z\s]+$/;
        return nameRegex.test(name);
    }

    function emailValid(email) {
        const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
        return emailRegex.test(email.toLowerCase());
    };

    signupForm.addEventListener('submit', validate);
});
