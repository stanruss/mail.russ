<?php
require "db.php";
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
<html lang="ru">

<head>


	<meta charset="UTF-8" />

	<title>Поздравляем!</title>
	<meta name="description" content="">

	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
	<!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->

	<meta property="og:image" content="path/to/image.jpg">
	<link rel="shortcut icon" href="app/img/favicon/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="app/img/favicon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="app/img/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="app/img/favicon/apple-touch-icon-114x114.png">

	<!-- Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="#000">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#000">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">

	<!--<style>body { opacity: 0; overflow-x: hidden; } html { background-color: #151515; }</style>-->

</head>
<body class="isHome">
  <?php if( isset($_SESSION['logged_user'])) : ?>
    
     <?php require "php/index-login.php"; ?>
      
 <?php else : ?>

<?php require "php/index-logout.php"; ?>
  
<?php endif; ?>







<link rel="stylesheet" href="app/libs/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="app/libs/bootstrap/dist/css/bootstrap-theme.css">
<link rel="stylesheet" href="app/libs/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="app/libs/css-hamburgers/hamburgers.css">
<link rel="stylesheet" href="app/libs/animate/animate.css">
<link rel="stylesheet" href="app/libs/OwlCarousel/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="app/libs/OwlCarousel/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="app/css/jquery.bxslider.css">
<link rel="stylesheet" href="app/css/pluton-ie7.css">
<link rel="stylesheet" href="app/css/main.min.css">

<script src="app/libs/jquery/dist/jquery.min.js"></script>
<script src="app/libs/animate/animate-css.js"></script>
<script src="app/libs/animate/waypoints.min.js"></script>
<script src="app/libs/bootstrap/dist/js/bootstrap.js"></script>
<script src="app/libs/OwlCarousel/dist/owl.carousel.min.js"></script>
<script src="app/libs/pluton/js/jquery.bxslider.js"></script>
<script src="app/libs/pluton/js/jquery.cslider.js"></script>
<script src="app/libs/pluton/js/jquery.inview.js"></script>
<script src="app/libs/pluton/js/jquery.mixitup.js"></script>
<script src="app/libs/pluton/js/jquery.placeholder.js"></script>
<script src="app/libs/pluton/js/modernizr.custom.js"></script>
<script src="app/libs/pluton/js/respond.min.js"></script>


<script src="app/js/common.js"></script>

</body>
</html>
