// Client side Forms verification

function checkForm(event) {
    let name = document.querySelector(".LastNameField");
    let wrongName = document.getElementById('wrongName');
    let nameRE = new RegExp(/^([A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+([-]([A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+)*$/);

    let firstName = document.querySelector(".FirstNameField");
    let wrongFirstName = document.getElementById("wrongFirstName");
    let firstNameRE = new RegExp(/^([A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+([-]([A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+(( |')[A-Za-zàáâäçèéêëìíîïñòóôöùúûü]+)*)+)*$/);

    let email = document.querySelector(".EmailField");
    let wrongEmail = document.getElementById("wrongEmail");
    let emailRE = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,3}))$/);

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
        wrongName.textContent = "Nom requis";
        name.focus();
    }
    if (!nameRE.test(name.value)) {
        event.preventDefault();
        wrongName.style.color = "orange";
        wrongName.textContent = "Nom invalide (numéros non autorisés)";
        name.focus();
    } else wrongName.textContent = "";

    if (firstName.validity.valueMissing) {
        event.preventDefault();
        wrongFirstName.style.color = "red";
        wrongFirstName.textContent = "Prénom requis";
        firstName.focus();
    }
    if (!firstNameRE.test(firstName.value)) {
        event.preventDefault();
        wrongFirstName.style.color = "orange";
        wrongFirstName.textContent = "Prénom invalide (numéros non autorisés)";
        firstName.focus();
    } else wrongFirstName.textContent = "";

    if (email.validity.valueMissing) {
        event.preventDefault();
        wrongEmail.style.color = "red";
        wrongEmail.textContent = "Email requis";
        email.focus();
    }
    if (!emailRE.test(email.value)) {
        event.preventDefault();
        wrongEmail.style.color = "orange";
        wrongEmail.textContent = "Email invalide (ex: info_noreply@muse.com)";
        email.focus();
    } else wrongEmail.textContent = "";

    if (phone.validity.valueMissing) {
        event.preventDefault();
        wrongPhone.style.color = "red";
        wrongPhone.textContent = "Numéro de téléphone requis";
        phone.focus();
    }
    if (!phoneRE.test(phone.value)) {
        event.preventDefault();
        wrongPhone.style.color = "orange";
        wrongPhone.textContent = "Numéro de téléphone invalide (ex: 0123456789, 01.23.45.67.89, or +33(0) 123 456 789)";
        phone.focus();
    } else wrongPhone.textContent = "";
    if ((pro_cb.checked==true) && !dunsRE.test(duns.value)) {
        event.preventDefault();
        wrongDuns.style.color = "orange";
        wrongDuns.textContent = 'Numéro invalide : entrée à 9 chiffres (ex: "123456789")';
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
        } else {
            couponInput.style.display = "block";
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