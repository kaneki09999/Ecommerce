const form = document.querySelector('#form3');
const firstname = document.querySelector('#firstname');
const middlename = document.querySelector('#middlename');
const lastname = document.querySelector('#lastname');
const phonenumber = document.querySelector('#phonenumber');
const gender = document.querySelector('#gender');
const birthdate = document.querySelector('#birthdate');
const age = document.querySelector('#age');
const street = document.querySelector('#street');
const city = document.querySelector('#city');
const province = document.querySelector('#province');
const barangay = document.querySelector('#barangay');
const username = document.querySelector('#username');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const password2 = document.querySelector('#password2');
    






form.addEventListener('submit', e => {  
     validateInputs();
    if(isFormValid()==true){
        form.submit();
     }else {
        e.preventDefault();
     }

});


function isFormValid(){
    const container = form.querySelectorAll('.input-control');
    let result = true;
    container.forEach((container)=>{
        if(container.classList.contains('error')){
            result = false;
        }
    });
    return result;
}


function setError (element, message) {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

function setSuccess (element) {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

function isValidEmail (email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateInputs()  {
    const firstnameValue = firstname.value.trim();
    const middlenameValue = middlename.value.trim();
    const lastnameValue = lastname.value.trim();
    const phonenumberValue = phonenumber.value.trim();
    const genderValue = gender.value.trim();
    const birthdateValue = birthdate.value.trim();
    const ageValue = age.value.trim();
    

    const streetValue = street.value.trim();
    const cityValue = city.value.trim();
    const provinceValue = province.value.trim();
    const barangayValue = barangay.value.trim();
    
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    

    if(firstnameValue === '') {
        setError(firstname, 'firstname is required');
    } else {
        setSuccess(firstname);
    }

    if(middlenameValue === '') {
        setError(middlename, 'middlename is required');
    } else {
        setSuccess(middlename);
    }

    if(lastnameValue === '') {
        setError(lastname, 'lastname is required');
    } else {
        setSuccess(lastname);
    }
    if(genderValue === 'Gender') {
        setError(gender, 'Gender is required');
    } else {
        setSuccess(gender);
    }
    if(phonenumberValue === '') {
        setError(phonenumber, 'phonenumber is required');
    } else if (phonenumberValue.length < 10 ) {
        setError(phonenumber, 'Phone Number must be at least 10 number.');
    }
    else {
        setSuccess(phonenumber);
    }

    if(usernameValue === '') {
        setError(username, 'Username is required');
    } else {
        setSuccess(username);
    }

    if(emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
    }

    if(passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8 ) {
        setError(password, 'Password must be at least 8 character.')
    } else {
        setSuccess(password);
    }

    if(password2Value === '') {
        setError(password2, 'Please confirm your password');
    } else if (password2Value !== passwordValue) {
        setError(password2, "Passwords doesn't match");
    } else {
        setSuccess(password2);
    }

    if(streetValue === '') {
        setError(street, 'street is required');
    } else {
        setSuccess(street);
    }

    if(cityValue === '') {
        setError(city, 'city is required');
    } else {
        setSuccess(city);
    }
    if(provinceValue === '') {
        setError(province, 'province is required');
    } else {
        setSuccess(province);
    }
    if(barangayValue === '') {
        setError(barangay, 'barangay is required');
    } else {
        setSuccess(barangay);
    }







    
};



var form2 = document.getElementById("form2");
var form3 = document.getElementById("form3");

var next1 = document.getElementById("next1");
var next2 = document.getElementById("next2");
var back1 = document.getElementById("back1");
var back2 = document.getElementById("back2");

var progress = document.getElementById("progress");

next1.onclick = function() {
   form1.style.left = "-350px";
   form2.style.left = "1px";
   progress.style.width = "240px";
}
back1.onclick = function() {
   form1.style.left = "1px";
   form2.style.left = "350px";
   progress.style.width = "120px";
}
next2.onclick = function() {
   form2.style.left = "-350px";
   form3.style.left = "1px";
   progress.style.width = "360px";
}
back2.onclick = function() {
   form2.style.left = "1px";
   form3.style.left = "351px";
   progress.style.width = "240px";
}

function FindAge() {
    var day = document.getElementById("birthdate").value;
    var DOB = new Date(day);
    var today= new Date();
    var Age = today.getTime() - DOB.getTime();
    var Age = Math.floor(Age / (1000 * 60 * 60 * 24 * 365.25));
    document.getElementById("age"). value = Age;
}


