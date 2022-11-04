// JavaScript Document
 
/*const text = document.querySelector(".search span"),


searchButton.onclick = ()=>{
	
	searchTextbox.focus();
	
}; */
searchButton = document.querySelector(".search button");
const searchTextbox = document.querySelector(".search input[type='text']"),
userList = document.querySelector(".wrapper .list");

searchTextbox.onkeyup = ()=>{
 let searchTerm = searchTextbox.value;

 let xhr = new XMLHttpRequest();
 xhr.open("POST", "php/search.php",true);
 xhr.onload = ()=>{
	 if(xhr.readyState === XMLHttpRequest.DONE){
		 if(xhr.status === 200){
			 let data = xhr.response;
			 console.log(data);
		 }
	 }
 }
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 xhr.send("SearchTerm" + searchTerm);
}

setInterval(() =>{
	let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php",true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
				userList.innerHTML = data;
            }
        }
    }
    xhr.send();
}, 500);