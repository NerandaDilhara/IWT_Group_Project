const form= document.querySelector("formBox2"),
statusTxt = form.querySelector();

form.onsubmit=(e)={
    e.preventDefault(); //preventing form from submitting
    statusTxt.style.color="red";
    statusTxt.style.display= "block";

    let xhr = new XMLHttpRequest();  //creating new xml object
    xhr.open("POST","message.php" true);  //sending post request to message.php file
    xhr.onload = ()=>{ //once ajax loaded
        if(xhr.readyState ==4 && xhr.status == 200){
            let responce = xhr.responce; // storing ajax responce in a responce variables
            if(responce.indexOf("Email and password field is required!") !=-1 || responce.indexOf("Enter a valid email address!") || responce.indexOf("Sorry, failed to send your message!")){
                statusTxt.style.color="red";   
            }else{
                form.requestFullscreen();
                setTimeout(()=>{
                    statusTxt.style.display= "none";
                },3000);
            }
            
            statusTxt.innerText = responce;
        }
    }
    let formData=new FormData(form);  //creating new form data object this obj is used to send form data
    xhr.send(formData)

    xhr.send();


}