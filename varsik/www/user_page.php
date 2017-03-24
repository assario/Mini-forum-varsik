<?php
	include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mini-forum</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  </head>
  <body> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <div class="header">
    		<a class="btn btn_f" href="/forum/section.php" role="button">Форум</a>
            <a class="btn btn_s" href="/settings_page.php" role="button">Настройки</a> 
    		<a class="btn btn_p" href="/user_page.php" role="button">Мой кабинет</a>
    		<a class="btn btn_l" href="/logout.php" role="button">Выйти</a>
    	</nav>
    </div>
    <div class="content">
    <div class="photo_user"><?php $download = '/avatar/'.$_COOKIE['user_photo'].'';
    echo '<img src='.$download.' width="150" height="150" alt="Аватар" align="left">'; //Выставляем фотографию 
    ?>
    </div>
    <p class='login'> Логин: <?php print_r($_SESSION['logged_user']); ?></p>
     </div>
    </div>
    <div class="footer">
        <div class="footer-bottom">
            <p>"Mini-forum". Все права защищены.</p>
        </div>
    </div>
</body>
</html>