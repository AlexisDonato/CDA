// Client side Forms verification

function checkForm(event) {
    let name = document.querySelector(".LastNameField");
    let wrongName = document.getElementById('wrongName');
    let nameRE = new RegExp(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.])*/);

    let firstName = document.querySelector(".FirstNameField");
    let wrongFirstName = document.getElementById("wrongFirstName");
    let firstNameRE = new RegExp(/^[A-Z][a-zàéèêëîïôöûüùç.]+([ -][A-Z][a-zàéèêëîïôöûüùç.])*/);

    let email = document.querySelector(".EmailField");
    let wrongEmail = document.getElementById("wrongEmail");
    let emailRE = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,3}))$/);

    let password = document.querySelector(".password-field");
    let wrongPassword = document.getElementById("wrongPassword");
    let passwordRE = new RegExp(/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/);

    let phone = document.querySelector(".PhoneField");
    let wrongPhone = document.getElementById("wrongPhone");
    let phoneRE = new RegExp(/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/); // French phone numbers

    let pro_cb =document.getElementById("registration_form_pro");

    let duns = document.getElementById("registration_form_proDuns");
    let wrongDuns = document.getElementById("wrongDuns");
    let dunsRE = new RegExp(/^[0-9]{9}$/);

    if (name.validity.valueMissing) {
        event.preventDefault();
        wrongName.style.color = "red";
        wrongName.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Nom requis";
        name.focus();
    }
    if (!nameRE.test(name.value)) {
        event.preventDefault();
        wrongName.style.color = "orange";
        wrongName.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Nom invalide (numéros non autorisés, n'oubliez pas les majuscules)";
        name.focus();
    } else wrongName.textContent = "";

    if (firstName.validity.valueMissing) {
        event.preventDefault();
        wrongFirstName.style.color = "red";
        wrongFirstName.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Prénom requis";
        firstName.focus();
    }
    if (!firstNameRE.test(firstName.value)) {
        event.preventDefault();
        wrongFirstName.style.color = "orange";
        wrongFirstName.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Prénom invalide (numéros non autorisés, n'oubliez pas les majuscules)";
        firstName.focus();
    } else wrongFirstName.textContent = "";

    if (email.validity.valueMissing) {
        event.preventDefault();
        wrongEmail.style.color = "red";
        wrongEmail.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Email requis";
        email.focus();
    }
    if (!emailRE.test(email.value)) {
        event.preventDefault();
        wrongEmail.style.color = "orange";
        wrongEmail.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Email invalide (ex: info_noreply@muse.com)";
        email.focus();
    } else wrongEmail.textContent = "";

    if (password.validity.valueMissing) {
        event.preventDefault();
        wrongPassword.style.color = "red";
        wrongPassword.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe requis";
        password.focus();
    }
    if (!passwordRE.test(password.value)) {
        event.preventDefault();
        wrongPassword.style.color = "orange";
        wrongPassword.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Mot de passe invalide (6 caractères, 1 majuscule, 1 minuscule et 1 chiffre minimum)";
        password.focus();
    } else wrongPassword.textContent = "";

    if (phone.validity.valueMissing) {
        event.preventDefault();
        wrongPhone.style.color = "red";
        wrongPhone.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Numéro de téléphone requis";
        phone.focus();
    }
    if (!phoneRE.test(phone.value)) {
        event.preventDefault();
        wrongPhone.style.color = "orange";
        wrongPhone.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> Numéro de téléphone invalide (ex: 0123456789, 01.23.45.67.89, ou +33(0) 123 456 789)";
        phone.focus();
    } else wrongPhone.textContent = "";
    if ((pro_cb.checked==true) && !dunsRE.test(duns.value)) {
        event.preventDefault();
        wrongDuns.style.color = "orange";
        wrongDuns.innerHTML = `<i class='fa-solid fa-circle-exclamation'></i> Numéro invalide : entrée à 9 chiffres (ex: "123456789")`;
        pro_form.style.display="block";
        duns.focus();
    } else wrongDuns.textContent = "";
}

if (document.getElementById("submit")) {
    document.getElementById("submit").addEventListener("click", checkForm);
}


function proSubForm() {

    let pro_cb = document.getElementById("registration_form_pro");
    let pro_form = document.getElementById("proForm");
    let company_name = document.getElementById("registration_form_proCompanyName");
    let duns = document.getElementById("registration_form_proDuns");
    let job = document.getElementById("registration_form_proJobPosition");

        if (pro_cb.checked==true) {
            pro_form.style.display="block";
            pro_cb.scrollIntoView({behavior: "smooth", block: "center", inline: "start"});;
            company_name.setAttribute('required', '');
            duns.setAttribute('required', '');
            job.setAttribute('required', '');
        } else {
            pro_form.style.display="none";
            company_name.removeAttribute('required', '');
            duns.removeAttribute('required', '');
            job.removeAttribute('required', '');
        }
        if (pro_cb.checked==false) {
            pro_form.style.display="none";
            company_name.removeAttribute('required', '');
            duns.removeAttribute('required', '');
            job.removeAttribute('required', '');
        }
    }


function addCoupon() {

    let couponButton = document.getElementById("couponButton");
    let couponInput = document.getElementById("couponInput");

        if (getComputedStyle(couponInput).display != "none") {
            couponInput.style.display = "none";
            CouponButton.scrollIntoView({behavior: "smooth", block: "center", inline: "start"});
        } else {
            couponInput.style.display = "block";
            couponInput.scrollIntoView({behavior: "smooth", block: "center", inline: "start"});
        }
}


function newAddress() {

    let newAddressButton = document.getElementById("newAddressButton");
    let newAddressForm = document.getElementById("newAddressForm");

    let newAddressName = document.getElementById("newAddressName");
    let newAddressCountry = document.getElementById("newAddressCountry");
    let newAddressZipcode = document.getElementById("newAddressZipcode");
    let newAddressCity = document.getElementById("newAddressCity");
    let newAddressPathType = document.getElementById("newAddressPathType");
    let newAddressPathNumber = document.getElementById("newAddressPathNumber");

        if (getComputedStyle(newAddressForm).display != "none") {

            newAddressForm.style.display="none";
            newAddressButton.scrollIntoView({behavior: "smooth", block: "nearest", inline: "nearest"});

            newAddressName.removeAttribute('required', '');
            newAddressCountry.removeAttribute('required', '');
            newAddressZipcode.removeAttribute('required', '');
            newAddressCity.removeAttribute('required', '');
            newAddressPathType.removeAttribute('required', '');
            newAddressPathNumber.removeAttribute('required', '');

        } else {

            newAddressForm.style.display="block";
            newAddressForm.scrollIntoView({behavior: "smooth", block: "nearest", inline: "nearest"});

            newAddressName.setAttribute('required', '');
            newAddressCountry.setAttribute('required', '');
            newAddressZipcode.setAttribute('required', '');
            newAddressCity.setAttribute('required', '');
            newAddressPathType.setAttribute('required', '');
            newAddressPathNumber.setAttribute('required', '');
        }

        newAddressButton.onclick = newAddress();

        if (document.getElementById("newAddressButton")) {
            document.getElementById("newAddressButton").addEventListener("click", newAddress);
    }
}


function payCard() {

    let payCardButton = document.getElementById("payCardButton");
    let payCardForm = document.getElementById("payCardForm");

        if (getComputedStyle(payCardForm).display != "none") {
            payCardForm.style.display = "none";
            payCardButton.scrollIntoView({behavior: "smooth", block: "center", inline: "start"});
        } else {
            payCardForm.style.display = "block";
            payCardForm.scrollIntoView({behavior: "smooth", block: "center", inline: "start"});
        }
}


// Nouislider

// import noUiSlider from 'nouislider'
// import 'nouislider/distribute/nouislider.css'

// const slider = document.getElementById('price-slider');

// if (slider) {
//     noUiSlider.create(slider, {
//         start: [20, 80],
//         connect: true,
//         range: {
//             'min': 0,
//             'max': 100
//         }
//     })
// };