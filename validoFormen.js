document.addEventListener("DOMContentLoaded", function () {
    const btnSubmit = document.getElementById('submitbtn');
    const validate = (event) => {
        const perdoruesi = document.getElementById('username');
        const fjalkalimi = document.getElementById('password');
        if (perdoruesi.value === "") {
            alert("Shkruani perdoruesin.");
            perdoruesi.focus();
            event.preventDefault();
            return false;
        }
        if (fjalkalimi.value === "") {
            alert("Shkruani passwordin.");
            fjalkalimi.focus();
            event.preventDefault();
            return false;
        }
        return true;
    };
    function passwordValid(password){
        return password.length > 8;
    }

    const emailValid = (email) => {
        const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
        return emailRegex.test(email.toLowerCase());
    };

    btnSubmit.addEventListener('click', validate);
});
