<?php
	include 'db.php';
	if(isset($_SESSION['logged_user'])) {
		 if (isset($_POST['delete'])) {
			$query_del = "DELETE FROM `users` WHERE `user_id` = ".$_SESSION['user_id'];
	    	$data = mysqli_query($mysqli, $query_del);
			header('Location: /signup.php');
		}
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
    		<a class="btn btn_s" href="/settings.php" role="button">Настройки</a> 
    		<a class="btn btn_p" href="/user_page.php" role="button">Мой кабинет</a>
    		<a class="btn btn_l" href="/logout.php" role="button">Выйти</a>
    	</nav>
    </div>
    <div class="content"> 
    <h1>Изменить настройки:</h1>
    <form method="POST" action="/settings_page.php">
    <div style="margin-top: 10px" class="setting_page">
	    <div class="change_nick form-group">
	    <p style="margin-left: -15px; font-size: 16px; font-weight: bold">Изменить логин</p>
	    	<label><input class="form-control" type='text' placeholder='Изменить логин' name='name_new'></label><br/>
	    	<button class="btn btn-default" type="submit" name="change_nick">Изменить</button>
	    	<?php
	    		$user_id = $_SESSION['user_id'];
	   				if(isset($_POST['change_nick'])) { //если кнопка нажата, то..
	                    $name_new = mysqli_real_escape_string($mysqli, trim($_POST['name_new'])); //экнанируем введенный Логин
	                    $data = mysqli_query($mysqli, "SELECT * FROM users WHERE `nickname` = '$name_new'"); //соединение с БД
						$row = mysqli_num_rows($data);	//возвращает акnуальный результат запроса
						if ($row == 1) {
							echo 'Такой логин уже существует. Попробуйте другой';
						}
						else {
	                    $data = mysqli_query ($mysqli, "UPDATE `users` SET  `nickname` = '$name_new' WHERE  `user_id` = ".$_SESSION['user_id']); //производит изменение Логина в БД
		                    echo 'Данные добавлены';
		                    $_SESSION['logged_user'] = $name_new;
	                    }   
                    }
?>
	    </div>
	    <div class="change_pass form-group">
	    <p style="margin-left: -15px; font-size: 16px; font-weight: bold">Изменить пароль</p>
	    	<label><input class="form-control" type='password' placeholder='Старый пароль' name='pass_old'></label><br/>
	    	<label><input class="form-control" type='password' placeholder='Новый пароль' name='pass_new'></label><br/>
	    	<label><input class="form-control" type='password' placeholder='Повтор нового пароля' name='pass_new2'></label><br/>
	    	<button class="btn btn-default" type="submit" name="change_pass">Изменить</button>
	    	<?php 	
	    		if (isset($_POST['change_pass'])) { 
	    			$pass_old1 = $_SESSION['pass_user'];
	    			$pass_old2 = md5($_POST['pass_old']);
	    			$pass_new1 = mysqli_real_escape_string($mysqli, $_POST['pass_new']);
	    			$pass_new2 = mysqli_real_escape_string($mysqli, $_POST['pass_new2']);
	    					//Сравниваем пароли
	    			if ($pass_old2 !== $pass_old1) {
	    				echo 'Старый пароль не верен.';
	    			}
	    			if ($pass_new1 !== $pass_new2) {
	    				echo 'Пароли не сходятся.';
	   				}
	   				if ($pass_old2 == $pass_old1 AND $pass_new1 == $pass_new2) {
	   					$pass_new = md5($pass_new1);
	   					$query_pass = "UPDATE  `users` SET  `password` =  '$pass_new' WHERE `user_id` = ".$_SESSION['user_id'];
	   					$data = mysqli_query ($mysqli, $query_pass);
	   					echo 'Пароль изменен';
	   					$_SESSION['pass_user'] = $pass_new;
	   				}
	    		}
					
?>
	    </div>
	    <div style="margin-top: 30px; margin-left: 50px" class="delete form-group">
	    	<button class="btn btn-default" type="submit" name="delete" style="margin-left: -15px">Удалить страницу</a>
	    </div>
	    </div>
	    </form>
	</div>
	<div class="footer">
    	<div class="footer-bottom">
    		<p>"Mini-forum". Все права защищены.</p>
    	</div>
	</div>
</body>
</html>
<?php 
;}
 if (!isset($_SESSION['logged_user'])) {
 	echo "<script>alert('Авторизируйтесь или зарегистрируйтесь для просмотра данной страницы!');location.href='login.php';</script>";}
?>