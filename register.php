<?php
if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    // Записываем в базу новый логин и пароль
    $query = "SELECT * FROM users WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if (empty($user)) {
        $query = "INSERT INTO users SET login='$login', password='$password'";
        mysqli_query($link, $query);
        $_SESSION['auth'] = true;
    } else {
        // логин занят, выведем сообщение об этом
    }
    $_SESSION['Name'] = $login; // пометка об авторизации
}
?>

<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>