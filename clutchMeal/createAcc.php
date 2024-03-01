<!DOCTYPE html>
<?php include("database.php") ?>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kablammo&family=Montserrat&family=Roboto+Slab:wght@300;400;500;700&family=Roboto:wght@400;500&family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body style = "background-color: rgb(25,39,52);">
<div style = "text-align: center;
                  font-family: Roboto;">
        <div style = "color: white;
                      font-size: 55px;
                      font-weight: 500;">Clutch Meals
        </div>
        <h1 style = "color: white;
                     font-weight: 400;">Create Account
        </h1>

        <form action = "createAcc.php" method = "post">
        <div style = "margin-bottom: 10px;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          color: white;
                          font-size: 20px;">Create username: 
                <input type = "text" name = "username" style = "
                        border: solid;
                        margin-left: 5px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 30px;
                        background-color: rgb(25,39,52);
                        color: white;">
            </div>
            <div style = "margin-bottom: 10px;
                          color: white;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          font-size: 20px;">Create password: 
                <input type = "text" name = "password" style = "
                        border: solid;
                        margin-left: 5px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 30px;
                        background-color: rgb(25,39,52);
                        color: white;">
            </div>
            <div style = "margin-bottom: 10px;
                          color: white;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          font-size: 18.5px;">Confirm password: 
                <input type = "text" name = "con-password" style = "
                        border: solid;
                        margin-left: 5px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 30px;
                        background-color: rgb(25,39,52);
                        color: white;">
            </div>
            <div>
                <input type = "submit" name = "submit" value = "sign up" style = "
                    border: none;
                    font-size: 15px;
                    font-weight: 400;
                    margin-top: 20px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    padding-left: 20px;
                    padding-right: 20px;
                    border-radius: 10px;
                    background-color: rgb(136,153,166);
                    color: black;
                    cursor: pointer;">
            </div>

            <div style = "color: white;
                          margin-top: 15px;
                          margin-bottom: 20px;">
                Have an account already? Log in <a href = "login.php" target = "_self">here</a>
            </div>
            
        </form>

        <?php 
            if(isset($_POST["submit"])){        //if the creat account button is clicked, then check for invalid input
                $new_username = $_POST["username"];
                $new_password = $_POST["password"];
                $new_con_pass = $_POST["con-password"];

                if(empty($new_username)){
                    echo ("<div style = \"color: red;\">username is missing!</div>");
                }
                elseif(empty($new_password)){
                    echo ("<div style = \"color: red;\">password is missing!</div>");
                }
                else{
                    if(empty($new_con_pass)){
                        echo ("<div style = \"color: red;\">please confirm password!</div>");
                    }
                    else{
                        if($new_password != $new_con_pass){
                            echo ("<div style = \"color: red;\">password does not match with confirmation!</div>");
                        }
                        else{      //now add the user to database because everything is correct now
                            $sql = "INSERT INTO users (user_name, password)
                                    VALUES('$new_username','$new_password')";
                            
                            try{
                                mysqli_query($connect, $sql);

                                mysqli_close($connect);
                                header("Location: login.php");
                            }
                            catch(mysqli_sql_exception){
                                echo("<div style = \"color: red;\">username has already exist!</div>");
                            }
                        }
                    }
                }
            }
        ?>
</div>
    
</body>
</html>