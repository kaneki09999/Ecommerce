<?php

    include "connection1.php";

    $firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
	$gender = $_POST['gender'];
	$birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
	$street = $_POST['street'];
	$city = $_POST['city'];
    $province = $_POST['province'];
	$barangay = $_POST['barangay'];
	$username = $_POST['username'];
    $email = $_POST['email'];
	$password = $_POST['password'];




    $query = "INSERT INTO  datas (firstname, middlename, lastname, phonenumber, gender, birthdate, age, street, city, province, barangay, username, email, password) VALUES 
	('$firstname', '$middlename', '$lastname', '$phonenumber', '$gender', '$birthdate', '$age', '$street', '$city', '$province', '$barangay', '$username', '$email', '$password')";



	if  ($conn->query($query) == true)
	{
		echo json_encode("added");
	}




?>