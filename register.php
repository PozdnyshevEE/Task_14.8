<?php
    include 'auth.php';
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
                /* $array_temp['id'] = $id;
                $array_temp['password'] = $password; */
                $array[$login] = $array_temp[$id][$password];
            }
        } else {
            // логин занят, выведем сообщение об этом
        }
        foreach ($array as $key => $value) {
            echo "$key => $value";
        }
        $_SESSION['Name'] = $login; // пометка об авторизации
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
            <p><?=$last_id;?></p>
            <h2>Регистрация</h2>
            <form action="" method="POST">
                <input name="login" placeholder="Логин"><br><br>
                <input name="password" type="password" placeholder="Пароль"><br><br>
                <input name="repeatPassword" type="password" placeholder="Повторите пароль"><br><br>
                <input type="submit">
            </form>
        </div>
    </body>
    </html>