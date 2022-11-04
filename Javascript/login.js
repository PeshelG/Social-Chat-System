const form = document.querySelector(".signup.login form"),
continueBtn = document.querySelector(".login form button.btn"),
errorArea = document.querySelector("form .field.error"),
errorText = document.querySelector(".errorTxt");


form.onsubmit = (e) =>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data =="success"){
                    location.href = "users.php";
                }else{
                    errorArea.style.display = "block";
                    errorText.textContent= data;
                    errorText.style.display= "block";  
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
   
}