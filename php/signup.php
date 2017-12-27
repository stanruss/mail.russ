<?php
require "../db.php";

$data = $_POST;
if ( isset($data['do_signup']) )
{
	$errors = array();
	if( trim($data['login']) == '' )
	{
		$errors[] = 'Введите логин';
	}
	if( trim($data['email']) == '' )
	{
		$errors[] = 'Введите Email';
	}
	if( trim($data['password']) == '' )
	{
		$errors[] = 'Введите пароль';
	}
	if( $data['password_2'] != $data['password'] )
	{
		$errors[] = 'Повторный пароль введен не верно';
	}
	if( R::count('users', "login = ?", array($data['login'])) > 0 )
		{
			$errors[] = 'Пользователь с таким логином уже существует';
		}
		if( R::count('users', "email = ?", array($data['email'])) > 0 )
			{
				$errors[] = 'Пользователь с таким Email уже существует';
			}
			if( empty($errors) )
			{
				$user = R::dispense('users');
				$user->login = $data['login'];
				$user->email = $data['email'];
				$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
				R::store($user);
				$_SESSION['logged_user'] = $user;
				header('location: /');
			} else
			{
				echo '<div id="errors">'.array_shift($errors).'</div>';
			}
		}
		?>
		<!DOCTYPE html>
		<html lang="ru">

		<head>


			<meta charset="UTF-8" />

			<title>Поздравляем!</title>
			<meta name="description" content="">

			<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
			<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->

			<meta property="og:image" content="path/to/image.jpg">
			<link rel="shortcut icon" href="../app/img/favicon/favicon.ico" type="image/x-icon">
			<link rel="apple-touch-icon" href="../app/img/favicon/apple-touch-icon.png">
			<link rel="apple-touch-icon" sizes="72x72" href="../app/img/favicon/apple-touch-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="114x114" href="../app/img/favicon/apple-touch-icon-114x114.png">

			<!-- Chrome, Firefox OS and Opera -->
			<meta name="theme-color" content="#000">
			<!-- Windows Phone -->
			<meta name="msapplication-navbutton-color" content="#000">
			<!-- iOS Safari -->
			<meta name="apple-mobile-web-app-status-bar-style" content="#000">

			<!--<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #151515; }</style>-->

		</head>
		<body class="isHome">
			<section class="top-sect">
				<table>
					<tr class="top-tr">
						<td>
							<nav>
								<ul class="top-links">
									<li><a href="#">Mail.Ru</a></li>
									<li><a href="#">Почта</a></li>
									<li><a href="#">Мой Мир</a></li>
									<li><a href="#">Одноклассники</a></li>
									<li><a href="#">Игры</a></li>
									<li><a href="#">Знакомства</a></li>
									<li><a href="#">Новости</a></li>
									<li><a href="#">Поиск</a></li>
									<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Все проекты <span class="caret"></span></a>
										<ul class="dropdown-menu dropdown-menu-left">
											<li><a href="#">Mail.Ru       </a>   </li>   
											<li><a href="#">Почта</a> </li>       
											<li><a href="#">Мой Мир</a>  </li>    
											<li><a href="#">Одноклассники</a></li>
											<li><a href="#">Игры</a> </li>        
											<li><a href="#">Знакомства</a> </li>  
											<li><a href="#">Новости</a> </li>     
											<li><a href="#">Поиск</a>  </li>      
										</ul></li>
									</ul>
								</nav>
							</td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</section>    


				<section class="main-content">
					<div class="left-col">
						<img src="http://lorempixel.com/260/100/" alt="img">
						<div class="Login-main">
							<div class="loginForm">
								<div class="loginMessage"></div>
								<div class="loginLogin">
									<form class="loginLoginForm" action="//mail.russ/" method="post">

										<fieldset class="loginLoginFieldset">

											<label class="loginUsernameLabel">
												<input class="loginUsername form-control" type="text" name="login" value="<?php echo @$data['login']; ?>" placeholder="Логин" required />
											</label>

											<label class="loginPasswordLabel">
												<input class="loginPassword form-control" id="inputPassword"  type="password" name="password" value="<?php echo @$data['password']; ?>" placeholder="Пароль" required />
											</label>
											<input class="returnUrl" type="hidden" name="returnUrl" value="/" />



											<input class="loginLoginValue" type="hidden" name="service" value="login" />
											<span class="loginLoginButton"><button class="btn-sm btn-primary" type="submit" name="do_login">Войти</button></span>

											<div class="clearfix"></div><span><a class="left" href="signup.php">Зарегистрироваться</a></span>
										</fieldset>
									</form>
								</div>
							</div>

						</div>
					</div>
					<div class="right-col">
						<form action="signup.php" method="POST" class="reg">
							<div class="row-reg">
								<label for="login">Укажите ваш логин:</label>
								<input type="text" class="text" name="login" value="<?php echo @$data['login']; ?>"  />
							</div>
							<div class="row-reg">
								<label for="email">Укажите ваш Email:</label>
								<input type="email" class="text" name="email" value="<?php echo @$data['email']; ?>"  />
							</div>
							<div class="row-reg">
								<label for="password">Укажите ваш пароль:</label>
								<input type="password" class="text" name="password" value="<?php echo @$data['password']; ?>"  />
							</div>

							<div class="row-reg">
								<label for="password_2">Повторите введенный пароль:</label>
								<input type="password" class="text" name="password_2" value="<?php echo @$data['password_2']; ?>" />
							</div>
<div class="clearfix"></div>
							<div class="row-reg">
								<!-- Кнопка отправки данных формы -->
								<button type="submit" name="do_signup">Зарегистрироваться </button>
							</div>
						</form>
					</div>
				</section>








				<link rel="stylesheet" href="../app/libs/bootstrap/dist/css/bootstrap.css">
				<link rel="stylesheet" href="../app/libs/bootstrap/dist/css/bootstrap-theme.css">
				<link rel="stylesheet" href="../app/libs/font-awesome/css/font-awesome.min.css">
				<link rel="stylesheet" href="../app/libs/css-hamburgers/hamburgers.css">
				<link rel="stylesheet" href="../app/libs/animate/animate.css">
				<link rel="stylesheet" href="../app/libs/OwlCarousel/dist/assets/owl.carousel.min.css">
				<link rel="stylesheet" href="../app/libs/OwlCarousel/dist/assets/owl.theme.default.min.css">
				<link rel="stylesheet" href="../app/css/jquery.bxslider.css">
				<link rel="stylesheet" href="../app/css/pluton-ie7.css">
				<link rel="stylesheet" href="../app/css/main.min.css">

				<script src="../app/libs/jquery/dist/jquery.min.js"></script>
				<script src="../app/libs/animate/animate-css.js"></script>
				<script src="../app/libs/animate/waypoints.min.js"></script>
				<script src="../app/libs/bootstrap/dist/js/bootstrap.js"></script>
				<script src="../app/libs/OwlCarousel/dist/owl.carousel.min.js"></script>
				<script src="../app/libs/pluton/js/jquery.bxslider.js"></script>
				<script src="../app/libs/pluton/js/jquery.cslider.js"></script>
				<script src="../app/libs/pluton/js/jquery.inview.js"></script>
				<script src="../app/libs/pluton/js/jquery.mixitup.js"></script>
				<script src="../app/libs/pluton/js/jquery.placeholder.js"></script>
				<script src="../app/libs/pluton/js/modernizr.custom.js"></script>
				<script src="../app/libs/pluton/js/respond.min.js"></script>


				<script src="../app/js/common.js"></script>

			</body>
			</html>


