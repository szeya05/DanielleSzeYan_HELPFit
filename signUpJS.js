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
