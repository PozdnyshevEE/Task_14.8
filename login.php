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
        <form action="auth.php" method="post">
            <input name="login" type="text" placeholder="Логин"><br><br>
            <input name="password" type="password" placeholder="Пароль"><br><br>
            <input name="submit" type="submit" value="Войти">
        </form>
    </div>
</body>
</html>