<?php session_start() ?>
<?php include("database.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src = "storeInfo.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="recipesPage.css">
    <title>Clutch Meal</title>
</head>
<body>
    <a href = "http://localhost/websitePHP/clutchMeal/clutchMeal.php">
        <img id = "go-back-img" src = "websiteImages/dec-6.png">
    </a>
    <div id = "name-background"></div>
    <div id = "loadingScreen"></div>

    <div class="container main-container" style="height: 500px;">
        <div class="row">
            <div class="col">
                <h1 id = "mainHeader">Recipies to make with [...]</h1>
            </div>
        </div>

        <div class="row" style = "height: 400px;">
            <div class="col-md-5 col-12">
                <div id = "recipe-name-container">
                    <div class="row vstack gy-3" id = "inner-row">
                        <div class="col">
                            <div class = "d-grid gap-2" id = "button1">
                                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#recipe1" aria-expanded="false" aria-controls="recipe1" id = "recipe1-btn">
                                   loading...
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <div class = "d-grid gap-2" id = "button2">
                                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#recipe2" aria-expanded="false" aria-controls="recipe2" id = "recipe2-btn">
                                    loading...
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <div class = "d-grid gap-2" id = "button3">
                                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#recipe3" aria-expanded="false" aria-controls="recipe3" id = "recipe3-btn">
                                    loading...
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <div class = "d-grid gap-2" id = "button4">
                                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#recipe4" aria-expanded="false" aria-controls="recipe4" id = "recipe4-btn">
                                    loading...
                                </button>
                            </div>
                        </div>
                        <div class="col">
                            <div class = "d-grid gap-2" id = "button5">
                                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#recipe5" aria-expanded="false" aria-controls="recipe5" id = "recipe5-btn">
                                    loading...
                                </button>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="col-md-6 col-12 offset-md-1 mt-md-0 mt-5">
                        <div class="collapse" id="recipe1">
                        <div class="card card-body" id = "recipe1-div">
                            <div id = "exit-btn-container">
                            <form onsubmit = "return false" style = "display: inline;" action = "recipesPage.php" method = "post">
                                <button class = "fa-solid fa-heart" name = "submit" id = "like-btn1" type = "submit" style = "position: absolute;left: 20px; top: 7px; width: 0px; height: 0px; font-size: 35px; border: none; background-color: white;" onclick="return false;"></button> 
                            </form>
                            
                                <button class = "btn btn-close" style = "background-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#recipe1" aria-expanded="true" aria-controls="recipe1" id = "recipe1-closeBtn"></button>
                            </div>

                            <div id = "img1-container">
                                <img id = "img1" style = "width: 100%;">
                            </div>
                            <div class = "hstack justify-content-between">
                                <div id = "recipe1-name">
                                    
                                </div>
                                <div id = "recipe1-preptime">
                                    
                                </div>
                            </div>

                            <div class = "vstack d-flex align-items-start mt-4" id = "ingredients-list-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Ingredients</div>
                                <ul id = "has-1">
                                    
                                </ul>
                                <ul id = "do-not-have-1" style = "color: red;">
                                   
                                </ul>
                            </div>

                            <div class = "mt-4 vstack d-flex align-items-start" id = "instructions-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Instructions</div>
                                <div id = "instruction-content">
                                    <ul id = "instruction1-content">
                                            <!--continue to add <li> element for the instructions-->
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="collapse" id="recipe2">
                        <div class="card card-body" id = "recipe2-div">
                            <div id = "exit-btn-container">
                                <form onsubmit = "return false" style = "display: inline;" action = "recipesPage.php" method = "post">
                                    <button class = "fa-solid fa-heart" name = "submit" id = "like-btn2" type = "submit" style = "position: absolute;left: 20px; top: 7px; width: 0px; height: 0px; font-size: 35px; border: none; background-color: white;" onclick="return false;"></button> 
                                </form>

                                <button class = "btn btn-close" style = "background-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#recipe2" aria-expanded="true" aria-controls="recipe2"></button>
                            </div>

                            <div id = "img2-container">
                                <img id = "img2"  style = "width: 100%;">
                            </div>
                            <div class = "hstack justify-content-between">
                                <div id = "recipe2-name">
                                    
                                </div>
                                <div id = "recipe2-preptime">
                                    
                                </div>
                            </div>

                            <div class = "vstack d-flex align-items-start mt-4" id = "ingredients-list-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Ingredients</div>
                                <ul id = "has-2">
                                    
                                </ul>
                                <ul id = "do-not-have-2" style = "color: red;">
                                    
                                </ul>
                            </div>

                            <div class = "mt-4 vstack d-flex align-items-start" id = "instructions-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Instructions</div>
                                <div id = "instruction-content">
                                    <ul id = "instruction2-content">
                                            <!--continue to add <li> element for the instructions-->
                                        
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="collapse" id="recipe3">
                        <div class="card card-body" id = "recipe3-div">
                            <div id = "exit-btn-container">

                                <form onsubmit = "return false" style = "display: inline;" action = "recipesPage.php" method = "post">
                                    <button class = "fa-solid fa-heart" name = "submit" id = "like-btn3" type = "submit" style = "position: absolute;left: 20px; top: 7px; width: 0px; height: 0px; font-size: 35px; border: none; background-color: white;" onclick="return false;"></button> 
                                </form>
                                <button class = "btn btn-close" style = "background-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#recipe3" aria-expanded="true" aria-controls="recipe3"></button>
                            </div>
                            
                            <div id = "img3-container">
                                <img id = "img3"  style = "width: 100%;">
                            </div>
                            <div class = "hstack justify-content-between">
                                <div id = "recipe3-name">
                                    
                                </div>
                                <div id = "recipe3-preptime">
                                    
                                </div>
                            </div>

                            <div class = "vstack d-flex align-items-start mt-4" id = "ingredients-list-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Ingredients</div>
                                <ul id = "has-3">
                                    
                                </ul>
                                <ul id = "do-not-have-3" style = "color: red;">
                                  
                                </ul>
                            </div>

                            <div class = "mt-4 vstack d-flex align-items-start" id = "instructions-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Instructions</div>
                                <div id = "instruction-content">
                                    <ul id = "instruction3-content">
                                            <!--continue to add <li> element for the instructions-->
                                        
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="collapse" id="recipe4">
                        <div class="card card-body" id = "recipe4-div">
                            <div id = "exit-btn-container">
                                <form onsubmit = "return false" style = "display: inline;" action = "recipesPage.php" method = "post">
                                    <button class = "fa-solid fa-heart" name = "submit" id = "like-btn4" type = "submit" style = "position: absolute;left: 20px; top: 7px; width: 0px; height: 0px; font-size: 35px; border: none; background-color: white;" onclick="return false;"></button> 
                                </form>
                                <button class = "btn btn-close" style = "background-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#recipe4" aria-expanded="true" aria-controls="recipe4"></button>
                            </div>
                            
                            <div id = "img4-container">
                                <img id = "img4"  style = "width: 100%;">
                            </div>
                            <div class = "hstack justify-content-between">
                                <div id = "recipe4-name">
                                    
                                </div>
                                <div id = "recipe4-preptime">
                                    
                                </div>
                            </div>

                            <div class = "vstack d-flex align-items-start mt-4" id = "ingredients-list-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Ingredients</div>
                                <ul id = "has-4">
                                    
                                </ul>
                                <ul id = "do-not-have-4" style = "color: red;">
                                    
                                </ul>
                            </div>

                            <div class = "mt-4 vstack d-flex align-items-start" id = "instructions-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Instructions</div>
                                <div id = "instruction-content">
                                    <ul id = "instruction4-content">
                                            <!--continue to add <li> element for the instructions-->
                                        
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="collapse" id="recipe5">
                        <div class="card card-body" id = "recipe5-div">
                            <div id = "exit-btn-container">
                                <form onsubmit = "return false" style = "display: inline;" action = "recipesPage.php" method = "post">
                                    <button class = "fa-solid fa-heart" name = "submit" id = "like-btn5" type = "submit" style = "position: absolute;left: 20px; top: 7px; width: 0px; height: 0px; font-size: 35px; border: none; background-color: white;" onclick="return false;"></button> 
                                </form>
                                <button class = "btn btn-close" style = "background-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#recipe5" aria-expanded="true" aria-controls="recipe5"></button>
                            </div>
                            
                            <div id = "img5-container">
                                <img id = "img5" style = "width: 100%;">
                            </div>
                            <div class = "hstack justify-content-between">
                                <div id = "recipe5-name">
                                    
                                </div>
                                <div id = "recipe5-preptime">
                                    
                                </div>
                            </div>

                            <div class = "vstack d-flex align-items-start mt-4" id = "ingredients-list-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Ingredients</div>
                                <ul id = "has-5">
                                    
                                </ul>
                                <ul id = "do-not-have-5" style = "color: red;">
                                    
                                </ul>
                            </div>

                            <div class = "mt-4 vstack d-flex align-items-start" id = "instructions-div">
                                <div style = "margin-top: 15px;
                                              font-weight: 700;
                                              font-size: 23px;">Instructions</div>
                                <div id = "instruction-content">
                                    <ul id = "instruction5-content">
                                            <!--continue to add <li> element for the instructions-->
                                        
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>

    </div>
        <script>
            setTimeout(function(){ //this will be used to grab the image source from a table AJAX
                let btn1 = document.getElementById("recipe1-btn");
                let btn2 = document.getElementById("recipe2-btn");
                let btn3 = document.getElementById("recipe3-btn");
                let btn4 = document.getElementById("recipe4-btn");
                let btn5 = document.getElementById("recipe5-btn");

                getRecipeName(btn1, 1);
                getRecipeName(btn2, 2);
                getRecipeName(btn3, 3);
                getRecipeName(btn4, 4);
                getRecipeName(btn5, 5);

                let img1 = document.getElementById("img1");
                let img2 = document.getElementById("img2");
                let img3 = document.getElementById("img3");
                let img4 = document.getElementById("img4");
                let img5 = document.getElementById("img5");

                getPicUrl(img1, 1);
                getPicUrl(img2, 2);
                getPicUrl(img3, 3);
                getPicUrl(img4, 4);
                getPicUrl(img5, 5);

                let name1 = document.getElementById("recipe1-name");
                let name2 = document.getElementById("recipe2-name");
                let name3 = document.getElementById("recipe3-name");
                let name4 = document.getElementById("recipe4-name");
                let name5 = document.getElementById("recipe5-name");
                
                getRecipeName(name1, 1);
                getRecipeName(name2, 2);
                getRecipeName(name3, 3);
                getRecipeName(name4, 4);
                getRecipeName(name5, 5);

                let time1 = document.getElementById("recipe1-preptime");
                let time2 = document.getElementById("recipe2-preptime");
                let time3 = document.getElementById("recipe3-preptime");
                let time4 = document.getElementById("recipe4-preptime");
                let time5 = document.getElementById("recipe5-preptime");

                getPrepTime(time1, 1);
                getPrepTime(time2, 2);
                getPrepTime(time3, 3);
                getPrepTime(time4, 4);
                getPrepTime(time5, 5);

                let has1 = document.getElementById("has-1");
                let has2 = document.getElementById("has-2");
                let has3 = document.getElementById("has-3");
                let has4 = document.getElementById("has-4");
                let has5 = document.getElementById("has-5");

                getUsedIngredients(has1, 1);
                getUsedIngredients(has2, 2);
                getUsedIngredients(has3, 3);
                getUsedIngredients(has4, 4);
                getUsedIngredients(has5, 5);

                let miss1 = document.getElementById("do-not-have-1");
                let miss2 = document.getElementById("do-not-have-2");
                let miss3 = document.getElementById("do-not-have-3");
                let miss4 = document.getElementById("do-not-have-4");
                let miss5 = document.getElementById("do-not-have-5");

                getMissedIngredients(miss1, 1);
                getMissedIngredients(miss2, 2);
                getMissedIngredients(miss3, 3);
                getMissedIngredients(miss4, 4);
                getMissedIngredients(miss5, 5);

                let instruct1 = document.getElementById("instruction1-content");
                let instruct2 = document.getElementById("instruction2-content");
                let instruct3 = document.getElementById("instruction3-content");
                let instruct4 = document.getElementById("instruction4-content");
                let instruct5 = document.getElementById("instruction5-content");
                
                getInstructions(instruct1, 1);
                getInstructions(instruct2, 2);
                getInstructions(instruct3, 3);
                getInstructions(instruct4, 4);
                getInstructions(instruct5, 5);

                function getInstructions(element, num){
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `addRecipe.php?instruct=${num}`, true);

                    xhr.onload = function(){
                        if(xhr.status == 200){ 
                            element.innerHTML = xhr.responseText.trim();
                        }
                    }
                    xhr.send();
                }
                
                function getMissedIngredients(element, num){
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `addRecipe.php?missed=${num}`, true);

                    xhr.onload = function(){
                        if(xhr.status == 200){ 
                            element.innerHTML = xhr.responseText.trim();
                        }
                    }
                    xhr.send();
                }
                
                function getUsedIngredients(element, num){
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `addRecipe.php?used=${num}`, true);

                    xhr.onload = function(){
                        if(xhr.status == 200){ 
                            element.innerHTML = xhr.responseText.trim();
                        }
                    }
                    xhr.send();
                }

                function getPicUrl(element, num){
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `addRecipe.php?img=${num}`, true);

                    xhr.onload = function(){
                        if(xhr.status == 200){
                            element.setAttribute("src", xhr.responseText.trim());
                        }
                    }
                    xhr.send();
                }

                function getRecipeName(element, num){
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `addRecipe.php?name=${num}`, true);

                    xhr.onload = function(){
                        if(xhr.status == 200){
                            element.innerText = xhr.responseText.trim();
                        }
                    }
                    xhr.send();
                }

                function getPrepTime(element, num){
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `addRecipe.php?time=${num}`, true);

                    xhr.onload = function(){
                        if(xhr.status == 200){
                            element.innerText = xhr.responseText.trim();
                        }
                    }
                    xhr.send();
                }
            }, 4500);
        </script>
        <script>
            window.onload = function(){
                    document.getElementById("like-btn1").addEventListener("click", ()=>{
                    if(document.getElementById("like-btn1").style.color === "red"){
                        document.getElementById("like-btn1").style.color = "gray";
                        //remove the specific row from database
                        //send the current username and recipe name and remove from the table
                        removeRecipe(document.getElementById("recipe1-name").innerText);
                    }
                    else{//add new row to database
                        document.getElementById("like-btn1").style.color = "red";
                        //ajax call to addRecipe.php with POST
                        //send current username and recipe name, pic url, used ingredient, missed ingredient, instructions, recipe_name
                        //and add to the database 
                        let picurl = document.getElementById("img1").getAttribute('src');
                        let time = document.getElementById("recipe1-preptime").innerText;
                        let used = document.getElementById("has-1").innerHTML;
                        let missed = document.getElementById("do-not-have-1").innerHTML;
                        let instruct = document.getElementById("instruction1-content").innerHTML;
                        let name = document.getElementById("recipe1-name").innerText;
                        addRecipe(picurl, time, used, missed, instruct, name);
                    
                    }
                });

                document.getElementById("like-btn2").addEventListener("click", ()=>{
                    if(document.getElementById("like-btn2").style.color == "red"){
                        document.getElementById("like-btn2").style.color = "gray";
                        //remove the specific row from database
                        //send the current username and recipe name and remove from the table
                        removeRecipe(document.getElementById("recipe2-name").innerText);
                    }
                    else{//add new row to database
                        document.getElementById("like-btn2").style.color = "red";
                        //ajax call to addRecipe.php with POST
                        //send current username and recipe name, pic url, used ingredient, missed ingredient, instructions, recipe_name
                        //and add to the database 
                        let picurl = document.getElementById("img2").getAttribute('src');
                        let time = document.getElementById("recipe2-preptime").innerText;
                        let used = document.getElementById("has-2").innerHTML;
                        let missed = document.getElementById("do-not-have-2").innerHTML;
                        let instruct = document.getElementById("instruction2-content").innerHTML;
                        let name = document.getElementById("recipe2-name").innerText;
                        addRecipe(picurl, time, used, missed, instruct, name);
                        
                    }
                });

                document.getElementById("like-btn3").addEventListener("click", ()=>{
                    if(document.getElementById("like-btn3").style.color == "red"){
                        document.getElementById("like-btn3").style.color = "gray";
                        //remove the specific row from database
                        //send the current username and recipe name and remove from the table
                        removeRecipe(document.getElementById("recipe3-name").innerText);
                        
                    }
                    else{//add new row to database
                        document.getElementById("like-btn3").style.color = "red";
                        //ajax call to addRecipe.php with POST
                        //send current username and recipe name, pic url, used ingredient, missed ingredient, instructions, recipe_name
                        //and add to the database 
                        let picurl = document.getElementById("img3").getAttribute('src');
                        let time = document.getElementById("recipe3-preptime").innerText;
                        let used = document.getElementById("has-3").innerHTML;
                        let missed = document.getElementById("do-not-have-3").innerHTML;
                        let instruct = document.getElementById("instruction3-content").innerHTML;
                        let name = document.getElementById("recipe3-name").innerText;
                        addRecipe(picurl, time, used, missed, instruct, name);
                        
                    }
                });

                document.getElementById("like-btn4").addEventListener("click", ()=>{
                    if(document.getElementById("like-btn4").style.color == "red"){
                        document.getElementById("like-btn4").style.color = "gray";
                        //remove the specific row from database
                        //send the current username and recipe name and remove from the table
                        removeRecipe(document.getElementById("recipe4-name").innerText);
                        
                    }
                    else{//add new row to database
                        document.getElementById("like-btn4").style.color = "red";
                        //ajax call to addRecipe.php with POST
                        //send current username and recipe name, pic url, used ingredient, missed ingredient, instructions, recipe_name
                        //and add to the database 
                        let picurl = document.getElementById("img4").getAttribute('src');
                        let time = document.getElementById("recipe4-preptime").innerText;
                        let used = document.getElementById("has-4").innerHTML;
                        let missed = document.getElementById("do-not-have-4").innerHTML;
                        let instruct = document.getElementById("instruction4-content").innerHTML;
                        let name = document.getElementById("recipe4-name").innerText;
                        addRecipe(picurl, time, used, missed, instruct, name);
                        
                    }
                });

                document.getElementById("like-btn5").addEventListener("click", ()=>{
                    if(document.getElementById("like-btn5").style.color == "red"){
                        document.getElementById("like-btn5").style.color = "gray";
                        //remove the specific row from database
                        //send the current username and recipe name and remove from the table
                        removeRecipe(document.getElementById("recipe5-name").innerText);
                        
                    }
                    else{//add new row to database
                        document.getElementById("like-btn5").style.color = "red";
                        //ajax call to addRecipe.php with POST
                        //send current username and recipe name, pic url, used ingredient, missed ingredient, instructions, recipe_name
                        //and add to the database 
                        let picurl = document.getElementById("img5").getAttribute('src');
                        let time = document.getElementById("recipe5-preptime").innerText;
                        let used = document.getElementById("has-5").innerHTML;
                        let missed = document.getElementById("do-not-have-5").innerHTML;
                        let instruct = document.getElementById("instruction5-content").innerHTML;
                        let name = document.getElementById("recipe5-name").innerText;
                        addRecipe(picurl, time, used, missed, instruct, name);
                        
                    }

                });

                function addRecipe(pictureURL, timeEstimate, usedIngredients, missedIngredients, instructions, recipeName){  //AJAX use POST

                    var xhr = new XMLHttpRequest();

                    xhr.open('POST', 'removeRecipe.php', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                    let variable = `add=${pictureURL}_${timeEstimate}_${usedIngredients}_${missedIngredients}_${instructions}_${recipeName}`;

                    xhr.send(variable);
                }

                function removeRecipe(recipeName){ //AJAX function xmlhttprequest object
                    var xhr = new XMLHttpRequest();

                    let value = `${recipeName}`;

                    xhr.open('GET', `removeRecipe.php?remove=${value}`, true); //use GET

                    xhr.send();
                }
            }
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!--Pop up extension-->
    <script src="bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/60d33e1f78.js" crossorigin="anonymous"></script>
    <script src ="recipesPage.js"></script>
</body>
</html>

<?php 
    if(isset($_POST["submit"])){
        echo('<h1>clicked</h1>');
    }
?>