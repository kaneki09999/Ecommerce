
// PARA SA VALIDATION NA KAPAG WALA KANG ININPUT NA KAHIT ANO DI SIYA MAGNENEXT PAGE

const btnNext = document.querySelector('form .btn .next');
const btnPrev = document.querySelector('form .btn .prev');
const indicator = document.querySelector('.indicator .line span');
const indicatorItems = document.querySelectorAll('.indicator p');
const form = document.querySelector('form');
const allTab = document.querySelectorAll('form .tab');

let i = 0;


allTab[i].classList.add('show');
indicator.style.width = i;
indicatorItems[i].classList.add('active');  


if (i === 0) {
    btnPrev.style.display = 'none';
} else {
    btnPrev.style.display = 'block';
}


btnNext.addEventListener('click', function () {
    const allInputPerTab = allTab[i].querySelectorAll('input');
    for (let j = 0; j < allInputPerTab.length; j++) {
        allInputPerTab[j].addEventListener('input', function (){
            allInputPerTab[j].style.borderColor = '#ddd';
    });

    if (allInputPerTab[j].value === '' || !allInputPerTab[j].checkValidity()) {
        allInputPerTab[j].style.borderColor = 'var(--red)';
        return false
    } else {
        allInputPerTab[j].style.borderColor = '#ddd';
    }

    
    }

    i += 1;
    
    if (i >= allTab.length) {
        form.submit();
        return false;
    } else {
        for (let j = 0; j < allTab.length; j++) {
            allTab[j].classList.remove('show');
            indicatorItems[j].classList.remove('active');
        }

        for (let j = 0; j < i; j++) {
            indicatorItems[j].classList.add('active');
        }
    allTab[i].classList.add('show');
    indicator.style.width = `${i * 50}%`; 
    indicatorItems[i].classList.add('active');      
    }

    if (i === 0) {
        btnPrev.style.display = 'none';
    } else {
        btnPrev.style.display = 'block';
    }

    if (i ===allTab.length - 1) {
        btnNext.innerHTML = 'Submit';
    } else {
        btnNext.innerHTML = 'Next';
    }

    function validate () {
        var format = document.form.format.value;
        if (format=""){
            alert("Select Gender");
            document.form.format.focus();
            return false;
        }else {
            alert ("");
        }
        }
        
});
 


btnPrev.addEventListener('click', function () {
    i -= 1;
    
    if (i >= allTab.length) {

    } else {
        for (let j = 0; j < allTab.length; j++) {
            allTab[j].classList.remove('show');
            indicatorItems[j].classList.remove('active');
        }

        for (let j = 0; j < i; j++) {
            indicatorItems[j].classList.add('active');
        }
    allTab[i].classList.add('show');
    indicator.style.width = `${i * 50}%`; 
    indicatorItems[i].classList.add('active');      
    }

    if (i === 0) {
        btnPrev.style.display = 'none';
    } else {
        btnPrev.style.display = 'block';
    }

    if (i ===allTab.length - 1) {
        btnNext.innerHTML = 'Submit';
        
    } else {
        btnNext.innerHTML = 'Next';
    }
});


function togglePasswordVisibility(icon) {
    const input = icon.previousElementSibling;
    if (input.type === "password") {
        input.type = "text";
        icon.querySelector("i").classList.remove("fa-eye");
        icon.querySelector("i").classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.querySelector("i").classList.remove("fa-eye-slash");
        icon.querySelector("i").classList.add("fa-eye");
    }
}


//ETO NAMAN YUNG SA BIRTDATE NA KAPAG NILAGAY MO YUNG DATE NG BDAY MO LALABAS AGAD YUNG AGE
function FindAge() {
    var birthdateInput = document.getElementById("birthdate");
    var ageInput = document.getElementById("age");
    var errorDiv = document.querySelector(".tab.show .error");
    var birthdate = new Date(birthdateInput.value);
    var currentDate = new Date();

    var age = currentDate.getFullYear() - birthdate.getFullYear();
    var monthDiff = currentDate.getMonth() - birthdate.getMonth();
    var dayDiff = currentDate.getDate() - birthdate.getDate();

    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
        age--;
    }

    if (isNaN(age)) {
        age = "";
    }

    ageInput.value = age;

    if (age < 18) {
        errorDiv.textContent = "You must be 18 years or above.";
        errorDiv.style.display = "block";
    } else {
        errorDiv.textContent = "";
        errorDiv.style.display = "none";
    }
}

document.getElementById("birthdate").addEventListener("change", FindAge);