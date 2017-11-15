// function to run when the button with member() function is clicked
function member() {
document.getElementById('memberB').style.color= "black";
document.getElementById('memberB').style.backgroundColor= "#6C9B9E";
document.getElementById('trainerB').style.color= "#4C5C6A";
document.getElementById('trainerB').style.backgroundColor="transparent";
document.getElementById('trainerB').style.borderStyle="solid";
document.getElementById('trainerB').style.borderColor="grey";
document.getElementById('level').style.display = "block";
document.getElementById('specialty').style.display = "none";
}

// function to run when the button with trainer() function is clicked
function trainer(){
document.getElementById('trainerB').style.color= "black";
document.getElementById('trainerB').style.backgroundColor= "#6C9B9E";
document.getElementById('memberB').style.color= "#4C5C6A";
document.getElementById('memberB').style.backgroundColor="transparent";
document.getElementById('memberB').style.borderStyle="solid";
document.getElementById('memberB').style.borderColor="grey";
document.getElementById('specialty').style.display = "block";
document.getElementById('level').style.display = "none";
}

//function to show a pop up when user clicks on the button
function saveC(){
  alert("Changes successfully saved");
}

//to validate the sign up form text input fields
function validateForm() {
    var w = document.forms["form"]["username"].value;
    if (w == "") {
        alert("Username must be filled out");
        return false;
    }
    var x = document.forms["form"]["password"].value;
    if (x == "") {
        alert("Password must be filled out");
        return false;
    }
    var y = document.forms["form"]["fullname"].value;
    if (y == "") {
        alert("Fullname must be filled out");
        return false;
    }
    var z = document.forms["form"]["email"].value;
    if (z == "") {
        alert("Email must be filled out");
        return false;
    }
    return true;
}
//to validate if the text inputs for personal training are left empty
function validatePS() {
    var w = document.forms["form"]["title"].value;
    if (w == "") {
        alert("Title must be filled out");
        return false;
    }
    var z = document.forms["form"]["fee"].value;
    if (z == "") {
        alert("Fee must be filled out");
        return false;
    }
    return true;
}

///to validate if the text inputs for group training are left empty
function validateGS() {
    var w = document.forms["form"]["title"].value;
    if (w == "") {
        alert("Title must be filled out");
        return false;
    }
    var z = document.forms["form"]["fee"].value;
    if (z == "") {
        alert("Fee must be filled out");
        return false;
    }
    var y = document.forms["form"]["maxNum"].value;
    if (y == "") {
        alert("Maximum number of participants must be filled out");
        return false;
    }
    return true;
}
