<?php
    include 'auth.php';
    $showAlert = false; 
    $showError = false; 
    $array = getUsersList();
    $array_temp = array();
    $id = count($array);
    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $rpassword = $_POST['repeatPassword'];
        
        // Записываем в базу новый логин и пароль
        if (!existsUser($login)) {
            if ($password === $rpassword) {
                $array_temp['id'] = $id + 1;
                $array_temp['password'] = md5($password);
                $array[$login] = $array_temp['id']['password'];
                $showAlert = true;
            }else {
                $showError = "Пароли не совпадают";
        }  
        }else {
            $showError ="Пользователь с таким логином уже существует";
        }
        print_r($array_temp);
       // $_SESSION['Name'] = $login; // пометка об авторизации
    }
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Регистрация</title>
        <style>
            body {
                height: 100%; 
                display: flex; 
                align-items: center; 
                justify-content: center;
                background-image: url(https://ogorodniku.com/uploads/posts/2023-01/1674160610_ogorodniku-com-p-spa-foto-56.jpg);
                background-repeat: no-repeat;
                background-size: cover;
            }
            div {
                width: 250px; 
                height: 200px; 
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div>
            <h2>Регистрация</h2>
            <form action="" method="POST">
                <input name="login" placeholder="Логин"><br><br>
                <input name="password" type="password" placeholder="Пароль"><br><br>
                <input name="repeatPassword" type="password" placeholder="Потвердите пароль"><br><br>
                <input type="submit">
                <input type="button" value="Авторизоваться">
                <?php
                    if($showAlert) {
                        echo '<div><strong>Success!</strong> Новый пользователь зарегестрирован.</div>';
                    }
                    if($showError) {
                        echo ' <div><strong>Error!</strong> '. $showError.'</div>'; 
                    }
                ?>
            </form>
        </div>
    </body>
    </html>