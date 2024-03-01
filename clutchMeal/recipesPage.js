const loadingScreen = document.getElementById("loadingScreen");
let loadingIcon = document.createElement("div");
const mainContainer = document.querySelector(".main-container");
const recipe1Btn = document.getElementById("recipe1-btn");
const recipe2Btn = document.getElementById("recipe2-btn");
const recipe3Btn = document.getElementById("recipe3-btn");
const recipe4Btn = document.getElementById("recipe4-btn");
const recipe5Btn = document.getElementById("recipe5-btn");

let loadIcon = document.createElement("div");
loadIcon.setAttribute("class", "spinner-border text-light");
loadIcon.setAttribute("id", "load-icon");
loadIcon.innerHTML = `<span class="visually-hidden">Loading...</span>`;

mainContainer.appendChild(loadIcon);

setTimeout(() => {
    loadingScreen.style.display = "none";
    mainContainer.removeChild(loadIcon);
    let data = JSON.parse(localStorage.getItem("ingredients"));
    let headerMain = document.getElementById("mainHeader");

    headerMain.innerText = `Recipies to make with ${data}`;

    recipe1Btn.addEventListener("click", ()=>{
        if(window.innerWidth < 768){
            setTimeout(() => {
                window.scrollTo(0, 590);
            }, 200);
        }  
    });

    recipe2Btn.addEventListener("click", ()=>{
        if(window.innerWidth < 768){
            setTimeout(() => {
                window.scrollTo(0, 590);
            }, 200);
        }  
    });

    recipe3Btn.addEventListener("click", ()=>{
        if(window.innerWidth < 768){
            setTimeout(() => {
                window.scrollTo(0, 590);
            }, 200);
        }  
    });

    recipe4Btn.addEventListener("click", ()=>{
        if(window.innerWidth < 768){
            setTimeout(() => {
                window.scrollTo(0, 590);
            }, 200);
        }  
    });

    recipe5Btn.addEventListener("click", ()=>{
        if(window.innerWidth < 768){
            setTimeout(() => {
                window.scrollTo(0, 590);
            }, 200);
        }  
    });


}, 4500);//this will call the callback function in 5sec


