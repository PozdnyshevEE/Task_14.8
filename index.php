<?php
    //Запуск сессий;
session_start();
//если пользователь не авторизован

if (!(isset($_SESSION['Name'])))
{
    //идем на страницу авторизации
    header("Location: login.php");
    exit;
};
//Выводим саму страницу для авторизованных пользователей
$nm =$_SESSION['Name'] ;
echo ("<div style=\"text-align: center; margin-top: 10px;\">");
print "Пользователь системы $nm <br> ";
print "Вы на главной странице $nm <br> ";
?> 
<a href="index.php?is_exit=1">Выйти</a>

<?php
    if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
        if ($_GET["is_exit"] == 1) {
            unset($_SESSION['Name']);
            session_unset();
            session_destroy(); //Выходим
            header("Location: index.php"); //Редирект после выхода
        }
    }
?>