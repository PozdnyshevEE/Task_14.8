<?php
    
    // функция getUsersList() возвращает массив всех пользователей и хэшей их паролей
    function getUsersList() {
        return include 'logPass.php';
    }
    // функция existsUser($login) проверяет, существует ли пользователь с указанным логином
    function existsUser($login) {
        $array = getUsersList();
    
        if (array_key_exists($login, $array)) {
            return true;
        }
        return false;
    }

    /* функция checkPassword($login, $password) возвращает true тогда, когда существует 
       пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false */
    function checkPassword($login, $password) {
        $array = getUsersList();
        $arrayPass = array();
        if (existsUser($login)) {
            $arrayPass = $array[$login];
            if ($arrayPass['password'] === md5($password)) {
                return true;
            }
        }
        return false;
    }
    
    // функция getCurrentUser() которая возвращает либо имя вошедшего на сайт пользователя, либо null
    function getCurrentUser() {
        $username = $_POST['login'] ?? null;
        return $username;
    }
    
    //Запуск сессий;
    session_start();

    if (isset($_POST['login']) && isset($_POST['password']))
    {
        // получаем данные из формы с авторизацией
        $login = $_POST['login'];
        $password = $_POST['password'];
        //проверка пароля и логина
        if (checkPassword($login, $password)){
        echo ("логин совпадает и пароль верны");
        $_SESSION['Name']=$login;
        // идем на страницу для авторизованного пользователя
        header("Location: index.php");
    }
    else
        {die('Такой логин с паролем не найдены в базе данных.');
        }
    }
?>