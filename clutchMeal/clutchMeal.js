
const addBtn = document.getElementById("add-btn");
const ingredientSlot = document.getElementById("ingredient-slot");
const getRecipeBtn = document.getElementById("getRecipeBtn");
const loadingscreen = document.getElementById("loadingScreen");

let slotNum = 2;
let ingredients = "";

let recipeId = "";   //result[i].id
let pictureURL = ""; //result[i].image
let recipeName = ""; //result[i].title
let usedIngredients = ""; //result[i].usedIngredients[i].name
let missedIngredients = ""; //result[i].missedIngredients[i].name

//different API call

//store all the string in 7 session cookies

addBtn.addEventListener("click", ()=>{
    if(!(slotNum > 14)){ //no more than 15 slot can be made
        slotNum++;
        let newSlot = document.createElement("div");
        newSlot.setAttribute("class", "input-group border rounded border-black");
        newSlot.setAttribute("id", String(slotNum));

        newSlot.innerHTML = `<input class = "border-3 border-end-0 form-control" aria-describedby="button-addon" id = "input"
                                style = "background-color: rgb(53, 75, 95);
                                         color: white;" name = "user-input">
                            <button style = "width: 20px;
                                             height: 30px;
                                             background-color: white;" class = "btn btn-white btn-close border border-white border-3 border-start-0 btn-outline-danger" id = "button-addon${slotNum}"></button>`;
        ingredientSlot.appendChild(newSlot);

        let removeBtn = document.getElementById(`button-addon${newSlot.getAttribute("id")}`);

        removeBtn.addEventListener("click", ()=>{
            ingredientSlot.removeChild(newSlot);
            --slotNum;
        })
    } 
});

getRecipeBtn.addEventListener("click", ()=>{ //call the api in this event listener, only call when 2 ingredient is inputted
    let lists = document.getElementsByName("user-input");
    
    for(const element of lists){
        if(element.value === ""){
            continue;
        }
        ingredients += element.value + ", ";
    }
    ingredients = ingredients.slice(0, ingredients.length-2);    //call the api using ingredients
    //start storing the strings as session cookies

    localStorage.setItem("ingredients", JSON.stringify(ingredients));

    callGetFiveRecipes(ingredients);

});

window.addEventListener("click", ()=>{
    let lists = document.getElementsByName("user-input");
    let currNumIngredient = 0;

    for(const element of lists){
        if(element.value === ""){
            continue;
        }
        currNumIngredient++;
    }

    if(currNumIngredient >= 2){
        getRecipeBtn.setAttribute("class", "btn btn-primary");
    }
    else{
        getRecipeBtn.setAttribute("class", "btn btn-primary disabled");
    }
})

async function callGetFiveRecipes(ingredients){
    //replace all comma with %2C

    recipeId = "";   //result[i].id
    pictureURL = ""; //result[i].image
    recipeName = ""; //result[i].title
    usedIngredients = ""; //result[i].usedIngredients[i].name
    missedIngredients = ""; //result[i].missedIngredients[i].name

    ingredients = replaceComma(ingredients);
    const url = `https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/findByIngredients?ingredients=${ingredients}&number=5&ignorePantry=true&ranking=1`;
    const options = {
	method: 'GET',
	    headers: {
		    'X-RapidAPI-Key': '90cf771ad6mshd601521392a956fp11a378jsn863d43aa64a8',
		    'X-RapidAPI-Host': 'spoonacular-recipe-food-nutrition-v1.p.rapidapi.com'
	    }
    };

    try {//grab the ingredients and store as cookies for php to access
	    const response = await fetch(url, options);
        let result = await response.json();

	    console.log(result);
        //for each loop to initialize the 4 string above
        //a for each within a for each for the ingredients
        result.forEach(element => {
            recipeId += element.id;
            recipeId += "_";
            pictureURL += element.image;
            pictureURL += "_";
            recipeName += element.title;
            recipeName += "_";
            
            for(const ingredient of element.usedIngredients){
                usedIngredients += ingredient.name;
                usedIngredients += "/";
            }
            usedIngredients += "_";

            for(const ingredient of element.missedIngredients){
                missedIngredients += ingredient.name;
                missedIngredients += "/";
            }
            missedIngredients += "_";
        });

        document.cookie = `recipeId=${recipeId}`;
        document.cookie = `pictureURL=${pictureURL}`;
        document.cookie = `recipeName=${recipeName}`;
        document.cookie = `usedIngredients=${usedIngredients}`;
        document.cookie = `missedIngredients=${missedIngredients}`;

        window.location.href = "http://localhost/websitePHP/clutchMeal/recipesPage.php";

    } catch (error) {
	    console.error(error);
    }
}

function replaceComma(string){
    let newString = string.replaceAll(',', '%2C');
    return newString;
}