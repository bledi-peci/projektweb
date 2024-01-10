document.addEventListener("DOMContentLoaded", function () {
    const signupForm = document.getElementById('signupForm');
    const btnSubmit = document.getElementById('submitbtn');

    const validate = (event) => {
        const username = document.getElementById('username');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');
        const name = document.getElementById('emrimbiemri');
        const email = document.getElementById('emailadress');
        const birthday = document.getElementById('birthday');
        const gender = document.getElementById('gender');

        if (username.value === "") {
            alert("Shkruani username-in tuaj.");
            username.focus();
            return false;
        }
        if (password.value === "" || !passwordValid(password.value)) {
            alert("Passwordi duhet te kete me shume se 8 karaktere.");
            password.focus();
            return false;
        }
        if (confirmPassword.value === "" || confirmPassword.value !== password.value) {
            alert("Passwordi nuk perputhet!");
            confirmPassword.focus();
            return false;
        }
        if (name.value === "" || !nameValid(name.value)) {
            alert("Shenoni emrin tuaj (vetem shkronja).");
            name.focus();
            return false;
        }
        if (email.value === "" || !emailValid(email.value)) {
            alert("Shkruani nje email adrese valide.");
            email.focus();
            return false;
        }
        if (birthday.value === "") {
            alert("Shkruani ditelindjen tuaj.");
            birthday.focus();
            return false;
        }
        if (gender.value === "") {
            alert("Zgjedhni gjinine.");
            gender.focus();
            return false;
        }

        // If all validations pass, submit the form
        signupForm.submit();
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

    btnSubmit.addEventListener('click', validate);
});
