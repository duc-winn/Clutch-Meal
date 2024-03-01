resetTable();
let cookieData = document.cookie;
cookieData = cookieData.split('; ');

const obj = {};

cookieData.forEach(element => {
    let key = element.substring(0, element.indexOf('='));
    obj[`${key}`] = element.substring(element.indexOf('=') + 1);
})

let recipeId = obj.recipeId; //pass this into the api function call

let picture_url = obj.pictureURL;
let recipe_name = obj.recipeName;
let used_ingredients = obj.usedIngredients;
let missed_ingredients = obj.missedIngredients;
let time_estimate = "";
let instructions = "";

getRecipeInfo(recipeId);


async function getRecipeInfo(inputRecipeId){
    for(let i = 0; i < 5; i++){

        let temp_id = inputRecipeId.substring(0, inputRecipeId.indexOf('_'));

        const url = `https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/${temp_id}/information`;
        const options = {
        method: 'GET',
            headers: {
                'X-RapidAPI-Key': '90cf771ad6mshd601521392a956fp11a378jsn863d43aa64a8',
                'X-RapidAPI-Host': 'spoonacular-recipe-food-nutrition-v1.p.rapidapi.com'
            }
        };

        try {
            const response = await fetch(url, options);
            const result = await response.json();
            console.log(result);
            if(result.cookingMinutes <= 0){
                time_estimate += "Unavailable";
                time_estimate += "_";
            }
            else{
                time_estimate += result.cookingMinutes;
                time_estimate += "_";
            }
    
            if(result.analyzedInstructions.length == 0){
                instructions += result.summary;
                instructions += "_";
            }
            else{
                result.analyzedInstructions[0].steps.forEach(element => {
                    instructions += element.step;
                    instructions += "/";
                });
                instructions += "_";
            }
    
        } catch (error) {
            console.error(error);
        }
        inputRecipeId = inputRecipeId.substring(inputRecipeId.indexOf('_')+1);
    }
    sendDataToPHPFUNC();
}

function resetTable(){ //AjAX function to clear the table
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'removeRecipe.php', true);    //establish a connection to removeRecipe.php
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    let sql = "clear=DELETE FROM recipes";
    xhr.send(sql);
}

function sendDataToPHPFUNC(){
    for(let i = 0; i < 5; i++){
                //waiting
                let url = picture_url.substring(0, picture_url.indexOf('_'));
                let timeEs = time_estimate.substring(0, time_estimate.indexOf('_'));
                let usedIng = used_ingredients.substring(0, used_ingredients.indexOf('_'));
                let missedIng = missed_ingredients.substring(0, missed_ingredients.indexOf('_'));
                let instructs = instructions.substring(0 , instructions.indexOf('_'));
                let name = recipe_name.substring(0, recipe_name.indexOf('_'));

                url = url.replaceAll(/[\'&]/g, " ");
                timeEs = timeEs.replaceAll(/[\'&]/g, " ");
                usedIng = usedIng.replaceAll(/[\'&]/g, " ");
                missedIng = missedIng.replaceAll(/[\'&]/g, " ");
                instructs= instructs.replaceAll(/[\'&]/g, " ");
                name = name.replaceAll(/[\'&]/g, " ");

                let sql = `INSERT INTO recipes (id, picture_url, time_estimate, used_ingredients, missed_ingredients, instructions, recipe_name) 
                        VALUES ('${i+1}', '${url}', '${timeEs}', '${usedIng}', '${missedIng}', '${instructs}', '${name}');`;

                sendDataToPHP(sql);
                picture_url = picture_url.substring(picture_url.indexOf('_') + 1);
                time_estimate = time_estimate.substring(time_estimate.indexOf('_') + 1);
                used_ingredients = used_ingredients.substring(used_ingredients.indexOf('_') + 1);
                missed_ingredients = missed_ingredients.substring(missed_ingredients.indexOf('_') + 1);
                instructions = instructions.substring(instructions.indexOf('_') + 1);
                recipe_name = recipe_name.substring(recipe_name.indexOf('_') + 1);
    }

}

function sendDataToPHP(sql){ //AJAX implementation
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'addRecipe.php', false);    //establish a connection to addRecipe.php
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    let variable = `query=${sql}`;

    xhr.send(variable);  //send the variable $_POST to storeInfo.php
}