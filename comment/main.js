let toggle = true;

let toggle_click = function(){


  if(toggle==true){
    
    let navbar= document.querySelector(".nav-bar");
    let wrapper = document.querySelector(".wrapper");
    let container = document.querySelector(".page-container");
    wrapper.style.width = "100%";
    wrapper.style.height = "100%";
    wrapper.style.transition = "2s";
    container.style.display = "none";
    container.style.transition = "2s";
    
   navbar.style.visibility = "hidden";
   navbar.style.width = "0px";
   navbar.style.height = "0px";
   toggle=false;
  }
  else if(toggle==false){
    let wrapper = document.querySelector(".wrapper");
    let container = document.querySelector(".page-container");
    wrapper.style.width = "0%";
    wrapper.style.height = "0%";
    wrapper.style.transition = "3s";
    container.style.display = "block";
    container.style.transition = "3s";
    let navbar= document.querySelector(".nav-bar");
    navbar.style.visibility = "visible";
    navbar.style.width = "100%";
    navbar.style.height = "80px";
    toggle = true;
  }
  }