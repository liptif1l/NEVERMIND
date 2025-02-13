<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($username)  empty($password)) {
        die("Будь ласка, заповніть всі поля!");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $file = fopen("users.txt", "a");
    fwrite($file, "$username, $email, $hashedPassword\n");
    fclose($file);

    echo "<h2>Реєстрація успішна! 🎉</h2>";
    echo "<p><a href='login.html'>Увійти</a></p>";
} else {
    die("Неправильний запит!");
}
?>
