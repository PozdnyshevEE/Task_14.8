<?php

    //Запуск сессий;
    session_start();

    include 'auth.php';

    // Если пользователь авторизован
    if ((isset($_SESSION['Name'])))
    {
        //идем на Главную страницу
        header("Location: index.php");
        exit;
    };

    if (isset($_POST['login']) && isset($_POST['password']))
    {
        // получаем данные из формы с авторизацией
        $login = $_POST['login'];
        $password = $_POST['password'];
        //проверка пароля и логина
        if (checkPassword($login, $password)){
        echo ("Логин и пароль верны");
        $_SESSION['Name']=$login;
        // идем на страницу для авторизованного пользователя
        header("Location: index.php");
        } 
        else
        {
            $message = 'Неверный логин или пароль.';
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
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
        <h2>Авторизация</h2>
        <form action="" method="post">
            <input name="login" type="text" placeholder="Логин"><br><br>
            <input name="password" type="password" placeholder="Пароль"><br><br>
            <input name="submit" type="submit" value="Войти">
        <?php
            if ($message) {
                echo '<div>'. $message. '</div>';
            }
        ?>
        </form>
    </div>
</body>
</html>