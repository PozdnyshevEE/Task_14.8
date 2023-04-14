<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <form action="auth.php" method="post">
        <input name="login" type="text" placeholder="Логин">
        <input name="password" type="password" placeholder="Пароль">
        <input name="submit" type="submit" value="Войти">
    </form>
</body>
</html>



    <!--  $username = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;


    if (null !== $username || null !== $password) {

        // Если пароль из базы совпадает с паролем из формы
        if ($password === $users['login']['password']) {
        
            // Стартуем сессию:
            session_start(); 
            
        // Пишем в сессию информацию о том, что мы авторизовались:
            $_SESSION['auth'] = true; 
            
            // Пишем в сессию логин и id пользователя
            $_SESSION['id'] = $users['login']['id']; 
            $_SESSION['login'] = $username; 

        }
    }

    session_start();

    $auth = $_SESSION['auth'] ?? null;

    if(!$auth) { ?>
        <html>
        <body>
            <form action="upload.php" method="post">
                <input name="login" type="text" placeholder="Логин">
                <input name="password" type="password" placeholder="Пароль">
                <input name="submit" type="submit" value="Войти">
            </form>
        </body>
        </html> -->
