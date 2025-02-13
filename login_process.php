<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Перевіряємо, чи є користувач у базі (файлі)
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    $found = false;

    foreach ($users as $user) {
        list($savedUsername, $savedEmail, $savedPassword) = explode(", ", $user);
        
        if ($savedEmail == $email && password_verify($password, $savedPassword)) {
            $_SESSION["username"] = $savedUsername;
            $_SESSION["email"] = $savedEmail;
            $found = true;
            break;
        }
    }

    if ($found) {
        echo "<h2>Вхід успішний! 🎉</h2>";
        echo "<p>Привіт, " . $_SESSION["username"] . "! Перехід на <a href='dashboard.html'>панель управління</a>.</p>";
    } else {
        echo "<h2>Помилка входу ❌</h2>";
        echo "<p>Неправильний email або пароль. <a href='login.html'>Спробуйте ще раз</a>.</p>";
    }
} else {
    die("Неправильний запит!");
}
?>
