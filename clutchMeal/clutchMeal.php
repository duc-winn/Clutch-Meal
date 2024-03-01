<?php session_start() ?>
<?php 
        if(isset($_POST["submit"])){
            session_destroy();
            header("Location: login.php");
        }
?>
<?php include("database.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="clutchMeal.css">
    <title>Clutch Meal</title>

    <div class="container-fluid">
        <img class = "d-sm-block d-none" src = "websiteImages/dec-1.png" id = "dec1">
        <img class = "d-md-block d-none" src = "websiteImages/dec-4.png" id = "dec4">
        <img class = "d-sm-block d-none" src = "websiteImages/dec-5.png" id = "dec5">
        <img class = "d-sm-none d-block" src = "websiteImages/dec-1.png" id = "smallDec1">
        <img class = "d-sm-none d-block" src = "websiteImages/dec-3.png" id = "smallDec2">
        <div class="row">
            <nav class="navbar" style = "background-color: rgb(136,153,166);">
                <div class="container-fluid">
                    <div style = "font-weight: 700; font-size: 30px;">Clutch Meals</div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div style = "color: black;
                                    margin-bottom: 10px;
                                    display: flex;
                                    justify-content: space-between;
                                    margin-top: 20px;">
                            <div style = "font-weight: 400;
                                        font-size: 18px;" >username:  <?php echo($_SESSION[$_COOKIE["PHPSESSID"]]); ?></div> 

                            <form action = "clutchMeal.php" method = "post">
                                <input class = "btn btn-danger" type = "submit" name = "submit" value = "Sign Out">
                            </form>
                        </div>

                        <br>
                        <div style = "font-weight: 700; font-size: 30px;">Favorite Recipes</div>
                        <br>
                        <div id = "favoriteRecipesContainer">
                            <?php 
                                $username = $_SESSION[$_COOKIE["PHPSESSID"]];

                                $sql = "SELECT * FROM favorite_recipe
                                        WHERE user_name = '{$username}'";
                                $result = mysqli_query($connect, $sql);

                                if(mysqli_num_rows($result) > 0){
                                    $i = 0;
                                    while($row = mysqli_fetch_array($result)){
                                        $name = $row['recipe_name'];
                                        $url = $row['picture_url'];
                                        $time = $row['time_estimate'];
                                        $used = $row['used_ingredients'];
                                        $missed = $row['missed_ingredients'];
                                        $instruct = $row['instructions'];
                                        echo("<button id=\"staticBackdrop$i-btn\" data-bs-toggle=\"modal\" data-bs-target=\"#staticBackdrop$i\" style = \"margin-right: 5px; padding-top: 7px; padding-bottom: 7px; padding-left: 11px; padding-right: 11px; border: none; border-radius: 100px; font-weight: 500; margin-bottom: 5px;\">
                                                $name
                                              </button>
                                              <div class=\"modal fade modal-dialog-scrollable\" id=\"staticBackdrop$i\" data-bs-backdrop=\"static\" data-bs-keyboard=\"false\" tabindex=\"-1\" aria-labelledby=\"staticBackdropLabel\" aria-hidden=\"true\">
                                                    <div class=\"modal-dialog\">
                                                        <div class=\"modal-content\">
                                                            <div class=\"modal-header\">
                                                                <h1 class=\"modal-title fs-5\" id=\"staticBackdropLabel$i\">$name</h1>
                                                            </div>
                                                            <div class=\"modal-body\"> 
                                                                <div id = \"img$i-container\">
                                                                    <img src = \"$url\" id = \"img$i\"  style = \"width: 100%;\">
                                                                </div>
                                                                <div class = \"hstack justify-content-between\">
                                                                    <div id = \"recipe$i-preptime\">
                                                                        $time
                                                                    </div>
                                                                </div>
                                    
                                                                <div class = \"vstack d-flex align-items-start mt-4\" id = \"ingredients-list-div\">
                                                                    <div style = \"margin-top: 15px;
                                                                                font-weight: 700;
                                                                                font-size: 23px;\">Ingredients</div>
                                                                    <ul id = \"has-$i\">
                                                                        $used
                                                                    </ul>
                                                                    <ul id = \"do-not-have-$i\" style = \"color: red;\">
                                                                        $missed
                                                                    </ul>
                                                                </div>
                                    
                                                                <div class = \"mt-4 vstack d-flex align-items-start\" id = \"instructions-div\">
                                                                    <div style = \"margin-top: 15px;
                                                                                font-weight: 700;
                                                                                font-size: 23px;\">Instructions</div>
                                                                    <div id = \"instruction-content\">
                                                                        <ul id = \"instruction$i-content\">
                                                                                <!--continue to add <li> element for the instructions-->
                                                                            $instruct
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>         
                                                            <div class=\"modal-footer\">
                                                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>
                                                                <button type=\"button\" class=\"btn btn-danger\" data-bs-dismiss=\"modal\" id = \"remove-btn$i\">Remove Recipe</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                              </div>
                                              
                                              <script>
                                                 let deleteBtn$i = document.getElementById(\"remove-btn$i\");
                                                 let parentDiv$i = document.getElementById(\"favoriteRecipesContainer\");

                                                 let recipeName$i = document.getElementById(\"staticBackdropLabel$i\").innerText;
                                                 let btn$i = document.getElementById(\"staticBackdrop$i-btn\");
                                                 let modal$i = document.getElementById(\"staticBackdrop$i\");

                                                 deleteBtn$i.addEventListener(\"click\", ()=>{
                                                    parentDiv$i.removeChild(btn$i);
                                                    parentDiv$i.removeChild(modal$i);

                                                    removeRecipe(recipeName$i);
                                                 });

                                                 function removeRecipe(recipeName){ //AJAX function xmlhttprequest object
                                                    var xhr = new XMLHttpRequest();
                                    
                                                    xhr.open('GET', ('removeRecipe.php?remove=' + recipeName), true); //use GET
                                                    
                                                    xhr.send();
                                                }

                                              </script>");
                                        $i++;
                                    }
                                }
                                else{
                                    echo("No favorite recipes...");
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row mt-5">
            <div class=" offset-sm-4 col-sm-4 col-12 text-center">
                <header style ="
                    color: white;
                    font-size: 23px;">Enter left-over ingredients</header>
                <header id = "requirement">(MUST INCLUDE AT LEAST 2)</header>
                <div class="container text-center mt-3"> 
                    <div id = "ingredient-slot">
                        <div class=" border rounded border-black" id = "1">
                            <input class = "border border-3 border-white form-control" id = "input" style = "background-color: rgb(53, 75, 95);
                                                                                color: white;" name = "user-input">
                        </div>

                        <div class="border rounded border-black" id = "2">
                            <input class = "border border-3 border-white form-control" id = "input" style = "background-color: rgb(53, 75, 95);
                                                                                color: white;" name = "user-input">
                        </div>
                    </div>
                    <button class = " mt-3 btn btn-primary" id = "add-btn">
                        <i class = "bi bi-plus-lg"></i>
                    </button>
                </div>
            </div>

            <div class = "col-sm-4 col-12 offset-sm-0 text-sm-start text-center mt-sm-2 mt-3">
                <button class = "btn btn-primary disabled" id = "getRecipeBtn">LET HIM COOK!</button>
                <img class = "d-sm-block d-none" src = "websiteImages/dec-2.png" id = "dec2">
                <img class = "d-md-block d-none" src = "websiteImages/dec-3.png" id = "dec3">
            </div>
        </div> 
    </div>
</head>
<body>
    <!--Pop up extension-->
    <!--<script src="bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src ="clutchMeal.js"></script>
</body>
</html>
