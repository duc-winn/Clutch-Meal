<?php session_start() ?>
<?php include("database.php"); ?>

<?php
    if(isset($_POST["clear"])){
        $sql = $_POST["clear"];
            
        mysqli_query($connect, $sql);
         
    }

    if(isset($_GET["remove"])){ //remove a recipe from favorite recipe table

        $recipename = $_GET["remove"];
        $username = $_SESSION[$_COOKIE["PHPSESSID"]];

        $sql = "DELETE FROM favorite_recipe
                WHERE user_name = '{$username}' AND recipe_name = '{$recipename}';";
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["add"])){ //add a recipe to the fav_recipe table
        $variable = $_POST["add"];
        //loop 7 times to grab all of the data

        $array = explode('_', $variable);
        $username = $_SESSION[$_COOKIE["PHPSESSID"]];
        $pictureurl = $array[0];
        $timeestimate = $array[1];
        $usedingredients = $array[2];
        $missedingredients = $array[3];
        $instructions = $array[4];
        $recipename = $array[5];

        $sql = "INSERT INTO favorite_recipe (user_name, picture_url, time_estimate, used_ingredients, missed_ingredients, instructions, recipe_name)
                VALUES ('{$username}', '{$pictureurl}', '{$timeestimate}', '{$usedingredients}', '{$missedingredients}', '{$instructions}', '{$recipename}');";

        mysqli_query($connect, $sql);
    }
?>