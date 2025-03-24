$(document).ready(function(){
    
$("#submit").click(function(){
    var firstname = $("#firstname").val();
    var middlename = $("#middlename").val();
    var lastname = $("#lastname").val();
    var phonenumber = $("#phonenumber").val();
    var gender = $("#gender").val();
    var birthdate = $("#birthdate").val();
    var age = $("#age").val();
    var street = $("#street").val();
    var city = $("#city").val();
    var province = $("#province").val();
    var barangay = $("#barangay").val();
    var username = $("#username").val();
    var email  = $("#email").val();
    var password = $("#password").val();


    $.ajax({
        url: '../php/adding1.php',
        type: "POST",
        data: {
            firstname:firstname,
            middlename:middlename,
            lastname:lastname,
            phonenumber:phonenumber,
            middlename:middlename,
            gender:gender,
            birthdate:birthdate,
            age:age,
            street:street,
            city:city,
            province:province,
            barangay:barangay,
            username:username,
            email:email,
            password:password
        },
        datatype: "json",
        success: function(data)
        {
            
        console.log(data);
        }
    });
});

});


