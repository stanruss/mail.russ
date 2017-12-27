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
              <a href="#"><li>Mail.Ru</li>       </a>      
              <a href="#"><li>Почта</li></a>        
              <a href="#"><li>Мой Мир</li></a>      
              <a href="#"><li>Одноклассники</li></a>
              <a href="#"><li>Игры</li></a>         
              <a href="#"><li>Знакомства</li></a>   
              <a href="#"><li>Новости</li></a>      
              <a href="#"><li>Поиск</li></a>        
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

            <div class="clearfix"></div><span><a class="left" href="php/signup.php">Зарегистрироваться</a></span>
          </fieldset>
        </form>
      </div>
    </div>

  </div>
</div>
<div class="right-col">
 sd
</div>
</section>