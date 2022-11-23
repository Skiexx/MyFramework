<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <p><label>Имя <input type="text" name="name"></label></p>
    <p><label>Логин <input type="text" name="login"></label></p>
    <p><label>Пароль <input type="password" name="password"></label></p>
    <button>Зарегистрироваться</button>
</form>