<!DOCTYPE html>

<?php include("database.php") ?>
<?php session_start() ?>

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
                      font-weight: 500;">
                Clutch Meals
        </div>
        <h1 style = "color: white;
                     font-weight: 400;">
                Log in
        </h1>
        <form action = "login.php" method = "post">
            <div style = "margin-bottom: 10px;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          color: white;
                          font-size: 20px;"
            >
                Username: 
                <input type = "text" name = "username" style = "
                        border: solid;
                        margin-left: 5px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 30px;
                        background-color: rgb(25,39,52);
                        color: white;"
                >
            </div>
            <div style = "margin-bottom: 10px;
                          color: white;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          font-size: 20px;">
                Password: 
                <input type = "password" name = "password" style = "
                        border: solid;
                        margin-left: 5px;
                        padding-top: 10px;
                        padding-bottom: 10px;
                        padding-right: 30px;
                        background-color: rgb(25,39,52);
                        color: white;">
            </div>
            <div>
                <input type = "submit" name = "submit" value = "log in" style = "
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
                Don't have an account? Create one <a href = "createAcc.php" target = "_self">here</a>
            </div>
        </form>

        <?php 
            if(isset($_POST["submit"])){
                $username = $_POST["username"];
                $password = $_POST["password"];

                if(empty($username)){
                    echo("<div style = \"color: red;\">Please enter a username!</div>");
                }
                elseif(empty($password)){
                    echo("<div style = \"color: red;\">Please enter a password!</div>");
                }
                else{ //if both username and password arent empty
                    //now check if user name exist or if it matches with its password
                    $sql = "SELECT * FROM users
                            WHERE user_name = '$username'";

                    $result = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);

                        $actualPassword = $row["password"];

                        if($password != $actualPassword){
                            echo("<div style = \"color: red;\">Username and Password do not match!</div>");
                        }
                        else{ //here is when log in is successful, start a session
                            $_SESSION[$_COOKIE["PHPSESSID"]] = $username; 
                            mysqli_close($connect);
                            header("Location: clutchMeal.php");
                        }
                    }
                    else{
                        echo("<div style = \"color: red;\">Username does not exist!</div>");
                    }
                }
            }
        ?>
    </div>
</body>
</html>