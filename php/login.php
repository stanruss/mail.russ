<?php
require "../db.php";

$data = $_POST;
if( isset($data['do_login']) )
{
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));
	if( $user)
	{
		if( password_verify($data['password'], $user->password))
		{
			$_SESSION['logged_user'] = $user;
			header('location: /');
		} else
		{
			$errors[] = 'Введен не правильный пароль';
		}
	} else
	{
		$errors[] = 'Пользователь с таким логином или паролем не найден';
	}
	if( ! empty($errors) )
	{
		echo '<div id="errors">'.array_shift($errors).'</div>';
	}
}
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="style.css" rel="stylesheet" type="text/css" />
		<title>Document</title>
	</head>

	<body>

		<form action="login.php" method="POST">
			<div class="row">
				<label for="login">Ваш логин:</label>
				<input type="text" class="text" name="login" value="<?php echo @$data['login']; ?>"  />
			</div>

			<div class="row">
				<label for="password">Ваш пароль:</label>
				<input type="password" class="text" name="password" value="<?php echo @$data['password']; ?>"  />
			</div>

			<div class="row">
				<!-- Кнопка отправки данных формы -->
				<button type="submit" name="do_login">Войти</button><br>
				<a href="signup.php">Зарегистрироваться</a>
			</div>
		</form>

	</body>
	</html>