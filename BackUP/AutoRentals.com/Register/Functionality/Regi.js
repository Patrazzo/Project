let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.Links');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}

const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const password = document.getElementById('password');
const email = document.getElementById('email');
const tel = document.getElementById('tel');
const egn = document.getElementById('egn');

fname.addEventListener('blur', validateFirstName);
lname.addEventListener('blur', validateLastName);
password.addEventListener('blur', validatePassword);
email.addEventListener('blur', validateEmail);
tel.addEventListener('blur', validateMobileNumber);
egn.addEventListener('blur', validateEgn);

function validateFirstName() {
    const re = /^[a-zA-Z]{2,15}$/;
    let classes = fname.parentElement.classList
    if (!re.test(fname.value)) {
        if (classes.contains('valid')) classes.remove('valid')
        classes.add('invalid')
    } else {
        if (classes.contains('invalid')) classes.remove('invalid')
        classes.add('valid')
    }
}
function validateLastName() {
    const re = /^[a-zA-Z]{2,15}$/;
    let classes = lname.parentElement.classList
    if (!re.test(lname.value)) {
        if (classes.contains('valid')) classes.remove('valid')
        classes.add('invalid')
    } else {
        if (classes.contains('invalid'))classes.remove('invalid')
        classes.add('valid')
    }
}


function validatePassword() {
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    let classes = password.parentElement.classList
    if (!re.test(password.value)) {
        if (classes.contains('valid')) classes.remove('valid')
        classes.add('invalid')
    } else {
        if (classes.contains('invalid'))classes.remove('invalid')
        classes.add('valid')
    }
}

function validateEmail() {
    const re = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    let classes = email.parentElement.classList
    if (!re.test(email.value)) {
        if (classes.contains('valid')) classes.remove('valid')
        classes.add('invalid')
    } else {
        if (classes.contains('invalid'))classes.remove('invalid')
        classes.add('valid')
    }
}

function validateMobileNumber() {
    const re = /^[0-9]{10}$/;
    let classes = tel.parentElement.classList
    if (!re.test(tel.value)) {
        if (classes.contains('valid')) classes.remove('valid')
        classes.add('invalid')
    } else {
        if (classes.contains('invalid'))classes.remove('invalid')
        classes.add('valid')
    }
}

function validateEgn() {
    const re = /^[0-9]{10}$/;
    let classes = egn.parentElement.classList
    if (!re.test(egn.value)) {
        if (classes.contains('valid')) classes.remove('valid')
        classes.add('invalid')
    } else {
        if (classes.contains('invalid'))classes.remove('invalid')
        classes.add('valid')
    }
}