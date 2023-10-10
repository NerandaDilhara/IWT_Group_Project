let submit = document.getElementById("submit");
let para2 = document.getElementById("para2");
let para3 = document.getElementById("para3");
let btn2 = document.getElementById("btn2");

submit.addEventListener("click", submitFunc);
btn2.addEventListener("click", para2Func);
btn2.addEventListener("click", para3Func);

function submitFunc(){
    robot.style.background = "green";
    robot.style.color = "white";
    window.location.href = "signIn.html";
}

function para2Func(){
    para2.innerHTML = "Enter Password: ";
}

function para3Func(){
    para3.innerHTML = "Confirm Password: ";
}