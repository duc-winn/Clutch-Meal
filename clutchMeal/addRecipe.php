<?php session_start() ?>
<?php include("database.php"); ?>

<?php 
    if(isset($_POST["query"])){     //execute the query to add the row

        $sql = $_POST["query"];
      
        try{
            mysqli_query($connect, $sql);
        }
        catch(mysqli_sql_exception $e){

            echo($e->getMessage());
        }
      

    }

    if(isset($_GET["img"])){    //execute query to grab the picture url
        $imgID =  $_GET["img"];

        $sql = "SELECT picture_url FROM recipes
                WHERE id = '{$imgID}';";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_row($result);
            echo($row[0]);  //return picture url of id $imgID
        }
    }

    if(isset($_GET["name"])){
        $nameID = $_GET["name"];

        $sql = "SELECT recipe_name FROM recipes
                WHERE id = '{$nameID}';";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_row($result);
            echo($row[0]);  //return recipe name of id $nameID
        }
    }

    if(isset($_GET["time"])){
        $timeID = $_GET["time"];
        $sql = "SELECT time_estimate FROM recipes
                WHERE id = '{$timeID}';";
        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_row($result);
            $time = $row[0];
            
            if($time != ""){
                if($time == "Unavailable"){
                    echo($time);
                }
                else{
                    echo ($time . " mins");
                }
            }
        }
    }

    if(isset($_GET["used"])){ 
        $usedID = $_GET["used"];                   
        $sql = "SELECT used_ingredients FROM recipes
                WHERE id = '{$usedID}';";
        $result = mysqli_query($connect, $sql);

        $stringResult = "";
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_row($result);
            $ingredients = $row[0];
            //ingre separated by /
            if($ingredients != ""){
                $arr = explode("/", $ingredients);
                foreach($arr as $element){
                    if($element == ""){
                        continue;
                    }
                    $stringResult .= "<li style = \"text-align: start;\">{$element}</li>";
                }
                echo($stringResult);
            }
            else{
                echo("None Available...");
            }
        }
    }

    if(isset($_GET["missed"])){
        $missedID = $_GET["missed"];
                                        
        $sql = "SELECT missed_ingredients FROM recipes
                WHERE id = '{$missedID}';";
        $result = mysqli_query($connect, $sql);

        $stringResult = "";
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_row($result);
            $ingredients = $row[0];
            //ingre separated by /
            if($ingredients != ""){
                $arr = explode("/", $ingredients);
                foreach($arr as $element){
                    if($element == ""){
                        continue;
                    }
                    $stringResult .= "<li style = \"text-align: start;\">{$element}</li>";
                }
                echo($stringResult);
            }
        }
    }

    if(isset($_GET["instruct"])){
        $instructID = $_GET["instruct"];
        
        $sql = "SELECT instructions FROM recipes
                WHERE id = '{$instructID}';";
        $result = mysqli_query($connect, $sql);

        $stringResult = "";
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_row($result);
            $instruct = $row[0];
            
            if($instruct != ""){
                if(!str_contains($instruct, "/")){
                    echo("<li>{$instruct}</li>");
                }
                else{
                    $arr = explode("/", $instruct);
                    foreach($arr as $element){
                        if($element == ""){
                            continue;
                        }
                        $stringResult .= "<li style = \"text-align: start;\">{$element}</li>";
                    }
                    echo($stringResult);
                }
            }
            else{
                echo("None Available...");
            }
        }
                                        
    }

