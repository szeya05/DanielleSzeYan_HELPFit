<<<<<<< HEAD
<<<<<<< HEAD
// Validating empty form field
/*function check_empty() {
if (document.getElementById('username').value == "" || document.getElementById('password').value == "" || document.getElementById('fullname').value == ""
 || document.getElementById('email').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}*/

// function to run when the button with member() function is clicked
function member() {
/*document.getElementById('memberB').style.color= "black";
document.getElementById('memberB').style.backgroundColor= "#6C9B9E";
document.getElementById('trainerB').style.color= "#4C5C6A";
document.getElementById('trainerB').style.backgroundColor="transparent";
document.getElementById('trainerB').style.borderStyle="solid";
document.getElementById('trainerB').style.borderColor="black"; */
document.getElementById('level').style.display = "block";
document.getElementById('speciality').style.display = "none";
}

// function to run when the button with trainer() function is clicked
function trainer(){
/*document.getElementById('trainerB').style.color= "black";
document.getElementById('trainerB').style.backgroundColor= "#6C9B9E";
document.getElementById('memberB').style.color= "#4C5C6A";
document.getElementById('memberB').style.backgroundColor="transparent";
document.getElementById('memberB').style.borderStyle="solid";
document.getElementById('memberB').style.borderColor="black";*/
document.getElementById('speciality').style.display = "block";
document.getElementById('level').style.display = "none";
}
=======
// Validating empty form field
function check_empty() {
if (document.getElementById('username').value == "" || document.getElementById('password').value == "" || document.getElementById('fullname').value == ""
 || document.getElementById('email').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
// function to run when the button with member() function is clicked
function member() {
document.getElementById('memberB').style.color= "black";
document.getElementById('memberB').style.backgroundColor= "#6C9B9E";
document.getElementById('trainerB').style.color= "#4C5C6A";
document.getElementById('trainerB').style.backgroundColor="transparent";
document.getElementById('trainerB').style.borderStyle="solid";
document.getElementById('trainerB').style.borderColor="black";
document.getElementById('level').style.display = "block";
document.getElementById('speciality').style.display = "none";
}

// function to run when the button with trainer() function is clicked
function trainer(){
document.getElementById('trainerB').style.color= "black";
document.getElementById('trainerB').style.backgroundColor= "#6C9B9E";
document.getElementById('memberB').style.color= "#4C5C6A";
document.getElementById('memberB').style.backgroundColor="transparent";
document.getElementById('memberB').style.borderStyle="solid";
document.getElementById('memberB').style.borderColor="black";
document.getElementById('speciality').style.display = "block";
document.getElementById('level').style.display = "none";
}
>>>>>>> 5c447c82c1e0a909325998194dc4adde463231c0
=======
// Validating empty form field
function check_empty() {
if (document.getElementById('username').value == "" || document.getElementById('password').value == "" || document.getElementById('fullname').value == ""
 || document.getElementById('email').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
// function to run when the button with member() function is clicked
function member() {
document.getElementById('memberB').style.color= "black";
document.getElementById('memberB').style.backgroundColor= "#6C9B9E";
document.getElementById('trainerB').style.color= "#4C5C6A";
document.getElementById('trainerB').style.backgroundColor="transparent";
document.getElementById('trainerB').style.borderStyle="solid";
document.getElementById('trainerB').style.borderColor="black";
document.getElementById('level').style.display = "block";
document.getElementById('speciality').style.display = "none";
}

// function to run when the button with trainer() function is clicked
function trainer(){
document.getElementById('trainerB').style.color= "black";
document.getElementById('trainerB').style.backgroundColor= "#6C9B9E";
document.getElementById('memberB').style.color= "#4C5C6A";
document.getElementById('memberB').style.backgroundColor="transparent";
document.getElementById('memberB').style.borderStyle="solid";
document.getElementById('memberB').style.borderColor="black";
document.getElementById('speciality').style.display = "block";
document.getElementById('level').style.display = "none";
}
>>>>>>> 19d0b9a5b9d7fc1a18b7746160f293486573f71c
