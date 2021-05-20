
function loginFormCheck(){
    let accountName = document.getElementById("accountName").value;
    let accountPW = document.getElementById("accountPW").value;
    if(accountName=="" || accountPW ==""){
        alert("Please enter Account name or password information");
        return false;
    }
    else{
        alert("Log in successfully");
        return true;
    }
}

function registerFormCheck(){
    let accountName = document.forms["regForm"]["uname"].value;
    let accountPW = document.forms["regForm"]["psw"].value;
    let accountrePW = document.forms["regForm"]["pswcheck"].value;
    let accountDOB = document.forms["regForm"]["DOB"].value;
    let accountGender = document.forms["regForm"]["Gender"].value;
    var reg = new RegExp(/^(?=.*[a-zA-Z]+)(?=.*[0-9]+)[a-zA-Z0-9]+$/);

    if(accountName=="" || accountPW =="" || accountrePW==""||accountDOB==""||accountGender==""){
        alert("Please fill out all form blanks");
        return false;
    }
    if(accountrePW !="" && accountPW != "" && accountrePW!=accountPW){
        alert("Please make sure the entered passwords are the same");
        return false;
    }
    if(!reg.test("accountPW")){
        alert("Please include both numbers and letters in the password")
        return false;
    }
    else{
        alert("logged in successfully");
    }
    return true;
}

var slideIndex=1;
showSlide(slideIndex);
function showSlide(n){
    var i;
    var slides=document.getElementsByClassName("mySlide fade");

    slideIndex++;
    if(slideIndex> slides.length){
        slideIndex = 1;
    }
    if(n> slides.length){
        slideIndex = 1;
    }
    if(n<1){
        slideIndex = slides.length;
    }
    for(i = 0; i<slides.length;i++){
        slides[i].style.display="none";
    }
    slides[slideIndex-1].style.display="block";
    setTimeout(showSlide,4000);
}



