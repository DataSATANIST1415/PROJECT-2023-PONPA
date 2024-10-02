<div class="reg-page">
    <h1>Регистраиця сотрудника в систему <span class="logo">Tortotoro</span></h1>
    <form action="regis.php" method="post">
        <input type="text" class="name-input" name="username" placeholder="ФИО" required id="name-input">
        <label for="name-input" class="form-label-name">ФИО</label>
        <input type="text" class="login-input" name="userlogin" placeholder="Логин" required id="login-input">
        <label for="login-input" class="form-label-login">Логин</label>
        <input type="password" class="password-input" name="userpassword" required placeholder="Пароль" id="password-input">
        <label for="password-input" class="form-label-password">Пароль</label>
        <input type="image">
        <div class="radios">
            <input type="radio" id="admin" name="radio" value="admin" checked="checked">
            <label for="admin">Администратор</label>
            <input type="radio" id="waiter" name="radio" value="waiter">
            <label for="waiter">Официант</label>
            <input type="radio" id="cooker" name="radio" value="cooker">
            <label for="cooker">Повар</label>
        </div>
        <button class="login-btn" type="submit">Регистраиця</button>
    </form>
</div>
