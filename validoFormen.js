document.addEventListener("DOMContentLoaded", function () {
    const btnSubmit = document.getElementById('submitbtn');
    const validate = (event) => {
        event.preventDefault();
        const perdoruesi = document.getElementById('username');
        const fjalkalimi = document.getElementById('password');
        const emrin = document.getElementById('emrimbiemri');
        const emailin = document.getElementById('emailadress');

        if (perdoruesi.value === "") {
            alert("Shkruani perdoruesin.");
            perdoruesi.focus();
            return false;
        }
        if (fjalkalimi.value === "") {
            alert("Shkruani passwordin.");
            fjalkalimi.focus();
            return false;
        }
        if (emrin.value === "") {
            alert("Shkruani emrin dhe mbiemrin.");
            emrin.focus();
            return false;
        }
        if (emailin.value === "") {
            alert("Shkruani email'in.");
            emailin.focus();
            return false;
        }

        if (!emailValid(emailin.value)) {
            alert("Shkruani nje email valide.");
            emailin.focus();
            return false;
        }
        if(!passwordValid(fjalkalimi.value)){
            return alert("Passwordi duhe ti kete mbi 8 karaktere.");
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
