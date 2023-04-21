<?php
    //Запуск сессий;
    session_start();
    //Время акции
    if (!isset($_SESSION['start_time']))
    {
        $str_time = time();
        $_SESSION['start_time'] = $str_time;
    }
    $temp_time = time();
    $time = $_SESSION['start_time'];
    $past_tense = $temp_time - $time;
    $result = gmdate("H:i:s", (86400 - $past_tense) + 7);
    /* $admin_sale = 15;
    $user1_sale = 20;
    $user2_sale = 18;
    $user3_sale = 12; */

    //если пользователь не авторизован
    if (!(isset($_SESSION['Name'])))
    {
    //идем на страницу авторизации
    //header("Location: login.php");
    //exit;
    ?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Главная страница</title>
            <style>
                * {
                    box-sizing: border-box;
                }

                body {
                    margin: 0; 
                    padding: 0;
                }

                .header {
                    display: flex;
                    height: 200px;
                    background: url(http://media-01.imu.nl/storage/bestacupunctuureindhoven.nl/5637/stenenenkaarsen-960x500-2.jpg) no-repeat;
                    background-size: 100% 100%;
                }

                h1 {
                    color: wheat;
                    font-size: 60px;
                    text-transform: uppercase;
                    margin-left: 750px;
                    padding: 0;
                }

                #position {
                    float:right;
                    margin-left: auto;
                    margin-right: 30px;
                    margin-top: 50px;
                    font-size: 18px;
                    
                } 

                #position a {
                    color: white;
                    display:   inline-block;
                    margin: 10px;
                }
                
                a:hover {
                    color: #660606;
                }

                .content {
                    display: flex;
                    background-color: rgba(245, 245, 245, 0.5);
                    height: 637px;
                }

                .footer {
                    background-color: #7e7e7e;
                    color: #dbdbdb;
                    font-size: 11px;
                    margin: auto;
                    height: 110px;
                    display: flex;
                }

                .footer-copyright {
                    margin: auto;
                    font-size: 15px;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>SPA-салон</h1>
                <div id="position">
                    <a href="login.php">Войти</a>
                    <a href="register.php">Регистрация</a>
                </div>
            </div>
            <div class="content">
                
            </div>
            <div class="footer">
            <p class="footer-copyright">Copyright © 2023 Позднышев Евгений.</p>
            </div>
        </body>
        </html>
    <?php }
    else {
    //Выводим саму страницу для авторизованных пользователей
    $nm = $_SESSION['Name'] ;
    if (isset($_SESSION["rand_price"]) === false) {
        $_SESSION["rand_price"] = rand(5, 20);
    }
    $sale = $_SESSION["rand_price"];
    ?> 
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Главная страница</title>
            <style>
                * {
                    box-sizing: border-box;
                }

                body {
                    margin: 0; 
                    padding: 0;
                }

                .header {
                    display: flex;
                    height: 200px;
                    background: url(http://media-01.imu.nl/storage/bestacupunctuureindhoven.nl/5637/stenenenkaarsen-960x500-2.jpg) no-repeat;
                    background-size: 100% 100%;
                }

                h1 {
                    color: wheat;
                    font-size: 60px;
                    text-transform: uppercase;
                    margin-left: 750px;
                    padding: 0;
                }

                #position {
                    float:right;
                    margin-left: auto;
                    margin-right: 40px;
                    font-size: 18px;
                } 

                .header p {
                    color: #FAEBD7;
                }

                a {
                    color: white;
                }
                
                a:hover {
                    color: #660606;
                }

                .content {
                    display: flex;
                    background-color: rgba(245, 245, 245, 0.5);
                    height: 637px;
                }

                .content p {
                    float:left;
                    margin-left: 40px;
                    margin-right: auto;
                    font-size: 18px;
                }

                .content .sale {
                    float:right;
                    margin-left: auto;
                    margin-right: 40px;
                    font-size: 20px;
                    color:#006400;
                }

                .footer {
                    background-color: #7e7e7e;
                    color: #dbdbdb;
                    font-size: 11px;
                    margin: auto;
                    height: 110px;
                    display: flex;
                }

                .footer-copyright {
                    margin: auto;
                    font-size: 15px;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>SPA-салон</h1>
                
                <div id="position">
                    <p>Добро пожаловать в наш SPA-салон <?= $nm ?></p>
                    <a href="index.php?is_exit=1">Выйти</a>
                </div>
            </div>
            <div class="content">
                <p>Для вас сегодня действует персональная скидка, <?=$sale?>% на все услуги. Акция действует 24 часа.</p><br>
                <p class="sale">До конца акции осталось <?= $result ?></p>
            </div>
            <div class="footer">
            <p class="footer-copyright">Copyright © 2023 Позднышев Евгений.</p>
            </div>
        </body>
        </html>        
    <?php };
    if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
        if ($_GET["is_exit"] == 1) {
            unset($_SESSION['Name']);
            session_unset();
            header("Location: index.php?is_exit=0"); //Редирект после выхода
        }
    }
?>